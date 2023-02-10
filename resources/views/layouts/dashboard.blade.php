<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="{{ asset('/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/main.css') }}" rel="stylesheet">
    @yield('css')
  </head>
  <body>
    <div class="app">
        @include('partials.navbar')
        @include('partials.sidebar')
        <main id="main" class="main">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('/assets/vendor/jQuery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('/assets/js/main.js') }}"></script>
    @yield('script')
    @if (session('message'))
      <script type="text/javascript">
          toastr.options = {
              "positionClass": "toast-top-right",
          };
          toastr.success('{{ session("message") }}');
      </script>
    @endif
  </body>
</html>