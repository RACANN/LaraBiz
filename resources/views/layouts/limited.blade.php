<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://fonts.googleapis.com/css?family=Kelly+Slab&display=swap" rel="stylesheet">
    @yield('custom-css')
    <title>@yield('title')</title>
</head>
<body>
<div id="app">
    <section class="hero is-info">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    LaraBiz
                </h1>
                <h2 class="subtitle">
                    Business Management System
                </h2>
            </div>
        </div>
    </section>
    <main role="main" class="container" id="app">

        <div class="row">

            <nav class="navbar" role="navigation" aria-label="main navigation">
                @if (Route::has('login'))
                    @auth
                        <div class="navbar-end">
                            <div class="navbar-item">
                                <div class="buttons">
                                    <a class="button is-info" href="{{ url('/home') }}">Home</a>
                                    <a class="button is-light" href="{{ url('/logout') }}">Logout</a>
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="navbar-end">
                                <div class="navbar-item">
                                    <div class="buttons">
                                        <a class="button is-info" href="{{ route('login') }}">Login</a>
                                        <a  class="button is-light" href="{{ route('register') }}">Register</a>
                                    </div>
                                </div>
                            </div>
                            @endauth
                        @endif
            </nav>
            <br />
            @yield('content')
        </div><!-- /.row -->

        <br />

        @include('layouts.footer')
        @yield('footer')


    </main><!-- /.container -->


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vuetify/1.5.6/vuetify.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
@yield('custom-js')
</body>
</html>