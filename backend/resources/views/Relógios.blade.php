<link rel="icon" type="image/png" href="/media/Ícone_Guia_Navegador_Site.png">
<link rel="stylesheet" href="/media/Css/Relógios.css" />
<div class="logo">
        @if(Auth::check())
            <a href="/Homepage_Com_Cadastro"><img src="/media/Logo_Branca.png" alt="Logo da empresa"></a>
        @else
            <a href="/"><img src="/media/Logo_Branca.png" alt="Logo da empresa"></a>
        @endif
      </div>