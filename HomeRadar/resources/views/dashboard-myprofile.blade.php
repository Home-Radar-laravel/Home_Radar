@extends('layouts.main-two')

@section('title', 'dashboard-myprofile ')


@section('content')

<!-- content -->
<div class="dashboard-content">
    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
    <div class="container dasboard-container">
        <!-- dashboard-title -->
        <div class="dashboard-title fl-wrap">
            <div class="dashboard-title-item"><span>Edit Profile</span></div>
            <div class="dashbard-menu-header">
                <div class="dashbard-menu-avatar fl-wrap">
                    <img src="images/avatar/5.jpg" alt="">
                    <h4>Welcome, <span>Alica Noory</span></h4>
                </div>
                <a href="index.html" class="log-out-btn   tolt" data-microtip-position="bottom"  data-tooltip="Log Out"><i class="far fa-power-off"></i></a>
            </div>
            <!--Tariff Plan menu-->
            <div class="tfp-det-container">
                <div   class="tfp-btn"><span>Your Tariff Plan : </span> <strong>Extended</strong></div>
                <div class="tfp-det">
                    <p>You Are on <a href="#">Extended</a> . Use link bellow to view details or upgrade. </p>
                    <a href="#" class="tfp-det-btn color-bg">Details</a>
                </div>
            </div>
            <!--Tariff Plan menu end-->
        </div>
        <!-- dashboard-title end -->
        <!-- dasboard-wrapper-->
        <div class="dasboard-wrapper fl-wrap no-pag">
            <div class="row">
                <div class="col-md-7">
                    <div class="dasboard-widget-title fl-wrap">
                        <h5><i class="fas fa-user-circle"></i>Change Avatar</h5>
                    </div>
                    <div class="dasboard-widget-box nopad-dash-widget-box fl-wrap">
                        <div class="edit-profile-photo">
                            <img src="images/avatar/5.jpg" class="respimg" alt="">
                            <div class="change-photo-btn">
                                <div class="photoUpload">
                                    <span>  Upload New Photo</span>
                                    <input type="file" class="upload">
                                </div>
                            </div>
                        </div>
                        <div class="bg-wrap bg-parallax-wrap-gradien">
                            <div class="bg"  data-bg="images/bg/3.jpg"></div>
                        </div>
                        <div class="change-photo-btn cpb-2  ">
                            <div class="photoUpload color-bg">
                                <span> <i class="far fa-camera"></i> Change Cover </span>
                                <input type="file" class="upload">
                            </div>
                        </div>
                    </div>
                    <div class="dasboard-widget-title fl-wrap">
                        <h5><i class="fas fa-key"></i>Personal Info</h5>
                    </div>
                    <div class="dasboard-widget-box fl-wrap">
                        <div class="custom-form">
                            <label>First Name <span class="dec-icon"><i class="far fa-user"></i></span></label>
                            <input type="text" placeholder="Alica" value=""/>
                            <label>Second Name <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                            <input type="text" placeholder="Noory" value=""/>
                            <label>Email Address <span class="dec-icon"><i class="far fa-envelope"></i></span></label>
                            <input type="text" placeholder="AlicaNoory@domain.com" value=""/>
                            <label>Phone<span class="dec-icon"><i class="far fa-phone"></i> </span></label>
                            <input type="text" placeholder="+7(123)987654" value=""/>
                            <label>Adress <span class="dec-icon"><i class="fas fa-map-marker"></i> </span></label>
                            <input type="text" placeholder="USA 27TH Brooklyn NY" value=""/>
                            <label>Website <span class="dec-icon"><i class="far fa-globe"></i> </span></label>
                            <input type="text" placeholder="themeforest.net" value=""/>
                            <label>Agensy<span class="dec-icon"><i class="far fa-home-lg-alt"></i> </span></label>
                            <input type="text" placeholder="Mavers RealEstate Agency" value=""/>
                            <label>Notes </label>
                            <textarea cols="40" rows="3" placeholder="About Me" style="margin-bottom:20px;"></textarea>
                            <button class="btn    color-bg  float-btn">Save Changes</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="dasboard-widget-title dbt-mm fl-wrap">
                        <h5><i class="fas fa-key"></i>Change Password</h5>
                    </div>
                    <div class="dasboard-widget-box fl-wrap">
                        <div class="custom-form">
                            <div class="pass-input-wrap fl-wrap">
                                <label>Current Password<span class="dec-icon"><i class="far fa-lock-open-alt"></i></span></label>
                                <input type="password" class="pass-input" placeholder="" value=""/>
                                <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                            </div>
                            <div class="pass-input-wrap fl-wrap">
                                <label>New Password<span class="dec-icon"><i class="far fa-lock-alt"></i></span></label>
                                <input type="password" class="pass-input" placeholder="" value=""/>
                                <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                            </div>
                            <div class="pass-input-wrap fl-wrap">
                                <label>Confirm New Password<span class="dec-icon"><i class="far fa-shield-check"></i> </span></label>
                                <input type="password" class="pass-input" placeholder="" value=""/>
                                <span class="eye"><i class="far fa-eye" aria-hidden="true"></i> </span>
                            </div>
                            <button class="btn    color-bg  float-btn">Save Changes</button>
                        </div>
                    </div>
                    <div class="dasboard-widget-title fl-wrap" style="margin-top: 30px;">
                        <h5><i class="fas fa-share-alt"></i>Your Socials</h5>
                    </div>
                    <div class="dasboard-widget-box fl-wrap">
                        <div class="custom-form">
                            <label>Facebook  <span class="dec-icon"><i class="fab fa-facebook"></i></span></label>
                            <input type="text" placeholder="https://www.facebook.com/" value=""/>
                            <label>Twitter <span class="dec-icon"><i class="fab fa-twitter"></i></span></label>
                            <input type="text" placeholder="https://twitter.com/" value=""/>
                            <label>Instagram<span class="dec-icon"><i class="fab fa-instagram"></i>  </span></label>
                            <input type="text" placeholder="https://www.instagram.com/" value=""/>
                            <label>Vkontakte<span class="dec-icon"><i class="fab fa-vk"></i>  </span></label>
                            <input type="text" placeholder="https://vk.com/" value=""/>
                            <button class="btn    color-bg  float-btn">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- dasboard-wrapper end -->
    </div>
    @endsection
