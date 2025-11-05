<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        $rules = [
            'tipo_compra' => 'required|in:produto,carrinho',
        ];

        // Adiciona campos específicos baseado no tipo de compra
        if ($this->tipo_compra === 'produto') {
            $rules['produto_id'] = 'required|exists:produtos,id';
        } elseif ($this->tipo_compra === 'carrinho') {
            $rules['produtos'] = 'required|array';
            $rules['produtos.*'] = 'required|integer|min:1';
            $rules['total'] = 'required|numeric|min:0';
        }

        // Validações específicas por método de pagamento
        if ($this->metodo_pagamento === 'credito' || $this->metodo_pagamento === 'debito') {
            $rules += [
                'nome_cartao' => 'required|string|max:255|regex:/^[a-zA-ZÀ-ÿ\s]+$/',
                'numero_cartao' => 'required|string|size:19|regex:/^\d{4}\s\d{4}\s\d{4}\s\d{4}$/',
                'validade' => 'required|string|size:5|regex:/^(0[1-9]|1[0-2])\/\d{2}$/',
                'cvv' => 'required|string|size:3|regex:/^\d{3}$/',
            ];

            if ($this->metodo_pagamento === 'credito') {
                $rules['parcelas'] = 'required|integer|between:1,12';
            }

            if ($this->metodo_pagamento === 'debito') {
                $rules['senha_cartao'] = 'required|string|between:4,6|regex:/^\d+$/';
            }
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'nome_cartao.regex' => 'Nome do cartão deve conter apenas letras.',
            'numero_cartao.regex' => 'Número do cartão deve estar no formato: 0000 0000 0000 0000',
            'validade.regex' => 'Validade deve estar no formato: MM/AA',
            'cvv.regex' => 'CVV deve conter apenas 3 dígitos.',
            'senha_cartao.regex' => 'Senha deve conter apenas números.',
        ];
    }
}