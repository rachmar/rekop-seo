<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="description" content="Responsive Laravel Admin Dashboard Template based on Bootstrap 5">
      <meta name="author" content="NobleUI">
      <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, laravel, theme, front-end, ui kit, web">
      <title>NobleUI - Laravel Admin Dashboard Template</title>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
      <meta name="_token" content="{{ csrf_token() }}">
      <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
      <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
      <link href="{{ asset('assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
      <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
      @stack('plugin-styles')
      <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
      @stack('styles')
   </head>
   <body data-base-url="{{url('/')}}">
      <script src="{{ asset('assets/js/spinner.js') }}"></script>
      <div class="main-wrapper" id="app">
         @include('components.sidebar')
         <div class="page-wrapper">
            @include('components.header')
            <div class="page-content">
               @yield('content')
            </div>
            @include('components.footer')
         </div>
      </div>
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
      <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
      @stack('plugin-scripts')
      <script src="{{ asset('assets/js/template.js') }}"></script>
      @stack('scripts')
   </body>
</html>
