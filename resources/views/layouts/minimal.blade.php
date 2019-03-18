<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <title>Employee Management System</title>
</head>
<body>
<section class="section">
    <div class="container">
        <h1 class="title">
            Employee Managements System
        </h1>
    </div>
</section>




<main role="main" class="container" id="app">

    <div class="row">
        @include('layouts.minimalheader')

        <br />

        @yield('content')


    </div><!-- /.row -->

    @include('layouts.footer')
    @yield('footer')

</main><!-- /.container -->


</body>
</html>