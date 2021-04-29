<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Pasar Mobil</title>

        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        @include('dashboard.shared.css')
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> --}}
        
        @include('dashboard.header')

        @include('dashboard.sidebar')

            @yield('content') 
    
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="instagram.com/adonmuhammaddd">Adon Muhammad</a>.</strong>
            All rights reserved.
          </footer>

        @yield('javascript')

    </body>
</html>
