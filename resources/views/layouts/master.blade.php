<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.header_css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

    @include('layouts.header')

    @include('layouts.sidebar')

    @yield('content');

    @include('layouts.footer')

    @include('layouts.footer_script')
</body>
</html>
