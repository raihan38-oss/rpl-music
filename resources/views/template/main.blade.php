<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>RPL-MUSIC</title>
</head>
<body>
    <div class="dashboard-container" id="dashboardContainer">
        <aside class="sidebar">
            <div class="sidebar-logo">
                <div class="logo-icon"></div>
                <span class="logo-text">RPL-MUSIC</span>
            </div>

            <ul class="nav-menu">
                @if(auth()->user()->role === 'admin')
                <li class="nav-item"><a href="{{ route('admin') }}" class="nav-link {{ request()->routeIs('admin') ? 'active' : ''}}">🏚️Home</a></li>
                <li class="nav-item"><a href="{{ route('genres.index') }}" class="nav-link {{ request()->routeIs('genre.*') ? 'active' : ''}}">🎼Genre</a></li>
                <li class="nav-item"><a href="{{ route('content.index') }}" class="nav-link {{ request()->routeIs('content.*') ? 'active' : ''}}">🎵Content</a></li>
                <li class="nav-item"><a href="#" class="nav-link">👤User</a></li>

                @endif

                @if(auth()->user()->role === 'artist')
                <li class="nav-item"><a href="{{ route('artist') }}" class="nav-link {{ request()->routeIs('admin') ? 'active' : ''}}">🏚️Home</a></li>
                <li class="nav-item"><a href="{{ route('content.index') }}" class="nav-link {{ request()->routeIs('content.*') ? 'active' : ''}}">🎵Content</a></li>

                @endif

                @if(auth()->user()->role === 'user')
                <li class="nav-item"><a href="{{ route('user_dashboard') }}" class="nav-link {{ request()->routeIs('admin') ? 'active' : ''}}">🏚️Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link">⏯️Playlist</a></li>
                <li class="nav-item"><a href="#" class="nav-link">👀Terbaru</a></li>
                <li class="nav-item"><a href="#" class="nav-link">👤User</a></li>

                @endif
            </ul>
            
        </aside>
        <main class="main-content">
            @yield('content')
        </main>
    </div>
</body>
</html>