<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja Network</title>

    @vite('resources/css/app.css')
</head>

<body>
    <x-flash-message />
    <x-navbar />
    <main class="container">
        {{ $slot }}
    </main>
    <x-confirm-delete />
</body>

</html>
