<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Etalase Produk</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="flex flex-col min-h-screen">
    <div class="flex-grow">
        @livewire('catalog')
    </div>

    @include('partials.comfooter')

    @livewireScripts
</body>

</html>
