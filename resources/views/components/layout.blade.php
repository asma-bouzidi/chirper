<!-- resources/views/components/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'MyApp' }}</title>
</head>
<body>
    <nav>
        <a href="/">Home</a> |
        <a href="/about">About</a>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer>
        <p>© {{ date('Y') }} MyApp</p>
    </footer>
</body>
</html>
