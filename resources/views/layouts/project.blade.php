<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" value="{{ $entity->description }}">

    <title>{{ $entity->title . ' | ' . config('app.name', 'Laravel') }}</title>

    @stack('styles')
</head>
<body>
    @yield('content')

    <script src="/js/p5.min.js"></script>
    @stack('scripts')
</body>
</html>
