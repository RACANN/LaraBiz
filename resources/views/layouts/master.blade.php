<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vuetify/1.5.6/vuetify.css"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    
    <script>
         $(document).ready( function () {
           
     
});
</script>
  </body>
</html>