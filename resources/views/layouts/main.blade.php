<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset("/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
     <!-- Select2 Plugin -->
    <link rel="stylesheet" href="{{ asset("/js/select2/select2.min.css")}}">
</head>

<body>
    <div class="container-fluid">
        <!-- Content here -->
        @yield('content')
    </div>

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset("/js/jQuery/jquery-2.2.3.min.js") }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset("/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("/js/select2/select2.min.js") }}"></script>
    <script src="{{ asset("/js/chartjs/chart.js") }}"></script>

    @stack('scripts')
</body>
</html>
