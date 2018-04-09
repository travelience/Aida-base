<html lang="{{ session('lang') }}">
  <head>
    
    @include('Aida::head')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  </head>

  <body>
    
    <section>

      @include('components.navbar')

      <main class="container-fluid mt-4">
        @include('Aida::alerts')
        @yield('content')
      </main>

    </section>
    

  </body>

  <script src="{{ mix('js/app.js') }}"></script>

</html>