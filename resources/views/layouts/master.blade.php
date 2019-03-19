<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    
  </body>
</html>