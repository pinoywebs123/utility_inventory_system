<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{URL::to('css/bootstrap.min.css')}}">
        <title>Laravel</title>
        @yield('styles')
    </head>
    <body>
        @yield('contents')
    </body>
        <script src="{{URL::to('js/jquery.js')}}"></script>
        <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
   	 	@yield('scripts')
</html>
