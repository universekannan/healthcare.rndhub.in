<!DOCTYPE html>
<html>

<!-- meta contains meta taga, css and fontawesome icons etc -->
@include('common.meta')
<!-- ./end of meta -->

<!-- <body class=" hold-transition skin-blue sidebar-mini"> -->
<body class="hold-transition light-mode sidebar-collapse layout-fixed layout-navbar-fixed layout-footer-fixed">

<!-- wrapper -->
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{!! asset('img/health-care.png') !!}" alt="HC" height="60" width="60">
  </div>
</br>
 </br>

    <!-- header contains top navbar -->
@include('common.header')
<!-- ./end of header -->

    <!-- left sidebar -->
@include('common.sidebar')
<!-- ./end of left sidebar -->

    <!-- dynamic content -->
@yield('content')
<!-- ./end of dynamic content -->

<!-- ./right sidebar -->
    @include('common.footer')
</div>
<!-- ./wrapper -->

<!-- The actual snackbar -->

<!-- all js scripts including custom js -->
@include('common.scripts')
<!-- ./end of js scripts -->

</body>
</html>
