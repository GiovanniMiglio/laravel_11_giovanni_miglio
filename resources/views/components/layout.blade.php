<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Anime & Manga Blog</title>
    @vite(['resources/js/app.js'])
</head>
<body>

    @include('components.navbar')

    <main class="container-fluid p-0">
        {{ $slot }}
    </main>

    @include('components.footer')

</body>
</html>