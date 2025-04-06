<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<header class="container">
    <nav>
        <a class="red" href="{{ route("main.index") }}">Main</a>
        <a href="{{ route("about.index") }}">About</a>
        <a href="{{ route("contact.index") }}">Contact</a>
        <a href="{{ route("posts.index") }}">Posts</a>
    </nav>
</header>
<main class="container">
    @yield("content")
</main>
</body>
</html>
