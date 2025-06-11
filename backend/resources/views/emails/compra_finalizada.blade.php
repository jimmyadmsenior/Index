<h2>Compra realizada com sucesso!</h2>
<p>Produto: <b>{{ $produto->nome }}</b></p>
<p>Valor: R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
<p>Código de rastreamento: <b>{{ $codigoRastreamento }}</b></p>
<p>Em breve você receberá mais informações sobre o envio.</p>
<p>Obrigado por comprar conosco!</p>