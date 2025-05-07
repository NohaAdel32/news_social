<div class="brand">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-3 col-md-4">
          <div class="b-logo">
            <a href="index.html">
              <img src="{{asset('assets/frontend/img/logo.png')}}" alt="Logo" />
            </a>
          </div>
        </div>
        <div class="col-lg-6 col-md-4">
          <div class="b-ads">
            <a href="https://htmlcodex.com">
              <img src="{{asset('assets/frontend/img/ads-1.jpg')}}" alt="Ads" />
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-md-4">
        <form action="{{ route('frontend.search') }}" method="post">
        @csrf
          <div class="b-search">
            <input type="text" placeholder="Search" />
            <button type="submit"><i class="fa fa-search"></i></button>
          </div>
        
        </form>
      </div>
      </div>
    </div>
  </div>