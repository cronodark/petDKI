<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="h-screen">
    <div class="flex justify-between items-center h-16 border px-4">
        <div class="">
            <span class="primary-text text-3xl font-bold">Pet DKI</span>
        </div>
        <div>
            search
        </div>
        <div>
            profil
        </div>
    </div>
    <div class="flex flex-row h-full">
        <div class="w-1/6 primary-background text-center text-white">
            sidebar
        </div>
        <div class="w-5/6 border p-2">
            @yield('content')
            konten
        </div>
    </div>
</body>
</html>
