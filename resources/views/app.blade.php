<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/select2.min.css') }}" />

</head>
<body>

    <div class="container-fluid">

        @include('partials.nav')

        @include('flash::message')

        @yield('content')

    </div>

    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/select2.min.js') }}"></script>

    <script>
        $('#flash-overlay-modal').modal();
    </script>

    @yield('footer')

</body>
</html>