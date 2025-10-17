<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Painel Administrativo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .sidebar-transition {
            transition: all 0.3s ease-in-out;
        }
        
        .nav-link {
            transition: all 0.2s ease-in-out;
        }
        
        .nav-link:hover {
            transform: translateX(4px);
        }
        
        .nav-link.active {
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="bg-gradient-to-b from-gray-800 to-gray-900 text-white w-64 sidebar-transition">
            <div class="p-6 border-b border-gray-700">
                <div class="flex items-center">
                    <div class="bg-gradient-to-r from-blue-500 to-purple-600 w-10 h-10 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold">Admin Panel</h1>
                        <p class="text-xs text-gray-400">Sistema de Gestão</p>
                    </div>
                </div>
            </div>

            <!-- User Info -->
            <div class="p-4 border-b border-gray-700">
                <div class="flex items-center">
                    <div class="bg-gradient-to-r from-green-500 to-teal-500 w-10 h-10 rounded-full flex items-center justify-center mr-3">
                        <span class="text-white font-bold text-sm">{{ substr(Auth::guard('admin')->user()->nome, 0, 1) }}</span>
                    </div>
                    <div>
                        <p class="font-semibold text-sm">{{ Auth::guard('admin')->user()->nome }}</p>
                        <div class="flex items-center">
                            <span class="px-2 py-1 text-xs rounded-full {{ Auth::guard('admin')->user()->isMaster() ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800' }}">
                                {{ Auth::guard('admin')->user()->isMaster() ? 'Master' : 'Operador' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="p-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" 
                   class="nav-link flex items-center px-4 py-3 rounded-lg {{ Request::routeIs('admin.dashboard') ? 'active' : 'hover:bg-gray-700' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2H3z"></path>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.pedidos') }}" 
                   class="nav-link flex items-center px-4 py-3 rounded-lg {{ Request::routeIs('admin.pedidos*') ? 'active' : 'hover:bg-gray-700' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 14H6L5 9z"></path>
                    </svg>
                    Pedidos
                    <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">3</span>
                </a>

                <a href="{{ route('admin.usuarios') }}" 
                   class="nav-link flex items-center px-4 py-3 rounded-lg {{ Request::routeIs('admin.usuarios*') ? 'active' : 'hover:bg-gray-700' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                    Usuários
                </a>

                <a href="{{ route('admin.produtos') }}" 
                   class="nav-link flex items-center px-4 py-3 rounded-lg {{ Request::routeIs('admin.produtos*') ? 'active' : 'hover:bg-gray-700' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    Produtos
                </a>

                <a href="{{ route('admin.logs') }}" 
                   class="nav-link flex items-center px-4 py-3 rounded-lg {{ Request::routeIs('admin.logs*') ? 'active' : 'hover:bg-gray-700' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Logs do Sistema
                </a>
            </nav>

            <!-- Logout -->
            <div class="absolute bottom-4 left-4 right-4">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" 
                            class="w-full flex items-center px-4 py-3 text-red-300 hover:text-red-100 hover:bg-red-900/20 rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Sair
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <header class="bg-white border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <button id="sidebarToggle" class="text-gray-500 hover:text-gray-700 mr-4 lg:hidden">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <h2 class="text-2xl font-bold text-gray-800">@yield('title', 'Dashboard')</h2>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <div class="relative">
                            <button class="text-gray-500 hover:text-gray-700 p-2 rounded-full hover:bg-gray-100">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-3 3-3-3h1m-6-11a6 6 0 11-12 0 6 6 0 0112 0zm-6 0v6"></path>
                                </svg>
                                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                            </button>
                        </div>
                        
                        <!-- User Menu -->
                        <div class="flex items-center text-sm">
                            <span class="text-gray-600 mr-2">Logado como:</span>
                            <span class="text-gray-800 font-medium">
                                {{ Auth::guard('admin')->user()->nome }}
                            </span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-gray-50 p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Toggle sidebar for mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        });

        // Auto-refresh notifications every 30 seconds
        setInterval(() => {
            // Implementar refresh de notificações
        }, 30000);

        // CSRF token for AJAX requests
        window.Laravel = {
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        };
    </script>
</body>
</html>