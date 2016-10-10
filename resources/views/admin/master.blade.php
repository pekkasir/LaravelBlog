<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Area</title>
    <script src="{{ URL::to('js/jquery.js') }}"></script>
    <script src="{{ URL::to('js/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
</head>
<body>   
    <div clasS="container">
        @include('admin.header')
        @yield('content')
    </div>
</body>
</html>