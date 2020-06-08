<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ URL::asset('error/css/style.css') }}">
</head>

<body>
  
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">

      @yield('content')

    </div>
  </div>

</body>
</html>
