<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Http\Response;

class ProdutoController extends Controller
{
    /**
     * Exibe uma lista de todos os produtos.
     */
    public function index()
    {
        // Lista todos os produtos com a categoria relacionada
        return Produto::with('categoria')->get();
    }

    /**
     * Exibe o formulário para criar um novo produto.
     */
    public function create()
    {
        //
    }

    /**
     * Armazena um novo produto no banco de dados.
     */
    public function store(Request $requisicao)
    {
        // Validação simples
        $validado = $requisicao->validate([
            'nome' => 'required|string',
            'marca' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);
        $produto = Produto::create($validado);
        return response()->json($produto, 201);
    }

    /**
     * Exibe um produto específico.
     */
    public function show($id)
    {
        $produto = Produto::findOrFail($id);
        return view('Produto', compact('produto'));
    }

    /**
     * Atualiza um produto específico.
     */
    public function update(Request $requisicao, string $id)
    {
        $produto = Produto::find($id);
        if (!$produto) {
            return response()->json(['mensagem' => 'Produto não encontrado'], 404);
        }
        $validado = $requisicao->validate([
            'nome' => 'sometimes|required|string',
            'marca' => 'sometimes|required|string',
            'categoria_id' => 'sometimes|required|exists:categorias,id',
        ]);
        $produto->update($validado);
        return response()->json($produto);
    }

    /**
     * Remove um produto específico.
     */
    public function destroy(string $id)
    {
        $produto = Produto::find($id);
        if (!$produto) {
            return response()->json(['mensagem' => 'Produto não encontrado'], 404);
        }
        $produto->delete();
        return response()->json(['mensagem' => 'Produto removido com sucesso']);
    }

    /**
     * Normaliza texto removendo acentos, espaços e caracteres especiais
     */
    private function normalizarTexto($texto)
    {
        // Remove acentos e converte para minúscula
        $texto = mb_strtolower($texto, 'UTF-8');
        $texto = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $texto);
        
        // Remove espaços, hífens, underscores e outros caracteres especiais
        $texto = preg_replace('/[\s\-_\.\(\)\[\]]+/', '', $texto);
        
        // Remove caracteres não alfanuméricos
        $texto = preg_replace('/[^a-z0-9]/', '', $texto);
        
        return $texto;
    }

    /**
     * Buscar produtos por nome com filtro opcional de categoria para autocomplete
     */
    public function buscar(Request $request, $categoria = null)
    {
        $termo = $request->query('q', '');
        
        if (strlen($termo) < 2) {
            return response()->json([]);
        }

        // Normaliza o termo de busca
        $termoNormalizado = $this->normalizarTexto($termo);
        $termoOriginal = trim(strtolower($termo));
        
        $produtos = collect();
        
        // ESTRATÉGIA 1: Busca exata (alta prioridade)
        $produtos = $produtos->merge($this->buscarExata($termoOriginal, $categoria));
        
        // ESTRATÉGIA 2: Busca normalizada ("air pods" → "airpods")
        if ($produtos->count() < 5 && strlen($termoNormalizado) >= 3) {
            $produtos = $produtos->merge($this->buscarNormalizada($termoNormalizado, $categoria));
        }
        
        // ESTRATÉGIA 3: Busca parcial ("airp" → "airpods")
        if ($produtos->count() < 5 && strlen($termoOriginal) >= 3) {
            $produtos = $produtos->merge($this->buscarParcial($termoOriginal, $categoria));
        }
        
        // ESTRATÉGIA 4: Busca fuzzy (erros de digitação)
        if ($produtos->count() < 5 && strlen($termoOriginal) >= 4) {
            $produtos = $produtos->merge($this->buscarFuzzy($termoOriginal, $categoria));
        }
        
        // Remove duplicatas e limita resultados
        $produtos = $produtos->unique('id')->take(8);

        return response()->json($produtos->values())
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }

    /**
     * Busca exata - correspondência direta do termo
     */
    private function buscarExata($termo, $categoria = null)
    {
        $query = Produto::where('ativo', true)->with('categoria');
        
        // Para buscas por marca (Apple, Samsung), ignorar filtro de categoria
        $marcasGlobais = ['apple', 'samsung', 'xiaomi', 'motorola', 'lg', 'sony', 'huawei'];
        $ignorarCategoria = in_array(strtolower(trim($termo)), $marcasGlobais);
        
        if ($categoria && !$ignorarCategoria) {
            $query->whereHas('categoria', function($q) use ($categoria) {
                $q->where('nome', $categoria);
            });
        }
        
        return $query->where(function($q) use ($termo) {
            $q->whereRaw('LOWER(nome) LIKE ?', ['%' . $termo . '%'])
              ->orWhereRaw('LOWER(marca) LIKE ?', ['%' . $termo . '%'])
              ->orWhereRaw('LOWER(modelo) LIKE ?', ['%' . $termo . '%'])
              ->orWhereRaw('LOWER(descricao) LIKE ?', ['%' . $termo . '%']);
        })->get();
    }
    
    /**
     * Busca normalizada - remove espaços e caracteres especiais
     */
    private function buscarNormalizada($termoNormalizado, $categoria = null)
    {
        $query = Produto::where('ativo', true)->with('categoria');
        
        // Para buscas por marca normalizada (apple, samsung), ignorar filtro de categoria
        $marcasNormalizadas = ['apple', 'samsung', 'xiaomi', 'motorola', 'lg', 'sony', 'huawei'];
        $ignorarCategoria = in_array($termoNormalizado, $marcasNormalizadas);
        
        if ($categoria && !$ignorarCategoria) {
            $query->whereHas('categoria', function($q) use ($categoria) {
                $q->where('nome', $categoria);
            });
        }
        
        $termoBusca = '%' . $termoNormalizado . '%';
        
        return $query->whereRaw(
            "(REPLACE(REPLACE(REPLACE(LOWER(nome), ' ', ''), '-', ''), '_', '') LIKE ? 
             OR REPLACE(REPLACE(REPLACE(LOWER(marca), ' ', ''), '-', ''), '_', '') LIKE ? 
             OR REPLACE(REPLACE(REPLACE(LOWER(modelo), ' ', ''), '-', ''), '_', '') LIKE ?)",
            [$termoBusca, $termoBusca, $termoBusca]
        )->get();
    }
    
    /**
     * Busca parcial - encontra produtos que começam com o termo
     */
    private function buscarParcial($termo, $categoria = null)
    {
        $query = Produto::where('ativo', true)->with('categoria');
        
        // Para buscas parciais por marca, ignorar filtro de categoria  
        $iniciosMarcas = ['appl', 'sams', 'xiao', 'moto', 'sony', 'huaw'];
        $termoLower = strtolower($termo);
        $ignorarCategoria = false;
        
        foreach ($iniciosMarcas as $inicio) {
            if (strpos($termoLower, $inicio) === 0) {
                $ignorarCategoria = true;
                break;
            }
        }
        
        if ($categoria && !$ignorarCategoria) {
            $query->whereHas('categoria', function($q) use ($categoria) {
                $q->where('nome', $categoria);
            });
        }
        
        return $query->where(function($q) use ($termo) {
            $q->whereRaw('LOWER(nome) LIKE ?', [$termo . '%'])
              ->orWhereRaw('LOWER(marca) LIKE ?', [$termo . '%'])
              ->orWhereRaw('LOWER(modelo) LIKE ?', [$termo . '%']);
        })->get();
    }
    
    /**
     * Busca fuzzy - tolera pequenos erros de digitação
     */
    private function buscarFuzzy($termo, $categoria = null)
    {
        $query = Produto::where('ativo', true)->with('categoria');
        
        // Para buscas fuzzy que podem ser marcas, ser mais flexível
        $possivelMarca = $this->isPossivelMarca($termo);
        
        if ($categoria && !$possivelMarca) {
            $query->whereHas('categoria', function($q) use ($categoria) {
                $q->where('nome', $categoria);
            });
        }
        
        $produtos = $query->get();
        $resultados = collect();
        
        foreach ($produtos as $produto) {
            $score = $this->calcularSimilaridade($termo, $produto);
            if ($score > 0.6) { // 60% de similaridade mínima
                $produto->similarity_score = $score;
                $resultados->push($produto);
            }
        }
        
        return $resultados->sortByDesc('similarity_score');
    }
    
    /**
     * Verifica se o termo pode ser uma marca conhecida
     */
    private function isPossivelMarca($termo)
    {
        $marcasConhecidas = [
            'apple', 'appl', 'aple', 
            'samsung', 'samsu', 'sams', 'samsung',
            'xiaomi', 'xiao', 'xiam',
            'motorola', 'moto', 'motor',
            'sony', 'son',
            'huawei', 'huaw'
        ];
        
        $termoLower = strtolower(trim($termo));
        
        foreach ($marcasConhecidas as $marca) {
            $similaridade = 1 - (levenshtein($termoLower, $marca) / max(strlen($termoLower), strlen($marca)));
            if ($similaridade > 0.7) { // 70% de similaridade com marca conhecida
                return true;
            }
        }
        
        return false;
    }
    
    /**
     * Calcula similaridade entre termo e produto
     */
    private function calcularSimilaridade($termo, $produto)
    {
        $campos = [
            $this->normalizarTexto($produto->nome),
            $this->normalizarTexto($produto->marca),
            $this->normalizarTexto($produto->modelo ?? '')
        ];
        
        $termoNorm = $this->normalizarTexto($termo);
        $maxSimilaridade = 0;
        
        foreach ($campos as $campo) {
            if (empty($campo)) continue;
            
            // Similaridade por substring
            if (strpos($campo, $termoNorm) !== false) {
                $maxSimilaridade = max($maxSimilaridade, 0.9);
            }
            
            // Similaridade por Levenshtein
            $distancia = levenshtein($termoNorm, $campo);
            $maxLen = max(strlen($termoNorm), strlen($campo));
            if ($maxLen > 0) {
                $similaridade = 1 - ($distancia / $maxLen);
                $maxSimilaridade = max($maxSimilaridade, $similaridade);
            }
        }
        
        return $maxSimilaridade;
    }

    /**
     * Página de resultados de busca
     */
    public function buscarPagina(Request $request)
    {
        $termo = $request->input('q', '');
        $categoria = $request->input('categoria', '');
        $produtos = [];
        $mensagemErro = null;
        $sugestoes = [];

        if ($termo) {
            // Primeiro, busca exata
            $query = Produto::with('categoria')
                ->where('ativo', true);

            // Busca inteligente: nome, marca, modelo, descrição e categoria
            $query->where(function($q) use ($termo) {
                $q->where('nome', 'LIKE', '%' . $termo . '%')
                  ->orWhere('marca', 'LIKE', '%' . $termo . '%')
                  ->orWhere('modelo', 'LIKE', '%' . $termo . '%')
                  ->orWhere('descricao', 'LIKE', '%' . $termo . '%')
                  ->orWhereHas('categoria', function($subQ) use ($termo) {
                      $subQ->where('nome', 'LIKE', '%' . $termo . '%');
                  });
            });

            // Se categoria foi especificada, filtrar por ela
            if ($categoria) {
                $query->whereHas('categoria', function($q) use ($categoria) {
                    $q->where('nome', 'LIKE', '%' . $categoria . '%');
                });
            }

            $produtos = $query->paginate(12);

            // Se não encontrou resultados, tentar busca mais flexível
            if ($produtos->isEmpty()) {
                $sugestoes = $this->buscarSugestoes($termo);
                
                $mensagemErro = "Nenhum produto encontrado para '{$termo}'";
                if ($categoria) {
                    $mensagemErro .= " na categoria {$categoria}";
                }
                
                if (!empty($sugestoes)) {
                    $mensagemErro .= ". Você quis dizer:";
                } else {
                    $mensagemErro .= ". Tente uma busca diferente.";
                }
            }
        }

        return view('buscar', compact('produtos', 'termo', 'categoria', 'mensagemErro', 'sugestoes'));
    }

    /**
     * Buscar sugestões quando não há resultados
     */
    private function buscarSugestoes($termo)
    {
        $sugestoes = [];
        $termoLimpo = $this->limparTermo($termo);
        
        // Busca por marcas similares
        $marcas = Produto::where('ativo', true)
            ->distinct()
            ->pluck('marca')
            ->filter(function($marca) use ($termoLimpo, $termo) {
                $marcaLimpa = $this->limparTermo($marca);
                return stripos($marcaLimpa, substr($termoLimpo, 0, 2)) !== false ||
                       similar_text($termoLimpo, $marcaLimpa) > 2 ||
                       $this->calculaSimilaridade($termo, $marca) > 0.6;
            })
            ->take(3);
        
        // Busca por nomes de produtos similares
        $nomes = Produto::where('ativo', true)
            ->select('nome', 'marca')
            ->get()
            ->filter(function($produto) use ($termoLimpo, $termo) {
                $nomeLimpo = $this->limparTermo($produto->nome);
                $marcaLimpa = $this->limparTermo($produto->marca);
                
                $score1 = similar_text($termoLimpo, $nomeLimpo);
                $score2 = similar_text($termoLimpo, $marcaLimpa);
                $score3 = $this->calculaSimilaridade($termo, $produto->nome);
                
                return $score1 > 3 || $score2 > 3 || $score3 > 0.5;
            })
            ->pluck('nome')
            ->unique()
            ->take(3);
        
        // Busca por categorias similares
        $categorias = \App\Models\Categoria::all()
            ->filter(function($categoria) use ($termoLimpo, $termo) {
                $categoriaLimpa = $this->limparTermo($categoria->nome);
                return stripos($categoriaLimpa, substr($termoLimpo, 0, 3)) !== false ||
                       similar_text($termoLimpo, $categoriaLimpa) > 2 ||
                       $this->calculaSimilaridade($termo, $categoria->nome) > 0.6;
            })
            ->pluck('nome')
            ->take(2);
        
        return array_unique(array_merge($marcas->toArray(), $nomes->toArray(), $categorias->toArray()));
    }

    /**
     * Remove acentos e caracteres especiais para comparação
     */
    private function limparTermo($termo)
    {
        $termo = strtolower($termo);
        $termo = str_replace(['á','à','â','ã','ä'], 'a', $termo);
        $termo = str_replace(['é','è','ê','ë'], 'e', $termo);
        $termo = str_replace(['í','ì','î','ï'], 'i', $termo);
        $termo = str_replace(['ó','ò','ô','õ','ö'], 'o', $termo);
        $termo = str_replace(['ú','ù','û','ü'], 'u', $termo);
        $termo = str_replace(['ç'], 'c', $termo);
        $termo = preg_replace('/[^a-z0-9\s]/', '', $termo);
        return trim($termo);
    }

    /**
     * Calcula similaridade entre strings (0-1)
     */
    private function calculaSimilaridade($str1, $str2)
    {
        $str1 = $this->limparTermo($str1);
        $str2 = $this->limparTermo($str2);
        
        $len1 = strlen($str1);
        $len2 = strlen($str2);
        
        if ($len1 == 0 || $len2 == 0) return 0;
        
        similar_text($str1, $str2, $percent);
        return $percent / 100;
    }
}
