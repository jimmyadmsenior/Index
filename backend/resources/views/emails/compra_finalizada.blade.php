<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Compra Finalizada - Index</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #000; color: #fff; padding: 20px; text-align: center; }
        .content { padding: 20px; background: #f9f9f9; }
        .produto-item { background: #fff; padding: 15px; margin: 10px 0; border-radius: 5px; }
        .total { font-size: 1.2em; font-weight: bold; color: #000; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>✅ Compra realizada com sucesso!</h1>
        </div>
        <div class="content">
            <p><strong>Código de rastreamento:</strong> {{ $codigoRastreamento }}</p>
            
            <h3>📦 Produtos comprados:</h3>
            @foreach($pedido->produtos as $item)
                <div class="produto-item">
                    <p><strong>{{ $item['nome'] }}</strong></p>
                    <p>Quantidade: {{ $item['quantidade'] }}</p>
                    <p>Valor unitário: R$ {{ number_format($item['preco'], 2, ',', '.') }}</p>
                    <p>Subtotal: R$ {{ number_format($item['subtotal'], 2, ',', '.') }}</p>
                </div>
            @endforeach
            
            <div class="total">
                <p>💰 <strong>Valor total: R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</strong></p>
            </div>
            
            <p>🚚 Em breve você receberá mais informações sobre o envio.</p>
            <p>Obrigado por comprar conosco!</p>
            
            <hr>
            <p><small>Index - Tecnologia de ponta ao seu alcance</small></p>
        </div>
    </div>
</body>
</html>