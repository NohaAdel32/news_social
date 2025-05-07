<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="tb-contact">
                    <p><i class="fas fa-envelope"></i>{{ $getsetting->email }}</p>
                    <p><i class="fas fa-phone-alt"></i>+{{ $getsetting->phone }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tb-menu">
                    @guest
                        <a href="{{ route('register') }}">register</a>
                        <a href="{{ route('login') }}">login</a>
                    @endguest
                    @auth
                        <a href="javascript:void(0)"
                            onclick="if(confirm('Are you sure?')){document.getElementById('formLogout').submit()}return false">logout</a>
                    @endauth
                    <a href="{{ route('frontend.contact.index') }}">Contact</a>
                </div>
                <form id="formLogout" action ="{{ route('logout') }}" method ="post">
                    @csrf
                </form>


            </div>
        </div>
    </div>
</div>
