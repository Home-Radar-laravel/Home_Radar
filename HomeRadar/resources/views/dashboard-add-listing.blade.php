@extends('layouts.main-two')

@section('title', 'dashboard-add-listing')

@section('content')

<style>
    .input-container {
        display: flex;
        align-items: center; /* Align items vertically */
        margin-bottom: 10px; /* Add some space between each input field */
    }

    .input-container label {
        flex: 0 0 150px; /* Fixed width for labels */
        margin-right: 10px; /* Space between label and input */
    }

    .input-container input {
        flex: 1; /* Make input take the remaining space */
    }

</style>

<!-- content -->
<div class="dashboard-content">
    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
    <div class="container dasboard-container">
        <!-- dashboard-title -->
        <div class="dashboard-title fl-wrap">
            <div class="dashboard-title-item"><span>Add Listing</span></div>
            <div class="dashbard-menu-header">
                <div class="dashbard-menu-avatar fl-wrap">
                   
                </div>
                <a href="index.html" class="log-out-btn tolt" data-microtip-position="bottom" data-tooltip="Log Out"><i class="far fa-power-off"></i></a>
            </div>
        </div>
        <!-- dashboard-title end -->

        <!-- Add the form action and method -->
        <form action="{{ route('user_properties.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- dasboard-widget-box  end-->
            <!-- dasboard-widget-title -->
            <div class="dasboard-widget-title dwb-mar fl-wrap" id="sec2">
                <h5><i class="fas fa-street-view"></i>Location / Contacts</h5>
            </div>
            <!-- dasboard-widget-title end -->
            <!-- dasboard-widget-box  -->
            <div class="dasboard-widget-box fl-wrap">
                <div class="custom-form">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>City</label>
                            <div class="listsearch-input-item">
                                <select name="location" data-placeholder="Select City" class="chosen-select no-search-select">
                                    <option value="">Select City</option>
                                    <option value="New York">New York</option>
                                    <option value="London">London</option>
                                    <option value="Paris">Paris</option>
                                    <option value="Kiev">Kiev</option>
                                    <option value="Moscow">Moscow</option>
                                    <option value="Dubai">Dubai</option>
                                    <option value="Rome">Rome</option>
                                    <option value="Beijing">Beijing</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Property Name</label>
                            <input type="text" name="property_name" placeholder="Property Name" value=""/>
                        </div>                        
                    </div>
                </div>
            </div>
            <!-- dasboard-widget-box  end-->
            <!-- dasboard-widget-title -->
            <div class="dasboard-widget-title dwb-mar fl-wrap" id="sec3">
                <h5><i class="fas fa-image"></i>Header Media</h5>
            </div>
            <!-- dasboard-widget-title end -->
            <!-- dasboard-widget-box  -->
            <div class="dashboard-widget-box fl-wrap">
                <div class="custom-form">
                    <!-- Image upload inputs -->
                    <div class="listsearch-input-item fl-wrap input-container">
                        <label for="image1">Upload Image 1:</label>
                        <input type="file" class="upload" accept="image/*" name="image1" id="image1">
                    </div>
                    <div class="listsearch-input-item fl-wrap input-container">
                        <label for="image2">Upload Image 2:</label>
                        <input type="file" class="upload" accept="image/*" name="image2" id="image2">
                    </div>
                    <div class="listsearch-input-item fl-wrap input-container">
                        <label for="image3">Upload Image 3:</label>
                        <input type="file" class="upload" accept="image/*" name="image3" id="image3">
                    </div>
                    <div class="listsearch-input-item fl-wrap input-container">
                        <label for="image4">Upload Image 4:</label>
                        <input type="file" class="upload" accept="image/*" name="image4" id="image4">
                    </div>
                    <div class="listsearch-input-item fl-wrap input-container">
                        <label for="image5">Upload Image 5:</label>
                        <input type="file" class="upload" accept="image/*" name="image5" id="image5">
                    </div>
                    <div class="listsearch-input-item fl-wrap input-container">
                        <label for="image6">Upload Image 6:</label>
                        <input type="file" class="upload" accept="image/*" name="image6" id="image6">
                    </div>
                </div>
            </div>

            <!-- dasboard-widget-box  end-->
            <!-- dasboard-widget-title -->
            <div class="dasboard-widget-title dwb-mar fl-wrap" id="sec4">
                <h5><i class="fas fa-list"></i>Listing Details</h5>
            </div>
            <!-- dasboard-widget-title end -->
            <!-- dasboard-widget-box  -->
            <div class="dasboard-widget-box fl-wrap">
    <div class="custom-form">
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6">
                        <label>Area: <span class="dec-icon"><i class="far fa-sort-size-down-alt"></i></span></label>
                        <input type="text" name="property_size" placeholder="House Area" value=""/>
                    </div>
                    <div class="col-sm-6">
                        <label>Bedrooms: <span class="dec-icon"><i class="far fa-bed"></i></span></label>
                        <input type="text" name="rooms" placeholder="House Bedrooms" value=""/>
                    </div>
                    <div class="col-sm-6">
                        <label>Bathrooms: <span class="dec-icon"><i class="far fa-bath"></i></span></label>
                        <input type="text" name="bathrooms" placeholder="House Bathrooms" value=""/>
                    </div>
                    <div class="col-sm-6">
                        <label>Garage: <span class="dec-icon"><i class="far fa-warehouse"></i></span></label>
                        <input type="text" name="garage_size" placeholder="Number of cars" value=""/>
                    </div>
                    <div class="col-sm-6">
                        <label>Price: <span class="dec-icon"><i class="far fa-dollar-sign"></i></span></label>
                        <input type="text" name="price" placeholder="Price" value=""/>
                    </div>
                    <div class="col-sm-6">
                        <label>Availability: <span class="dec-icon"><i class="far fa-calendar-alt"></i></span></label>
                        <select name="availability">
                        <option value="available">Available</option>
                        <option value="not available">Not Available</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <label>Details Text</label>
                <div class="listsearch-input-item">
                    <textarea cols="40" rows="3" style="height: 235px" placeholder="Details" name="description" spellcheck="false"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>

                    <!-- dasboard-widget-box  end-->
                    <button type="submit" class="btn color-bg float-btn">Save Changes</button>
                    <!-- <a href="{{ route('user_properties.index') }}" class="btn color-bg float-btn">Go to Properties List</a> -->

                </div>
            </div>
        </form>

        <div class="limit-box fl-wrap"></div>
    </div>
</div>

 <!--register form -->
 <div class="main-register-wrap modal">
    <div class="reg-overlay"></div>
    <div class="main-register-holder tabs-act">
        <div class="main-register-wrapper modal_main fl-wrap">
            <div class="main-register-header color-bg">
                <div class="main-register-logo fl-wrap">
                    <img src="images/white-logo.png" alt="">
                </div>
                <div class="main-register-bg">
                    <div class="mrb_pin"></div>
                    <div class="mrb_pin mrb_pin2"></div>
                </div>
                <div class="mrb_dec"></div>
                <div class="mrb_dec mrb_dec2"></div>
            </div>
            <div class="main-register">
                <div class="close-reg"><i class="fal fa-times"></i></div>
                <ul class="tabs-menu fl-wrap no-list-style">
                    <li class="current"><a href="#tab-1"><i class="fal fa-sign-in-alt"></i> Login</a></li>
                    <li><a href="#tab-2"><i class="fal fa-user-plus"></i> Register</a></li>
                </ul>
                <!--tabs -->
                <div class="tabs-container">
                    <div class="tab">
                        <!--tab -->
                        <div id="tab-1" class="tab-content first-tab">
                            <div class="custom-form">
                                <form method="POST" action="{{ route('user.login') }}" name="loginform">
                                    @csrf
                                    <label>Username or Email Address * <span class="dec-icon"><i class="fal fa-user"></i></span></label>
                                    <input name="email" type="text" onClick="this.select()" value="">
                                    <div class="pass-input-wrap fl-wrap">
                                        <label>Password * <span class="dec-icon"><i class="fal fa-key"></i></span></label>
                                        <input name="password" type="password" autocomplete="off" onClick="this.select()" value="">
                                        <span class="eye"><i class="fal fa-eye"></i> </span>
                                    </div>
                                    <div class="lost_password">
                                        <a href="#">Lost Your Password?</a>
                                    </div>
                                    <div class="filter-tags">
                                        <input id="check-a3" type="checkbox" name="remember">
                                        <label for="check-a3">Remember me</label>
                                    </div>
                                    <div class="clearfix"></div>
                                    <button type="submit" class="log_btn color-bg"> LogIn </button>
                                </form>
                            </div>
                        </div>
                        <!--tab end -->
                        <!--tab -->
                        <div class="tab">
                            <div id="tab-2" class="tab-content">
                                <div class="custom-form">
                                    <form method="POST" action="{{ route('user.register') }}" name="registerform">
                                        @csrf
                                        <label>Full Name * <span class="dec-icon"><i class="fal fa-user"></i></span></label>
                                        <input name="name" type="text" onClick="this.select()" value="">
                                        <label>Email Address * <span class="dec-icon"><i class="fal fa-envelope"></i></span></label>
                                        <input name="email" type="text" onClick="this.select()" value="">
                                        <div class="pass-input-wrap fl-wrap">
                                            <label>Password * <span class="dec-icon"><i class="fal fa-key"></i></span></label>
                                            <input name="password" type="password" autocomplete="off" onClick="this.select()" value="">
                                            <span class="eye"><i class="fal fa-eye"></i> </span>
                                        </div>
                                        <label>Confirm Password * <span class="dec-icon"><i class="fal fa-key"></i></span></label>
                                        <input name="password_confirmation" type="password" autocomplete="off" onClick="this.select()" value="">
                                        <div class="filter-tags ft-list">
                                            <input id="check-a2" type="checkbox" name="terms">
                                            <label for="check-a2">I agree to the <a href="#">Privacy Policy</a> and <a href="#">Terms and Conditions</a></label>
                                        </div>
                                        <div class="clearfix"></div>
                                        <button type="submit" class="log_btn color-bg"> Register </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--tab end -->
                    </div>
                    <!--tabs end -->
                </div>
            </div>
        </div>
    </div>
</div>
    <!--register form end -->
@endsection
