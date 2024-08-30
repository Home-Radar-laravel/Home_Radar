<header class="main-header">
    <div class="logo-holder"><a href="{{ url('/user_home') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a></div>
    <div class="nav-button-wrap color-bg nvminit">
        <div class="nav-button">
            <span></span><span></span><span></span>
        </div>
    </div>
    <div class="header-search-button">
        <i class="fal fa-search"></i>
        <span>Search...</span>
    </div>
    <div class="add-list_wrap">
        <a href="{{ url('dashboard-add-listing') }}" class="add-list color-bg"><i class="fal fa-plus"></i> <span>Add Listing</span></a>
    </div>
   
    <div class="show-reg-form dasbdord-submenu-open">
        @if (Auth::check())
        <span>{{ Auth::user()->name }}</span>
    @endif
        <img src="{{ asset('images/avatar/5.jpg') }}" alt="">
    </div>
      <!--  login btn -->
      <div>
        @if (Auth::check())
        <div class="show-reg-form logout-form">
            <form id="logout-form" action="{{ route('logout-user-page') }}" method="GET" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; padding: 0; ; cursor: pointer;">
                    
                    <i class="fas fa-sign-out-alt"></i><span>Logout</span>
                </button>
            </form>
        </div>
    @else
        <div class="show-reg-form modal-open">
            <i class="fas fa-user"></i><span>Sign In</span>
        </div>
    @endif
    </div>    <!--  login btn  end -->
    
    <div class="dashboard-submenu">
        <ul>
            
            <li><a href="{{ url('dashboard') }}"><i class="fal fa-chart-line"></i>Dashboard</a></li>
            <li><a href="{{ url('dashboard-add-listing') }}"> <i class="fal fa-file-plus"></i>Add Listing</a></li>
            <li><a href="{{ url('dashboard-myprofile') }}"><i class="fal fa-user-edit"></i>Settings</a></li>
        </ul>
        <a href="{{ route('logout-user-page')  }}" class="color-bg db_log-out"><i class="far fa-power-off"></i> Log Out</a>
    </div>
    <!-- navigation -->
    <div class="nav-holder main-menu">
        <nav>
            <ul class="no-list-style">
                <li>
                    <a href="{{ route('user.home') }}">Home <i class="fa fa-caret-down"></i></a>
                    <ul>
                        <li><a href="{{ url('/') }}">Parallax Image</a></li>
                        <li><a href="{{ url('/slider') }}">Slider</a></li>
                        <li><a href="{{ url('/video') }}">Video</a></li>
                        <li><a href="{{ url('/slideshow') }}">Slideshow</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Listings <i class="fa fa-caret-down"></i></a>
                    <ul>
                        <li><a href="{{ url('/listing') }}">Column map</a></li>
                        <li><a href="{{ url('/listing2') }}">Column map 2</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/agents') }}">Agents</a>
                </li>
                <li>
                    <a href="{{ url('/blog') }}">News</a>
                </li>
                <li>
                    <a href="#" class="act-link">Pages <i class="fa fa-caret-down"></i></a>
                    <ul>
                        <li><a href="{{ url('/about') }}">About</a></li>
                        <li><a href="{{ url('/contacts') }}">Contacts</a></li>
                        <li><a href="{{ url('/help') }}">Help FAQ</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <!-- navigation end -->
</header>
