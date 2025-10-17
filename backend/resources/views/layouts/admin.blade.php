<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Index Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 100%);
            min-height: 100vh;
        }
        
        .sidebar-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .nav-link {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s ease;
        }
        
        .nav-link:hover::before {
            left: 100%;
        }
        
        .nav-link:hover {
            transform: translateX(8px);
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }
        
        .nav-link.active {
            background: linear-gradient(135deg, #ffffff 0%, #f3f4f6 100%);
            color: #111827;
            box-shadow: 0 10px 25px rgba(255, 255, 255, 0.2);
            transform: translateX(8px);
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }
        
        .admin-header {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .glow-effect {
            position: relative;
        }
        
        .glow-effect::after {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #ffffff, #f3f4f6);
            border-radius: inherit;
            z-index: -1;
            filter: blur(4px);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .glow-effect:hover::after {
            opacity: 0.3;
        }
    </style>
</head>
<body class="bg-black text-white font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="bg-gradient-to-b from-black via-gray-900 to-black w-64 sidebar-transition border-r border-gray-800">
            <!-- Logo Section -->
            <div class="p-6 border-b border-gray-800">
                <div class="flex items-center">
                    <div class="glass-card w-12 h-12 rounded-xl flex items-center justify-center mr-4 glow-effect">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">Index Admin</h1>
                        <p class="text-xs text-gray-400 font-medium">Sistema de Gestão</p>
                    </div>
                </div>
            </div>

            <!-- User Info -->
            <div class="p-4 border-b border-gray-800">
                <div class="glass-card rounded-xl p-4">
                    <div class="flex items-center">
                        <div class="bg-gradient-to-r from-white to-gray-300 w-12 h-12 rounded-full flex items-center justify-center mr-3">
                            <span class="text-black font-bold text-lg">{{ substr(Auth::guard('admin')->user()->nome, 0, 1) }}</span>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-white">{{ Auth::guard('admin')->user()->nome }}</p>
                            <div class="flex items-center mt-1">
                                <span class="px-2 py-1 text-xs rounded-full bg-white text-black font-medium">
                                    Master
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="p-4 space-y-3">
                <a href="{{ route('admin.dashboard') }}" 
                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.dashboard') ? 'active' : 'text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2H3z"></path>
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>

                <a href="{{ route('admin.pedidos') }}" 
                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.pedidos*') ? 'active' : 'text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 14H6L5 9z"></path>
                    </svg>
                    <span class="font-medium">Pedidos</span>
                    <span class="ml-auto bg-white text-black text-xs px-2 py-1 rounded-full font-semibold">3</span>
                </a>

                <a href="{{ route('admin.usuarios') }}" 
                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.usuarios*') ? 'active' : 'text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                    </svg>
                    <span class="font-medium">Usuários</span>
                </a>

                <a href="{{ route('admin.produtos') }}" 
                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.produtos*') ? 'active' : 'text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <span class="font-medium">Produtos</span>
                </a>

                <a href="{{ route('admin.logs') }}" 
                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.logs*') ? 'active' : 'text-gray-300 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span class="font-medium">Logs do Sistema</span>
                </a>
            </nav>

            <!-- Bottom Section -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-800">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="nav-link w-full flex items-center px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-red-900/20">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span class="font-medium">Sair</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="admin-header px-6 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <button id="sidebarToggle" class="lg:hidden mr-4 p-2 rounded-lg hover:bg-gray-800 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <div>
                            <h2 class="text-2xl font-bold text-white">@yield('title', 'Dashboard')</h2>
                            <p class="text-gray-400 text-sm">@yield('subtitle', 'Painel de controle administrativo')</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center">
                            <div class="bg-gradient-to-r from-white to-gray-300 w-10 h-10 rounded-full flex items-center justify-center mr-3">
                                <span class="text-black font-bold text-sm">{{ substr(Auth::guard('admin')->user()->nome, 0, 1) }}</span>
                            </div>
                            <div>
                                <p class="text-white font-medium">{{ Auth::guard('admin')->user()->nome }}</p>
                                <p class="text-gray-400 text-xs">Administrador Master</p>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-transparent">
                <div class="container mx-auto px-6 py-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Toggle sidebar
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        });

        // Mobile sidebar overlay
        if (window.innerWidth < 1024) {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.add('-translate-x-full');
        }
    </script>
    
    @stack('scripts')
</body>
</html>