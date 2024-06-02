<!-- I create the layout to don't repeat the code due I will have
the same nav and the same footer just the content will change dinamically -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pokemon App</title>
    @vite(['resources/js/app.js','resources/css/app.css'])

</head>
<body>

<header class="p-5 border-b bg-white shadow">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-black">
            Pokemon App
        </h1>
    </div>

</header>

<main class="container mx-auto mt-10">
    <h2 class="font-black text-center text-3xl mb-2">
        @yield('title')
    </h2>
    @yield('content')
</main>

<footer class="text-center p-5 text-gray-500 font-bold uppercase">
    Pokemon - All right reserved {{now()->year}}
</footer>
</body>
</html>
