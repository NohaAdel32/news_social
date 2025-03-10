<div class="nav-bar">
    <div class="container">
      <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a href="#" class="navbar-brand">MENU</a>
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarCollapse"
        >
          <div class="navbar-nav mr-auto">
            <a href="index.html" class="nav-item nav-link active">Home</a>
            <div class="nav-item dropdown">
              <a
                href="#"
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                >categories</a
              >
           
              <div class="dropdown-menu">
                @foreach ($categories as $category)
                <a href="{{ route('frontend.category_posts',$category->slug) }}" class="dropdown-item" title="{{ $category->name }}">{{ $category->name }}</a>
                @endforeach
                
            
              </div>
            </div>
            <a href="single-page.html" class="nav-item nav-link"
              >Single Page</a
            >
            <a href="dashboard.html" class="nav-item nav-link">Dashboard</a>
            <a href="contact.html" class="nav-item nav-link">Contact Us</a>
          </div>
          <div class="social ml-auto">
            <a href="{{$getsetting->twitter}}" title="twitter"><i class="fab fa-twitter"></i></a>
            <a href="{{$getsetting->facebook}}" title="facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="{{$getsetting->twitter}}" title="twitter"><i class="fab fa-linkedin-in"></i></a>
            <a href="{{$getsetting->instagram}}" title="instagram"><i class="fab fa-instagram"></i></a>
            <a href="{{$getsetting->youtube}}" title="youtube"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
      </nav>
    </div>
  </div>