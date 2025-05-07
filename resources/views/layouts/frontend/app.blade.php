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
 <!-- Breadcrumb Start -->
 <div class="breadcrumb-wrap">
  <div class="container">
    <ul class="breadcrumb">
      @section('breadcrumb')
      <li class="breadcrumb-item"><a href= "{{ route('frontend.index') }}">Home</a></li>
      @show
    </ul>
  </div>
</div>
<!-- Breadcrumb End -->
    @yield('content')

    <!-- Footer Start -->
    
  @include('frontend.includes.footer')
   

    <!-- JavaScript Libraries -->
    @include('frontend.includes.footerjs')
  </body>
</html>
