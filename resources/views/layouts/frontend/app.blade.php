<!DOCTYPE html>
<html lang="en">
  <head>
   @include('frontend.includes.head')
  </head>

  <body>
    <!-- Top Bar Start -->
   @include('frontend.includes.topbar')
    <!-- Top Bar Start -->

    <!-- Brand Start -->
    @include('frontend.includes.brand')
    <!-- Brand End -->

    <!-- Nav Bar Start -->
    @include('frontend.includes.navbar')
    <!-- Nav Bar End -->

    @yield('content')

    <!-- Footer Start -->
    
  @include('frontend.includes.footer')
   

    <!-- JavaScript Libraries -->
    @include('frontend.includes.footerjs')
  </body>
</html>
