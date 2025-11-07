<header class="navbar-index" style="background:#111; width:100%; min-width:0; box-shadow:none; border:none; margin:0; padding:0; position:relative; z-index:1001;">
  <div class="navbar-content" style="width:100%;padding:0;">
    <div style="display:grid;grid-template-columns:1.2fr auto 1fr;align-items:center;max-width:1300px;width:100%;margin:0 auto;padding:0 32px 0 32px;height:64px;box-sizing:border-box;">
      <div style="justify-self:start;">
        <a href="/"><img src="/media/Logo_Branca.png" alt="Logo Index" style="height:32px;"></a>
      </div>
      <nav class="navbar-menu" style="justify-self:center;height:64px;display:flex;align-items:center;">
        <ul style="display:flex;gap:32px;margin:0 auto;padding:0;list-style:none;align-items:center;height:64px;">
          <li><a href="/Homepage_Smartphones" style="color:#fff;font-weight:600;text-decoration:none;font-size:1rem;">Smartphones</a></li>
          <li><a href="/Homepage_Tablets" style="color:#fff;font-weight:600;text-decoration:none;font-size:1rem;">Tablets</a></li>
          <li><a href="/Homepage_Fones" style="color:#fff;font-weight:600;text-decoration:none;font-size:1rem;">Fones</a></li>
          <li><a href="/Homepage_Relógios" style="color:#fff;font-weight:600;text-decoration:none;font-size:1rem;">Relógios</a></li>
          <li><a href="/Homepage_Notebooks" style="color:#fff;font-weight:600;text-decoration:none;font-size:1rem;">Notebooks</a></li>
        </ul>
      </nav>
      <div class="navbar-actions" style="display:flex;align-items:center;gap:18px;justify-self:end;padding-left:56px;">
        <a href="/carrinho" class="navbar-btn navbar-btn-sacola" title="Carrinho" style="color:#fff;background:#111;border:none;font-size:1.5rem;display:flex;align-items:center;justify-content:center;position:relative;padding:8px;text-decoration:none;">
          <i class="fas fa-shopping-cart" style="font-size:1.5rem;color:#fff;"></i>
          @php
            $carrinho = session()->get('carrinho', []);
            $cart_count = array_sum(array_column($carrinho, 'quantidade'));
          @endphp
          @if($cart_count > 0)
            <span class="cart-count" style="position:absolute;top:-2px;right:-2px;background:#ff4757;color:#fff;border-radius:50%;width:22px;height:22px;font-size:0.75rem;display:flex;align-items:center;justify-content:center;font-weight:bold;min-width:22px;font-family:'Geoform',Arial,sans-serif;">{{ $cart_count }}</span>
          @endif
        </a>
        @auth
          <a href="/perfil" class="navbar-btn navbar-btn-perfil" title="Meu perfil" style="display:flex;align-items:center;gap:8px;color:#fff;background:#111;border:none;">
            @if(Auth::user() && Auth::user()->foto)
              <img src="{{ Auth::user()->foto }}" alt="Foto de perfil" style="width:32px;height:32px;border-radius:50%;object-fit:cover;border:2px solid #fff;background:#222;">
            @else
              <i class="fas fa-user" style="font-size:24px;color:#fff;"></i>
            @endif
          </a>
        @else
          <a href="/login" class="navbar-btn navbar-btn-login" style="color:#fff;background:#111;border:1.5px solid #fff;padding:7px 22px;border-radius:10px;font-weight:600;">Login</a>
          <a href="/cadastro" class="navbar-btn navbar-btn-cadastro" style="color:#fff;background:#111;border:1.5px solid #fff;padding:7px 22px;border-radius:10px;font-weight:600;">Cadastro</a>
        @endauth
      </div>
    </div>
    </div>
  </div>
</header>
<style>
.navbar-index {
  background: #111 !important;
  color: #fff !important;
  width: 100vw !important;
  min-width: 100vw !important;
  margin: 0 !important;
  padding: 0 !important;
  border: none !important;
  box-shadow: none !important;
  position: relative;
  z-index: 1001;
}
.navbar-index, .navbar-index * {
  background: #111 !important;
  color: #fff !important;
  border: none;
  box-shadow: none;
}


.navbar-index a, .navbar-index a:visited {
  color: #fff !important;
  text-decoration: none;
}
.navbar-index a:hover, .navbar-index ul li a:hover {
  color: #fff !important; /* Remove hover azul, mantém branco */
}

</style>
