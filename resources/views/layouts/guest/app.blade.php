<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Kategori Berita - Binadesa</title>

  <!-- ======= Google Font =======-->
    @include('layouts.guest.googlefont')
    <!-- End Google Font-->

    <!-- ======= Styles =======-->
    @include('layouts.guest.styles')
    <!-- End Styles-->

    <!-- ======= Theme Style =======-->
    @include('layouts.guest.css')
    <!-- End Theme Style-->

    <!-- ======= Site Wrap =======-->
    <div class="site-wrap">

      <!-- ======= Header =======-->
      @include('layouts.guest.header')
      <!-- End Header-->

      <!-- Improved Navbar -->
      @include('layouts.guest.navbar')
      <!-- End Improved Navbar -->

      <!-- ======= Main =======-->
        @yield('content')
      <!-- ======= End Main =======-->


      <!-- ======= Footer =======-->
      @include('layouts.guest.footer')
      <!-- End Footer-->

    </div>

    <!-- ======= Back to Top =======-->
    @include('layouts.guest.backtotop')
    <!-- End Back to top-->

    <!-- ======= Javascripts =======-->
    @include('layouts.guest.javascripts')
   <!-- ======= End Javascripts =======-->
