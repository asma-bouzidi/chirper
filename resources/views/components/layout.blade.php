<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'MyApp' }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chirps.css') }}">
    <style>
        nav {
            background-color: #e6e2d3;
            padding: 15px 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        nav .nav-links {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: center;
        }

        nav .nav-links a, nav .user-info a {
            text-decoration: none;
            font-weight: bold;
            color: #2b2b2b;
            transition: color 0.2s;
        }

        nav .nav-links a:hover, nav .user-info a:hover {
            color: #556b2f;
        }

        nav .user-info {
            font-weight: normal;
            color: #2b2b2b;
        }

        nav .user-info span {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <nav>
        <div class="nav-links">
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/products">Products</a>
            <a href="/products/create">Create Product</a>
        </div>

        <div class="user-info">
            @auth
                <span>Welcome, {{ auth()->user()->name }}</span> |
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}">Login</a> |
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer>
        <p>© {{ date('Y') }} MyApp</p>
    </footer>
</body>
</html>

