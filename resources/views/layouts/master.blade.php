<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <title>Employee</title>
  </head>
  <body>
  <div id="app">
  <section class="section">
    <div class="container">
      <h1 class="title">
        Employee
      </h1>
      <p class="subtitle">
        Business Management System
      </p>
    </div>
  </section>
  



    <main role="main" class="container" id="app">

      <div class="row">
        @include('layouts.header')

        <br />

        @yield('content')
        

      </div><!-- /.row -->

      <br />

      @include('layouts.footer')
      @yield('footer')

      

    </main><!-- /.container -->

    
    </div>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
  </body>
</html>