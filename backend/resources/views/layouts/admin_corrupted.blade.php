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
        @import url('/media/Css/Geoform-Regular.ttf');
        
        * {
            font-family: 'Inter', 'Geoform', -apple-system, BlinkMacSystemFont, sans-serif;
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
        </div>
    </div>
</body>
</html>
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
        @import url('/media/Css/Geoform-Regular.ttf');
        
        * {
            font-family: 'Inter', 'Geoform', -apple-system, BlinkMacSystemFont, sans-serif;
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

            <!-- Logo Section -->        }        }

            <div class="p-6 border-b border-gray-800">

                <div class="flex items-center">                

                    <div class="glass-card w-12 h-12 rounded-xl flex items-center justify-center mr-4 glow-effect">

                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">        .nav-link.active {        .nav-link.active {

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>

                        </svg>            background: linear-gradient(135deg, #ffffff 0%, #f3f4f6 100%);            background: linear-gradient(135deg, #ffffff 0%, #f3f4f6 100%);

                    </div>

                    <div>            color: #111827;            color: #111827;

                        <h1 class="text-xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">Index Admin</h1>

                        <p class="text-xs text-gray-400 font-medium">Sistema de Gestão</p>            box-shadow: 0 10px 25px rgba(255, 255, 255, 0.2);            box-shadow: 0 10px 25px rgba(255, 255, 255, 0.2);

                    </div>

                </div>            transform: translateX(8px);            transform: translateX(8px);

            </div>

        }        }

            <!-- User Info -->

            <div class="p-4 border-b border-gray-800">                

                <div class="glass-card rounded-xl p-4">

                    <div class="flex items-center">        .glass-card {        .glass-card {

                        <div class="bg-gradient-to-r from-white to-gray-300 w-12 h-12 rounded-full flex items-center justify-center mr-3">

                            <span class="text-black font-bold text-lg">{{ substr(Auth::guard('admin')->user()->nome, 0, 1) }}</span>            background: rgba(255, 255, 255, 0.1);            background: rgba(255, 255, 255, 0.1);

                        </div>

                        <div class="flex-1">            backdrop-filter: blur(20px);            backdrop-filter: blur(20px);

                            <p class="font-semibold text-white">{{ Auth::guard('admin')->user()->nome }}</p>

                            <div class="flex items-center mt-1">            border: 1px solid rgba(255, 255, 255, 0.2);            border: 1px solid rgba(255, 255, 255, 0.2);

                                <span class="px-2 py-1 text-xs rounded-full bg-white text-black font-medium">

                                    Master            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);

                                </span>

                            </div>        }        }

                        </div>

                    </div>                

                </div>

            </div>        .admin-header {        .admin-header {



            <!-- Navigation -->            background: rgba(0, 0, 0, 0.8);            background: rgba(0, 0, 0, 0.8);

            <nav class="p-4 space-y-3">

                <a href="{{ route('admin.dashboard') }}"             backdrop-filter: blur(20px);            backdrop-filter: blur(20px);

                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.dashboard') ? 'active' : 'text-gray-300 hover:text-white' }}">

                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">            border-bottom: 1px solid rgba(255, 255, 255, 0.1);            border-bottom: 1px solid rgba(255, 255, 255, 0.1);

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2H3z"></path>

                    </svg>        }        }

                    <span class="font-medium">Dashboard</span>

                </a>                



                <a href="{{ route('admin.pedidos') }}"         .glow-effect {        .glow-effect {

                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.pedidos*') ? 'active' : 'text-gray-300 hover:text-white' }}">

                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">            position: relative;            position: relative;

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 14H6L5 9z"></path>

                    </svg>        }        }

                    <span class="font-medium">Pedidos</span>

                    <span class="ml-auto bg-white text-black text-xs px-2 py-1 rounded-full font-semibold">3</span>                

                </a>

        .glow-effect::after {        .glow-effect::after {

                <a href="{{ route('admin.usuarios') }}" 

                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.usuarios*') ? 'active' : 'text-gray-300 hover:text-white' }}">            content: '';            content: '';

                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>            position: absolute;            position: absolute;

                    </svg>

                    <span class="font-medium">Usuários</span>            top: -2px;            top: -2px;

                </a>

            left: -2px;            left: -2px;

                <a href="{{ route('admin.produtos') }}" 

                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.produtos*') ? 'active' : 'text-gray-300 hover:text-white' }}">            right: -2px;            right: -2px;

                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>            bottom: -2px;            bottom: -2px;

                    </svg>

                    <span class="font-medium">Produtos</span>            background: linear-gradient(45deg, #ffffff, #f3f4f6);            background: linear-gradient(45deg, #ffffff, #f3f4f6);

                </a>

            border-radius: inherit;            border-radius: inherit;

                <a href="{{ route('admin.logs') }}" 

                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.logs*') ? 'active' : 'text-gray-300 hover:text-white' }}">            z-index: -1;            z-index: -1;

                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>            filter: blur(4px);            filter: blur(4px);

                    </svg>

                    <span class="font-medium">Logs do Sistema</span>            opacity: 0;            opacity: 0;

                </a>

            </nav>            transition: opacity 0.3s ease;            transition: opacity 0.3s ease;



            <!-- Bottom Section -->        }        }

            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-800">

                <form method="POST" action="{{ route('admin.logout') }}">                

                    @csrf

                    <button type="submit" class="nav-link w-full flex items-center px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-red-900/20">        .glow-effect:hover::after {        .glow-effect:hover::after {

                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>            opacity: 0.3;            opacity: 0.3;

                        </svg>

                        <span class="font-medium">Sair</span>        }        }

                    </button>

                </form>    </style>    </style>

            </div>

        </div></head></head>



        <!-- Main Content --><body class="bg-black text-white font-sans"><body class="bg-black text-white font-sans">

        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Header -->    <div class="flex h-screen">    <div class="flex h-screen">

            <header class="admin-header px-6 py-4">

                <div class="flex items-center justify-between">        <!-- Sidebar -->        <!-- Sidebar -->

                    <div class="flex items-center">

                        <button id="sidebarToggle" class="lg:hidden mr-4 p-2 rounded-lg hover:bg-gray-800 transition-colors">        <div id="sidebar" class="bg-gradient-to-b from-black via-gray-900 to-black w-64 sidebar-transition border-r border-gray-800">        <div id="sidebar" class="bg-gradient-to-b from-black via-gray-900 to-black w-64 sidebar-transition border-r border-gray-800">

                            <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>            <!-- Logo Section -->            <!-- Logo Section -->

                            </svg>

                        </button>            <div class="p-6 border-b border-gray-800">            <div class="p-6 border-b border-gray-800">

                        <div>

                            <h2 class="text-2xl font-bold text-white">@yield('title', 'Dashboard')</h2>                <div class="flex items-center">                <div class="flex items-center">

                            <p class="text-gray-400 text-sm">@yield('subtitle', 'Painel de controle administrativo')</p>

                        </div>                    <div class="glass-card w-12 h-12 rounded-xl flex items-center justify-center mr-4 glow-effect">                    <div class="glass-card w-12 h-12 rounded-xl flex items-center justify-center mr-4 glow-effect">

                    </div>

                                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <div class="flex items-center space-x-4">

                        <!-- Notifications -->                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>

                        <div class="relative">

                            <button class="glass-card p-3 rounded-xl hover:bg-white/10 transition-colors relative">                        </svg>                        </svg>

                                <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>                    </div>                    </div>

                                </svg>

                                <span class="absolute -top-1 -right-1 bg-white text-black text-xs rounded-full w-5 h-5 flex items-center justify-center font-semibold">3</span>                    <div>                    <div>

                            </button>

                        </div>                        <h1 class="text-xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">Index Admin</h1>                        <h1 class="text-xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">Index Admin</h1>

                        

                        <!-- User Menu -->                        <p class="text-xs text-gray-400 font-medium">Sistema de Gestão</p>                        <p class="text-xs text-gray-400 font-medium">Sistema de Gestão</p>

                        <div class="flex items-center space-x-3">

                            <div class="text-right">                    </div>                    </div>

                                <p class="text-white font-medium">{{ Auth::guard('admin')->user()->nome }}</p>

                                <p class="text-gray-400 text-xs">Logado como: <span class="text-white font-medium">Administrador Master</span></p>                </div>                </div>

                            </div>

                            <div class="bg-gradient-to-r from-white to-gray-300 w-10 h-10 rounded-full flex items-center justify-center">            </div>            </div>

                                <span class="text-black font-bold">{{ substr(Auth::guard('admin')->user()->nome, 0, 1) }}</span>

                            </div>

                        </div>

                    </div>            <!-- User Info -->            <!-- User Info -->

                </div>

            </header>            <div class="p-4 border-b border-gray-800">            <div class="p-4 border-b border-gray-800">



            <!-- Content Area -->                <div class="glass-card rounded-xl p-4">                <div class="glass-card rounded-xl p-4">

            <main class="flex-1 overflow-y-auto p-6">

                <div class="max-w-7xl mx-auto">                    <div class="flex items-center">                    <div class="flex items-center">

                    @yield('content')

                </div>                        <div class="bg-gradient-to-r from-white to-gray-300 w-12 h-12 rounded-full flex items-center justify-center mr-3">                        <div class="bg-gradient-to-r from-white to-gray-300 w-12 h-12 rounded-full flex items-center justify-center mr-3">

            </main>

        </div>                            <span class="text-black font-bold text-lg">{{ substr(Auth::guard('admin')->user()->nome, 0, 1) }}</span>                            <span class="text-black font-bold text-lg">{{ substr(Auth::guard('admin')->user()->nome, 0, 1) }}</span>

    </div>

                        </div>                        </div>

    <!-- Scripts -->

    <script>                        <div class="flex-1">                        <div class="flex-1">

        // Sidebar toggle for mobile

        document.getElementById('sidebarToggle')?.addEventListener('click', function() {                            <p class="font-semibold text-white">{{ Auth::guard('admin')->user()->nome }}</p>                            <p class="font-semibold text-white">{{ Auth::guard('admin')->user()->nome }}</p>

            const sidebar = document.getElementById('sidebar');

            sidebar.classList.toggle('-translate-x-full');                            <div class="flex items-center mt-1">                            <div class="flex items-center mt-1">

        });

                                <span class="px-2 py-1 text-xs rounded-full bg-white text-black font-medium">                                <span class="px-2 py-1 text-xs rounded-full bg-white text-black font-medium">

        // CSRF token setup for AJAX requests

        window.Laravel = {                                    Master                                    Master

            csrfToken: document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')

        };                                </span>                                </span>

        

        // Auto-hide alerts after 5 seconds                            </div>                            </div>

        setTimeout(() => {

            const alerts = document.querySelectorAll('.alert-auto-hide');                        </div>                        </div>

            alerts.forEach(alert => {

                alert.style.opacity = '0';                    </div>                    </div>

                setTimeout(() => alert.remove(), 300);

            });                </div>                </div>

        }, 5000);

    </script>            </div>            </div>

    

    @stack('scripts')

</body>

</html>            <!-- Navigation -->            <!-- Navigation -->

            <nav class="p-4 space-y-3">            <nav class="p-4 space-y-3">

                <a href="{{ route('admin.dashboard') }}"                 <a href="{{ route('admin.dashboard') }}" 

                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.dashboard') ? 'active' : 'text-gray-300 hover:text-white' }}">                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.dashboard') ? 'active' : 'text-gray-300 hover:text-white' }}">

                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2H3z"></path>                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2H3z"></path>

                    </svg>                    </svg>

                    <span class="font-medium">Dashboard</span>                    <span class="font-medium">Dashboard</span>

                </a>                </a>



                <a href="{{ route('admin.pedidos') }}"                 <a href="{{ route('admin.pedidos') }}" 

                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.pedidos*') ? 'active' : 'text-gray-300 hover:text-white' }}">                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.pedidos*') ? 'active' : 'text-gray-300 hover:text-white' }}">

                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 14H6L5 9z"></path>                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 14H6L5 9z"></path>

                    </svg>                    </svg>

                    <span class="font-medium">Pedidos</span>                    <span class="font-medium">Pedidos</span>

                    <span class="ml-auto bg-white text-black text-xs px-2 py-1 rounded-full font-semibold">3</span>                    <span class="ml-auto bg-white text-black text-xs px-2 py-1 rounded-full font-semibold">3</span>

                </a>                </a>



                <a href="{{ route('admin.usuarios') }}"                 <a href="{{ route('admin.usuarios') }}" 

                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.usuarios*') ? 'active' : 'text-gray-300 hover:text-white' }}">                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.usuarios*') ? 'active' : 'text-gray-300 hover:text-white' }}">

                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>

                    </svg>                    </svg>

                    <span class="font-medium">Usuários</span>                    <span class="font-medium">Usuários</span>

                </a>                </a>



                <a href="{{ route('admin.produtos') }}"                 <a href="{{ route('admin.produtos') }}" 

                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.produtos*') ? 'active' : 'text-gray-300 hover:text-white' }}">                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.produtos*') ? 'active' : 'text-gray-300 hover:text-white' }}">

                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>

                    </svg>                    </svg>

                    <span class="font-medium">Produtos</span>                    <span class="font-medium">Produtos</span>

                </a>                </a>



                <a href="{{ route('admin.logs') }}"                 <a href="{{ route('admin.logs') }}" 

                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.logs*') ? 'active' : 'text-gray-300 hover:text-white' }}">                   class="nav-link flex items-center px-4 py-4 rounded-xl {{ Request::routeIs('admin.logs*') ? 'active' : 'text-gray-300 hover:text-white' }}">

                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>

                    </svg>                    </svg>

                    <span class="font-medium">Logs do Sistema</span>                    <span class="font-medium">Logs do Sistema</span>

                </a>                </a>

            </nav>            </nav>



            <!-- Bottom Section -->            <!-- Bottom Section -->

            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-800">            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-800">

                <form method="POST" action="{{ route('admin.logout') }}">                <form method="POST" action="{{ route('admin.logout') }}">

                    @csrf                    @csrf

                    <button type="submit" class="nav-link w-full flex items-center px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-red-900/20">                    <button type="submit" class="nav-link w-full flex items-center px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-red-900/20">

                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>

                        </svg>                        </svg>

                        <span class="font-medium">Sair</span>                        <span class="font-medium">Sair</span>

                    </button>                    </button>

                </form>                </form>

            </div>            </div>

        </div>        </div>

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>

        <!-- Main Content -->                    </svg>

        <div class="flex-1 flex flex-col overflow-hidden">                    Logs do Sistema

            <!-- Header -->                </a>

            <header class="admin-header px-6 py-4">            </nav>

                <div class="flex items-center justify-between">

                    <div class="flex items-center">            <!-- Logout -->

                        <button id="sidebarToggle" class="lg:hidden mr-4 p-2 rounded-lg hover:bg-gray-800 transition-colors">            <div class="absolute bottom-4 left-4 right-4">

                            <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">                <form method="POST" action="{{ route('admin.logout') }}">

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>                    @csrf

                            </svg>                    <button type="submit" 

                        </button>                            class="w-full flex items-center px-4 py-3 text-red-300 hover:text-red-100 hover:bg-red-900/20 rounded-lg transition-colors">

                        <div>                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <h2 class="text-2xl font-bold text-white">@yield('title', 'Dashboard')</h2>                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>

                            <p class="text-gray-400 text-sm">@yield('subtitle', 'Painel de controle administrativo')</p>                        </svg>

                        </div>                        Sair

                    </div>                    </button>

                                    </form>

                    <div class="flex items-center space-x-4">            </div>

                        <!-- Notifications -->        </div>

                        <div class="relative">

                            <button class="glass-card p-3 rounded-xl hover:bg-white/10 transition-colors relative">        <!-- Main Content -->

                                <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">        <div class="flex-1 flex flex-col overflow-hidden">

                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>            <!-- Top Bar -->

                                </svg>            <header class="bg-white border-b border-gray-200 px-6 py-4">

                                <span class="absolute -top-1 -right-1 bg-white text-black text-xs rounded-full w-5 h-5 flex items-center justify-center font-semibold">3</span>                <div class="flex items-center justify-between">

                            </button>                    <div class="flex items-center">

                        </div>                        <button id="sidebarToggle" class="text-gray-500 hover:text-gray-700 mr-4 lg:hidden">

                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                        <!-- User Menu -->                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>

                        <div class="flex items-center space-x-3">                            </svg>

                            <div class="text-right">                        </button>

                                <p class="text-white font-medium">{{ Auth::guard('admin')->user()->nome }}</p>                        <h2 class="text-2xl font-bold text-gray-800">@yield('title', 'Dashboard')</h2>

                                <p class="text-gray-400 text-xs">Logado como: <span class="text-white font-medium">Administrador Master</span></p>                    </div>

                            </div>                    

                            <div class="bg-gradient-to-r from-white to-gray-300 w-10 h-10 rounded-full flex items-center justify-center">                    <div class="flex items-center space-x-4">

                                <span class="text-black font-bold">{{ substr(Auth::guard('admin')->user()->nome, 0, 1) }}</span>                        <!-- Notifications -->

                            </div>                        <div class="relative">

                        </div>                            <button class="text-gray-500 hover:text-gray-700 p-2 rounded-full hover:bg-gray-100">

                    </div>                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                </div>                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-3 3-3-3h1m-6-11a6 6 0 11-12 0 6 6 0 0112 0zm-6 0v6"></path>

            </header>                                </svg>

                                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>

            <!-- Content Area -->                            </button>

            <main class="flex-1 overflow-y-auto p-6">                        </div>

                <div class="max-w-7xl mx-auto">                        

                    @yield('content')                        <!-- User Menu -->

                </div>                        <div class="flex items-center text-sm">

            </main>                            <span class="text-gray-600 mr-2">Logado como:</span>

        </div>                            <span class="text-gray-800 font-medium">

    </div>                                {{ Auth::guard('admin')->user()->nome }}

                            </span>

    <!-- Scripts -->                        </div>

    <script>                    </div>

        // Sidebar toggle for mobile                </div>

        document.getElementById('sidebarToggle')?.addEventListener('click', function() {            </header>

            const sidebar = document.getElementById('sidebar');

            sidebar.classList.toggle('-translate-x-full');            <!-- Page Content -->

        });            <main class="flex-1 overflow-y-auto bg-gray-50 p-6">

                @yield('content')

        // CSRF token setup for AJAX requests            </main>

        window.Laravel = {        </div>

            csrfToken: document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')    </div>

        };

            <script>

        // Auto-hide alerts after 5 seconds        // Toggle sidebar for mobile

        setTimeout(() => {        document.getElementById('sidebarToggle').addEventListener('click', function() {

            const alerts = document.querySelectorAll('.alert-auto-hide');            const sidebar = document.getElementById('sidebar');

            alerts.forEach(alert => {            sidebar.classList.toggle('-translate-x-full');

                alert.style.opacity = '0';        });

                setTimeout(() => alert.remove(), 300);

            });        // Auto-refresh notifications every 30 seconds

        }, 5000);        setInterval(() => {

    </script>            // Implementar refresh de notificações

            }, 30000);

    @stack('scripts')

</body>        // CSRF token for AJAX requests

</html>        window.Laravel = {
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        };
    </script>
</body>
</html>