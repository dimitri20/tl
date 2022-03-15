<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('თიელი') }}</title>
    <link rel="shortcut icon" href="{{ asset('storage/globals/main-logo.png') }}" sizes="96x96" type="image/png">

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    @yield('content')


    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
