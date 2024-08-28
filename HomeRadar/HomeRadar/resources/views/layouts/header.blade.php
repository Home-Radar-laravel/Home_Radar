<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/dashboard-style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/color.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</head>
<body>

<header class="main-header">
    <!--  logo  -->
    <div class="logo-holder"><a href="index.html"><img src="images/logo.png" alt=""></a></div>
    <!-- logo end  -->
    <!-- nav-button-wrap--> 
    <div class="nav-button-wrap color-bg nvminit">
        <div class="nav-button">
            <span></span><span></span><span></span>
        </div>
    </div>
    <!-- nav-button-wrap end-->	
    <!-- header-search button  -->
    <div class="header-search-button">
        <i class="fal fa-search"></i>
        <span>Search...</span>
    </div>
    <!-- header-search button end  -->
    <!--  add new  btn -->
    <div class="add-list_wrap">
        <a href="dashboard-add-listing.html" class="color-bg"><i class="fal fa-plus"></i> <span>Add Listing</span></a>
    </div>
    <!--  add new  btn end -->
    <!--  header-opt_btn -->
    <div class="header-opt_btn tolt" data-microtip-position="bottom" data-tooltip="Language / Currency">
        <span><i class="fal fa-globe"></i></span>
    </div>
    <!--  header-opt_btn end -->
    <!--  cart-btn   -->
    <div class="cart-btn  tolt show-header-modal" data-microtip-position="bottom" data-tooltip="Your Wishlist / Compare">
        <i class="fal fa-bell"></i>
        <span class="cart-btn_counter color-bg">5</span>
    </div>
    <!--  cart-btn end -->
    <!--  login btn -->
    <div class="show-reg-form modal-open"><i class="fas fa-user"></i><span>Sign In</span></div>
    <!--  login btn  end -->
    <!--  navigation --> 
    <div class="main-menu">
        <nav>
            <ul class="no-list-style">
                <li>
                    <a href="index.html" class="act-link">Home</a>
                </li>
                <li><a href="contacts.html">Contacts</a></li>
                <li>
                    <a href="listing5.html">Listings </a>
                </li>
                <li><a href="about.html">About</a></li>
                <li><a href="dashboard.html">Dashboard</a></li>
                <li>
                    <a href="#">Pages <i class="fa fa-caret-down"></i></a>
                    <!--second level -->   
                    <ul>
                        

                        <li><a href="help.html">Help FAQ</a></li>
                        <li><a href="pricing.html">Pricing </a></li>
                        
                        <li><a href="blog-single.html">Blog Single</a></li>
                        <li><a href="compare.html">Compare</a></li>
                        <li><a href="coming-soon.html">Coming Soon</a></li>
                        <li><a href="404.html">404</a></li>
                    </ul>
                    <!--second level end-->                                
                </li>
            </ul>
        </nav>  
</header>
@yield('contant')
</body>
</html>