<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @livewireStyles
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}"></script>

</head>
<body class="flex flex-col min-h-screen">
    @include('layouts.nav')

    <livewire:home/>

    @include('layouts.footer')
    @livewireScripts
</body>
</html>
