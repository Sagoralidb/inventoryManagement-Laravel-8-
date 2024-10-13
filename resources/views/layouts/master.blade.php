<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
@include('layouts.partisals._head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
@include('layouts.partisals._navbar')
  <!-- Main Sidebar Container -->
@include('layouts.partisals._sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="app">
    @include('flash::message')
    @yield('content')
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
@include('layouts.partisals._footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

@include('layouts.partisals._footer-script')
</body>
</html>
