<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'MyApp' }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chirps.css') }}">

</head>
<body>
    <nav>
        <a href="/">Home</a> |
        <a href="/about">About</a> |
        <a href="/products">Products</a> |
        <a href="/products/create">Create Product</a> |

        @auth
            <span>Welcome, {{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a> |
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer>
        <p>© {{ date('Y') }} MyApp</p>
    </footer>
</body>
</html>
