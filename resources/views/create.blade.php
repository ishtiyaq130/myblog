<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create blog</title>
    @livewireStyles
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}"></script>
</head>
<body>

    @include('layouts.nav')

    <livewire:create-post/>

    @include('layouts.footer')
    @livewireScripts
</body>
</html>