// Loading Screen Controller
class LoadingScreen {
    constructor() {
        this.duration = 3000; // 3 segundos
        this.hasBeenShown = false;
        this.init();
    }

    init() {
        // Verifica se é uma página de homepage
        const isHomepage = document.querySelector('meta[name="page-type"][content="homepage"]');
        
        // Só mostra o loading em páginas de homepage e se é a primeira visita na sessão
        if (isHomepage && !sessionStorage.getItem('loadingShown')) {
            this.createLoadingScreen();
            this.showLoading();
        }
    }

    createLoadingScreen() {
        // Cria o HTML do loading screen
        const loadingHTML = `
            <div id="loading-screen">
                <div class="loading-container">
                    <div class="loading-logo">INDEX</div>
                    <div class="loading-spinner">
                        <div class="spinner-ring"></div>
                    </div>
                    <div class="loading-text">Carregando sua experiência...</div>
                    <div class="loading-progress">
                        <div class="loading-progress-bar"></div>
                    </div>
                </div>
            </div>
        `;

        // Adiciona ao body
        document.body.insertAdjacentHTML('afterbegin', loadingHTML);
    }

    showLoading() {
        // Bloqueia o scroll da página
        document.body.style.overflow = 'hidden';
        
        // Esconde o loading após o tempo definido
        setTimeout(() => {
            this.hideLoading();
        }, this.duration);

        // Marca que o loading já foi mostrado nesta sessão
        sessionStorage.setItem('loadingShown', 'true');
    }

    hideLoading() {
        const loadingScreen = document.getElementById('loading-screen');
        if (loadingScreen) {
            loadingScreen.classList.add('hidden');
            
            // Remove o loading do DOM após a animação
            setTimeout(() => {
                loadingScreen.remove();
                // Restaura o scroll da página
                document.body.style.overflow = '';
            }, 800); // Tempo da animação de fade-out
        }
    }

    // Método para forçar mostrar o loading (opcional)
    forceShow() {
        sessionStorage.removeItem('loadingShown');
        this.createLoadingScreen();
        this.showLoading();
    }
}

// Inicializa o loading quando o DOM estiver pronto
document.addEventListener('DOMContentLoaded', function() {
    new LoadingScreen();
});

// Opcional: Adiciona um método global para reset do loading (para desenvolvimento/teste)
window.resetLoading = function() {
    sessionStorage.removeItem('loadingShown');
    location.reload();
};