<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Finalizada</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            font-size: 32px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .title {
            color: #28a745;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .info-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .info-label {
            font-weight: bold;
            color: #555;
        }
        .info-value {
            color: #333;
        }
        .product-list {
            margin: 15px 0;
        }
        .product-item {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }
        .tracking-code {
            background-color: #007bff;
            color: white;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="logo">INDEX</div>
            <h2 class="title">✅ Compra realizada com sucesso!</h2>
        </div>

        <p>Olá <strong>{{ $produto->nome ?? 'Cliente' }}</strong>,</p>
        <p>Sua compra foi finalizada com sucesso! Abaixo estão os detalhes do seu pedido:</p>

        <div class="info-section">
            <div class="info-row">
                <span class="info-label">Pedido:</span>
                <span class="info-value">#{{ $codigoRastreamento->id ?? 'N/A' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Data:</span>
                <span class="info-value">{{ $codigoRastreamento->created_at ? $codigoRastreamento->created_at->format('d/m/Y H:i') : date('d/m/Y H:i') }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Valor Total:</span>
                <span class="info-value"><strong>R$ {{ $codigoRastreamento->valor_total ? number_format($codigoRastreamento->valor_total, 2, ',', '.') : '0,00' }}</strong></span>
            </div>
            <div class="info-row">
                <span class="info-label">Status:</span>
                <span class="info-value">{{ $codigoRastreamento->status ?? 'Processando' }}</span>
            </div>
        </div>

        @if($codigoRastreamento->produtos)
            <div class="info-section">
                <h3 style="margin-top: 0;">Produtos:</h3>
                <div class="product-list">
                    @foreach($codigoRastreamento->produtos as $item)
                        <div class="product-item">
                            <strong>{{ $item['nome'] ?? 'Produto' }}</strong><br>
                            <span style="color: #666;">Quantidade: {{ $item['quantidade'] ?? 1 }}</span><br>
                            <span style="color: #666;">Preço: R$ {{ isset($item['preco']) ? number_format($item['preco'], 2, ',', '.') : '0,00' }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="tracking-code">
            <h3 style="margin: 0 0 10px 0;">Código de Rastreamento</h3>
            <p style="margin: 0; font-size: 18px; font-weight: bold;">{{ $codigoRastreamento->codigo_rastreamento ?? 'Será enviado em breve' }}</p>
        </div>

        <p>Em breve você receberá mais informações sobre o envio.</p>
        <p><strong>Obrigado por comprar conosco!</strong></p>

        <div class="footer">
            <p>Este é um e-mail automático, não responda.</p>
            <p>Se tiver dúvidas, entre em contato através do nosso site.</p>
        </div>
    </div>
</body>
</html>