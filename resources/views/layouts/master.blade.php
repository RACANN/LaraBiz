<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <title>Mercury</title>
    </script>
  </head>
  <body>
  <section class="section">
    <div class="container">
      <h1 class="title">
        Mercury
      </h1>
      <p class="subtitle">
        Business Management System
      </p>
    </div>
  </section>
  



    <main role="main" class="container">

      <div class="row">
        @include('layouts.header')

        @yield('content')
        

      </div><!-- /.row -->

      @include('layouts.footer')
      @yield('footer')

    </main><!-- /.container -->


  </body>
</html>