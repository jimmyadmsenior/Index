<header class="navbar-index" style="background:#111; width:100vw; min-width:100vw; box-shadow:none; border:none; margin:0; padding:0; position:relative; z-index:1001;">
  <div class="navbar-content" style="display:flex;align-items:center;justify-content:space-between;width:100vw;margin:0;padding:0 32px;height:64px;">
    <div class="navbar-logo">
      <a href="/Homepage_Com_Cadastro"><img src="/media/Logo_Branca.png" alt="Logo Index" style="height:32px;"></a>
    </div>
    <nav class="navbar-menu">
      <ul style="display:flex;gap:32px;margin:0;padding:0;list-style:none;">
        <li><a href="/Homepage_Smartphones" style="color:#fff;font-weight:600;text-decoration:none;font-size:1rem;">Smartphones</a></li>
        <li><a href="/Homepage_Tablets" style="color:#fff;font-weight:600;text-decoration:none;font-size:1rem;">Tablets</a></li>
        <li><a href="/Homepage_Fones" style="color:#fff;font-weight:600;text-decoration:none;font-size:1rem;">Fones</a></li>
        <li><a href="/Homepage_Relogios" style="color:#fff;font-weight:600;text-decoration:none;font-size:1rem;">Relógios</a></li>
        <li><a href="/Homepage_Notebooks" style="color:#fff;font-weight:600;text-decoration:none;font-size:1rem;">Notebooks</a></li>
      </ul>
    </nav>
    <div class="navbar-actions" style="display:flex;align-items:center;gap:18px;">
      <a href="/sacola" class="navbar-btn navbar-btn-sacola" title="Sacola" style="color:#fff;background:#111;border:none;font-size:1.5rem;display:flex;align-items:center;justify-content:center;"><i class="fas fa-shopping-bag"></i></a>
      @if (Request::is('/') || Request::is('Homepage_Sem_Cadastro'))
        <a href="/login" class="navbar-btn navbar-btn-login" style="color:#fff;background:#111;border:1.5px solid #fff;padding:7px 22px;border-radius:10px;font-weight:600;">Login</a>
        <a href="/cadastro" class="navbar-btn navbar-btn-cadastro" style="color:#fff;background:#111;border:1.5px solid #fff;padding:7px 22px;border-radius:10px;font-weight:600;">Cadastro</a>
      @else
        @auth
          <a href="/perfil" class="navbar-btn navbar-btn-perfil" title="Meu perfil" style="display:flex;align-items:center;gap:8px;color:#fff;background:#111;border:none;">
            @if(Auth::user() && Auth::user()->foto)
              <img src="{{ Auth::user()->foto }}" alt="Foto de perfil" style="width:32px;height:32px;border-radius:50%;object-fit:cover;border:2px solid #fff;background:#222;">
            @else
              <i class="fas fa-user" style="font-size:24px;color:#fff;"></i>
            @endif
          </a>
        @endauth
      @endif
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
.navbar-index a:hover {
  color: #ffd700 !important;
}
body { margin-top: 64px !important; }
</style>
