<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name', 'Gideon-Watch')}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
     
</head>
<body>
    <div id="app">

   
    @include('inc.navbar')
    @yield('contents')
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>