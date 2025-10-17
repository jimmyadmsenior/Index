<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuração Inicial - Sistema Administrativo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-2xl">
        <div class="text-center mb-8">
            <div class="bg-gradient-to-r from-green-600 to-blue-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Configuração Inicial</h1>
            <p class="text-gray-600">Crie as duas contas de administrador do sistema</p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                <h3 class="text-red-800 font-semibold mb-2">Corrija os seguintes erros:</h3>
                <ul class="text-red-700 text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.setup') }}" class="space-y-8">
            @csrf
            
            <!-- Administrador Master -->
            <div class="bg-gradient-to-r from-blue-50 to-purple-50 p-6 rounded-lg border border-blue-200">
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <div class="bg-blue-600 w-8 h-8 rounded-full flex items-center justify-center mr-3">
                        <span class="text-white font-bold text-sm">1</span>
                    </div>
                    Administrador Master (Acesso Total)
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="admin1_nome" class="block text-sm font-medium text-gray-700 mb-2">Nome Completo</label>
                        <input type="text" 
                               id="admin1_nome" 
                               name="admin1_nome" 
                               value="{{ old('admin1_nome') }}" 
                               required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Digite o nome completo">
                    </div>
                    
                    <div>
                        <label for="admin1_email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" 
                               id="admin1_email" 
                               name="admin1_email" 
                               value="{{ old('admin1_email') }}" 
                               required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="admin1@exemplo.com">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label for="admin1_password" class="block text-sm font-medium text-gray-700 mb-2">Senha</label>
                        <input type="password" 
                               id="admin1_password" 
                               name="admin1_password" 
                               required 
                               minlength="8"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Mínimo 8 caracteres">
                    </div>
                    
                    <div>
                        <label for="admin1_password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirmar Senha</label>
                        <input type="password" 
                               id="admin1_password_confirmation" 
                               name="admin1_password_confirmation" 
                               required 
                               minlength="8"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Digite a senha novamente">
                    </div>
                </div>
            </div>

            <!-- Administrador Operador -->
            <div class="bg-gradient-to-r from-green-50 to-teal-50 p-6 rounded-lg border border-green-200">
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <div class="bg-green-600 w-8 h-8 rounded-full flex items-center justify-center mr-3">
                        <span class="text-white font-bold text-sm">2</span>
                    </div>
                    Administrador Operador (Acesso Limitado)
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="admin2_nome" class="block text-sm font-medium text-gray-700 mb-2">Nome Completo</label>
                        <input type="text" 
                               id="admin2_nome" 
                               name="admin2_nome" 
                               value="{{ old('admin2_nome') }}" 
                               required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                               placeholder="Digite o nome completo">
                    </div>
                    
                    <div>
                        <label for="admin2_email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" 
                               id="admin2_email" 
                               name="admin2_email" 
                               value="{{ old('admin2_email') }}" 
                               required 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                               placeholder="admin2@exemplo.com">
                    </div>
                </div>
                
                <div class="mt-4">
                    <label for="admin2_password" class="block text-sm font-medium text-gray-700 mb-2">Senha</label>
                    <input type="password" 
                           id="admin2_password" 
                           name="admin2_password" 
                           required 
                           minlength="8"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                           placeholder="Mínimo 8 caracteres">
                </div>
            </div>

            <!-- Informações Importantes -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-yellow-400 mt-0.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                    <div class="text-yellow-800 text-sm">
                        <p class="font-semibold mb-1">Informações importantes:</p>
                        <ul class="space-y-1">
                            <li>• O <strong>Administrador Master</strong> terá acesso total ao sistema</li>
                            <li>• O <strong>Administrador Operador</strong> terá acesso limitado para operações do dia a dia</li>
                            <li>• Guarde essas credenciais em local seguro</li>
                            <li>• Esta configuração só pode ser feita uma vez</li>
                        </ul>
                    </div>
                </div>
            </div>

            <button type="submit" 
                    class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-4 px-6 rounded-lg font-semibold text-lg hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105">
                Criar Administradores e Finalizar Configuração
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-xs text-gray-500">
                Após criar os administradores, você será redirecionado para a tela de login
            </p>
        </div>
    </div>

    <script>
        // Validação de confirmação de senha em tempo real
        const password = document.getElementById('admin1_password');
        const confirmPassword = document.getElementById('admin1_password_confirmation');
        
        function validatePassword() {
            if (password.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity('As senhas não coincidem');
            } else {
                confirmPassword.setCustomValidity('');
            }
        }
        
        password.addEventListener('input', validatePassword);
        confirmPassword.addEventListener('input', validatePassword);
        
        // Auto-focus no primeiro campo
        document.getElementById('admin1_nome').focus();
        
        // Adiciona animação de loading no botão
        document.querySelector('form').addEventListener('submit', function() {
            const button = this.querySelector('button[type="submit"]');
            button.innerHTML = `
                <div class="flex items-center justify-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Criando administradores...
                </div>
            `;
            button.disabled = true;
        });
    </script>
</body>
</html>