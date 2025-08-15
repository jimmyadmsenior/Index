@extends('layouts.app')

@section('head')
<!-- Confetti.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
@endsection

@section('content')
<div class="main-homepage" style="min-height:70vh;display:flex;flex-direction:column;align-items:center;justify-content:center;">
		<div id="confetti-canvas" style="position:fixed;top:0;left:0;width:100vw;height:100vh;pointer-events:none;z-index:9999;"></div>
		<div class="confirmation-container" style="background:rgba(30,30,30,0.97);border-radius:24px;padding:48px 32px;box-shadow:0 8px 32px rgba(0,0,0,0.22);text-align:center;max-width:420px;width:100%;margin:0 auto;display:flex;flex-direction:column;align-items:center;">
			<img src="/media/Ícone_Check_Verde.png" alt="Check" style="width:64px;margin-bottom:18px;display:block;align-self:center;"/>
				<h1 style="color:#00c86f;font-size:2rem;font-weight:800;margin-bottom:12px;">Compra Finalizada!</h1>
				<p style="color:#fff;font-size:1.13rem;margin-bottom:22px;">Seu pagamento foi aprovado e sua compra foi concluída com sucesso.<br>Você receberá um e-mail com os detalhes e o código de rastreamento.<br><b>Obrigado por comprar conosco!</b></p>
				<a href="/Homepage_Com_Cadastro" class="featured-link" style="display:inline-block;margin-top:10px;padding:14px 40px;font-size:1.08rem;border-radius:10px;background:#00c86f;color:#fff;font-weight:700;text-decoration:none;">Voltar para a Home</a>
		</div>
</div>
<script>
// Confetti animation ao carregar a página
window.onload = function() {
	confetti({
		particleCount: 180,
		spread: 90,
		origin: { y: 0.3 },
		zIndex: 9999
	});
	setTimeout(() => {
		confetti({
			particleCount: 120,
			spread: 70,
			origin: { y: 0.1 },
			zIndex: 9999
		});
	}, 600);
};
</script>
@endsection
