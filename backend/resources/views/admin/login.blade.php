<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Admin - Login Administrativo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        @import url('/media/Css/Geoform-Regular.ttf');
        
        * {
            font-family: 'Inter', 'Geoform', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        body {
            background: radial-gradient(ellipse at center, #232323 0%, #111 100%);
            min-height: 100vh;
            position: relative;
        }
        
        /* Efeito de partículas animadas */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }
        
        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        
        .particle:nth-child(odd) {
            animation-delay: -2s;
            background: rgba(255, 255, 255, 0.15);
        }
        
        .particle:nth-child(3n) {
            animation-delay: -4s;
            background: rgba(255, 255, 255, 0.08);
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0; }
            50% { transform: translateY(-100px) rotate(180deg); opacity: 1; }
        }
        
        /* Container principal com glassmorphism */
        .login-container {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 
                0 25px 45px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 10;
        }
        
        /* Logo animado */
        .logo-container {
            background: linear-gradient(135deg, #ffffff, #f8f9fa, #e9ecef);
            background-size: 300% 300%;
            animation: gradientShift 4s ease infinite;
            position: relative;
            overflow: hidden;
        }
        
        .logo-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            transform: rotate(45deg);
            animation: shine 3s ease-in-out infinite;
        }
        
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }
        
        /* Inputs estilizados */
        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
        
        .input-field {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            color: #fff;
        }
        
        .input-field:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: #ffffff;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }
        
        .input-field::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        
        .input-icon {
            color: rgba(255, 255, 255, 0.4);
            transition: all 0.3s ease;
        }
        
        .input-field:focus + .input-icon {
            color: #ffffff;
        }
        
        /* Botão principal */
        .login-button {
            background: linear-gradient(135deg, #ffffff, #f8f9fa);
            border: none;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            color: #111;
        }
        
        .login-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }
        
        .login-button:hover::before {
            left: 100%;
        }
        
        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(255, 255, 255, 0.3);
        }
        
        /* Efeito de ripple nos clicks */
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: scale(0);
            animation: ripple-animation 0.6s linear;
            pointer-events: none;
        }
        
        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        
        /* Alertas personalizados */
        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            backdrop-filter: blur(10px);
            animation: slideDown 0.3s ease;
        }
        
        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid rgba(34, 197, 94, 0.3);
            backdrop-filter: blur(10px);
            animation: slideDown 0.3s ease;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Link de retorno */
        .back-link {
            color: rgba(255, 255, 255, 0.6);
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .back-link:hover {
            color: #ffffff;
            transform: translateX(-5px);
        }
        
        /* Responsividade */
        @media (max-width: 640px) {
            .login-container {
                margin: 1rem;
                padding: 2rem 1.5rem;
            }
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <!-- Partículas animadas de fundo -->
    <div class="particles">
        <div class="particle" style="left: 10%; top: 20%; animation-delay: 0s;"></div>
        <div class="particle" style="left: 20%; top: 80%; animation-delay: -1s;"></div>
        <div class="particle" style="left: 30%; top: 40%; animation-delay: -2s;"></div>
        <div class="particle" style="left: 40%; top: 70%; animation-delay: -3s;"></div>
        <div class="particle" style="left: 50%; top: 10%; animation-delay: -4s;"></div>
        <div class="particle" style="left: 60%; top: 60%; animation-delay: -5s;"></div>
        <div class="particle" style="left: 70%; top: 30%; animation-delay: -6s;"></div>
        <div class="particle" style="left: 80%; top: 90%; animation-delay: -7s;"></div>
        <div class="particle" style="left: 90%; top: 50%; animation-delay: -8s;"></div>
        <div class="particle" style="left: 15%; top: 65%; animation-delay: -1.5s;"></div>
    </div>

    <div class="login-container p-8 rounded-3xl w-full max-w-md mx-4">
        <div class="text-center mb-8">
            <!-- Logo com efeito especial -->
            <div class="logo-container w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 relative">
                <svg class="w-10 h-10 text-black relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
            </div>
            
            <!-- Título estilizado -->
            <h1 class="text-3xl font-bold bg-gradient-to-r from-white via-gray-100 to-gray-200 bg-clip-text text-transparent mb-3">
                Index Admin
            </h1>
            <p class="text-gray-300 text-lg font-medium">Central de Controle</p>
            <div class="w-16 h-1 bg-gradient-to-r from-white to-gray-300 mx-auto mt-4 rounded-full"></div>
        </div>

        @if ($errors->any())
            <div class="alert-error rounded-xl p-4 mb-6">
                <div class="flex items-center">
                    <div class="bg-red-500/20 p-2 rounded-lg mr-3">
                        <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-red-300 font-medium text-sm">Erro de Autenticação</p>
                        <p class="text-red-200 text-xs">{{ $errors->first() }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('success'))
            <div class="alert-success rounded-xl p-4 mb-6">
                <div class="flex items-center">
                    <div class="bg-green-500/20 p-2 rounded-lg mr-3">
                        <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-green-300 font-medium text-sm">Sucesso!</p>
                        <p class="text-green-200 text-xs">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}" class="space-y-6" id="loginForm">
            @csrf
            
            <div class="input-group">
                <label for="email" class="block text-sm font-medium text-gray-200 mb-3">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                        Email Administrativo
                    </span>
                </label>
                <div class="relative">
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autocomplete="email"
                           class="input-field w-full pl-12 pr-4 py-4 rounded-xl focus:outline-none transition-all"
                           placeholder="admin@sistema.com">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="input-group">
                <label for="password" class="block text-sm font-medium text-gray-200 mb-3">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Senha de Acesso
                    </span>
                </label>
                <div class="relative">
                    <input type="password" 
                           id="password" 
                           name="password" 
                           required 
                           autocomplete="current-password"
                           class="input-field w-full pl-12 pr-12 py-4 rounded-xl focus:outline-none transition-all"
                           placeholder="Digite sua senha secreta">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 input-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-4 flex items-center">
                        <svg class="w-5 h-5 text-gray-400 hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center cursor-pointer group">
                    <div class="relative">
                        <input type="checkbox" name="remember" class="sr-only">
                        <div class="checkbox-bg w-5 h-5 rounded border-2 border-gray-500 bg-transparent transition-all duration-200 group-hover:border-white"></div>
                        <svg class="checkbox-icon w-3 h-3 text-black absolute top-0.5 left-0.5 opacity-0 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <span class="ml-3 text-sm text-gray-300 group-hover:text-white transition-colors">Manter-me conectado</span>
                </label>
                
                <div class="text-xs text-gray-400">
                    <span class="inline-flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Acesso Seguro
                    </span>
                </div>
            </div>

            <button type="submit" 
                    class="login-button w-full py-4 px-6 rounded-xl font-bold text-lg relative overflow-hidden focus:outline-none transition-all duration-300">
                <span class="relative z-10 flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    Acessar Painel
                </span>
            </button>
        </form>



        <div class="mt-6 text-center">
            <a href="/" class="back-link inline-flex items-center text-sm font-medium">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Voltar ao Index
            </a>
        </div>

        <div class="mt-4 text-center">
            <p class="text-xs text-gray-500 font-medium flex items-center justify-center">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                Área Administrativa Protegida
            </p>
        </div>
    </div>

    <script>
        // Auto-focus no primeiro campo com delay
        setTimeout(() => {
            document.getElementById('email').focus();
        }, 500);
        
        // Toggle da visibilidade da senha
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('svg');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L8.464 8.464M14.12 14.12l1.415 1.415"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                `;
            } else {
                passwordInput.type = 'password';
                icon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                `;
            }
        });
        
        // Checkbox personalizado
        document.querySelector('input[name="remember"]').addEventListener('change', function() {
            const checkboxBg = document.querySelector('.checkbox-bg');
            const checkboxIcon = document.querySelector('.checkbox-icon');
            
            if (this.checked) {
                checkboxBg.classList.add('bg-white', 'border-white');
                checkboxIcon.classList.add('opacity-100');
            } else {
                checkboxBg.classList.remove('bg-white', 'border-white');
                checkboxIcon.classList.remove('opacity-100');
            }
        });
        
        // Efeito ripple nos botões
        function createRipple(event) {
            const button = event.currentTarget;
            const circle = document.createElement('span');
            const diameter = Math.max(button.clientWidth, button.clientHeight);
            const radius = diameter / 2;
            
            circle.style.width = circle.style.height = `${diameter}px`;
            circle.style.left = `${event.clientX - button.offsetLeft - radius}px`;
            circle.style.top = `${event.clientY - button.offsetTop - radius}px`;
            circle.classList.add('ripple');
            
            const ripple = button.getElementsByClassName('ripple')[0];
            if (ripple) {
                ripple.remove();
            }
            
            button.appendChild(circle);
        }
        
        document.querySelector('.login-button').addEventListener('click', createRipple);
        
        // Animação de loading no submit
        document.getElementById('loginForm').addEventListener('submit', function() {
            const button = this.querySelector('button[type="submit"]');
            const originalContent = button.innerHTML;
            
            button.innerHTML = `
                <span class="relative z-10 flex items-center justify-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Autenticando...
                </span>
            `;
            button.disabled = true;
            
            // Se houver erro, restaura o botão após 3s
            setTimeout(() => {
                if (button.disabled) {
                    button.innerHTML = originalContent;
                    button.disabled = false;
                }
            }, 3000);
        });
        
        // Animação suave dos inputs
        document.querySelectorAll('.input-field').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
        
        // Partículas dinâmicas
        function addRandomParticle() {
            const particles = document.querySelector('.particles');
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 6 + 's';
            
            particles.appendChild(particle);
            
            setTimeout(() => {
                particle.remove();
            }, 6000);
        }
        
        // Adiciona nova partícula a cada 2 segundos
        setInterval(addRandomParticle, 2000);
        
        // Debug form submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            console.log('Form being submitted...');
            console.log('Action:', this.action);
            console.log('Method:', this.method);
            console.log('Email:', document.getElementById('email').value);
            console.log('Password length:', document.getElementById('password').value.length);
        });
    </script>
</body>
</html>