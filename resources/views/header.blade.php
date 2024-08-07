<header>
    <!-- <li> <i class="fa fa-search"></i> </li> -->
    @if(session()->has('access_token'))
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="content flex_space">
            <div class="logo">
                <img src="{{ asset('assets_reservasi/hotel/Images/logodiklat2.jpg')}}" alt="">
            </div>
            <div class="navlinks">
                <ul id="menulist">
                    <li><a href="#home">home</a> </li>
                    <li><a href="#about">about</a> </li>
                    <li><a href="#rooms">Rooms</a> </li>
                    <li><a href="#hall">Meeting Rooms</a> </li>
                    <li><a href="#service">service</a> </li>
                    <li><a href="#contact">contact</a> </li>
                    <a>
                        <button type="submit" class="primary-btn">LOGOUT</button>
                    </a>
                </ul>
            </div>
        </div>
    </form>
    @else
    <div class="content flex_space">
        <div class="logo">
            <img src="{{ asset('assets_reservasi/hotel/Images/logodiklat2.jpg')}}" alt="">
        </div>
        <div class="navlinks">
            <ul id="menulist">
                <li><a href="#home">home</a> </li>
                <li><a href="#about">about</a> </li>
                <li><a href="#rooms">Rooms</a> </li>
                <li><a href="#hall">Meeting Rooms</a> </li>
                <li><a href="#service">service</a> </li>
                <li><a href="#contact">contact</a> </li>
                <a href="{{ route('login') }}">
                    <button class="primary-btn">LOGIN</button>
                </a>
            </ul>
        </div>
    </div>
    @endif
</header>