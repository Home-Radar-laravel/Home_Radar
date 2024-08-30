@extends('layouts.app-two')

@section('title', 'Homeradar - Real Estate Listing Template')
@section('keywords', 'real estate, listing, template')
@section('description', 'Find the best real estate listings here.')

@section('content')

  <!-- content -->
  <div class="content">
    <!--  section  -->
    <section class="hidden-section single-par2  " data-scrollax-parent="true">
        <div class="bg-wrap bg-parallax-wrap-gradien">
            <div class="bg par-elem "  data-bg="images/bg/10.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
        </div>
        <div class="container">
            <div class="section-title center-align big-title">
                <h2><span>Our Contacts</span></h2>
                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut nec tincidunt arcu, sit amet fermentum sem.</h4>
            </div>
            <div class="scroll-down-wrap">
                <div class="mousey">
                    <div class="scroller"></div>
                </div>
                <span>Scroll Down To Discover</span>
            </div>
        </div>
    </section>
    <!--  section  end-->
    <!-- breadcrumbs-->
    <div class="breadcrumbs fw-breadcrumbs sp-brd fl-wrap">
        <div class="container">
            <div class="breadcrumbs-list">
                <a href="#">Home</a> <a href="#">Pages</a><span>Contacts</span>
            </div>
            <div class="share-holder hid-share">
                <a href="#" class="share-btn showshare sfcs">  <i class="fas fa-share-alt"></i>  Share   </a>
                <div class="share-container  isShare"></div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs end -->
    <!-- section -->
    <section class="gray-bg small-padding">
        <div class="container">
            <div class="row">
                <!-- services-item -->
                <div class="col-md-4">
                    <div class="services-item fl-wrap">
                        <i class="fal fa-envelope"></i>
                        <h4>Our Mails <span>01</span></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <a href="#" class="serv-link sl-b">yourmail@domain.com</a>
                    </div>
                </div>
                <!-- services-item  end-->
                <!-- services-item -->
                <div class="col-md-4">
                    <div class="services-item fl-wrap">
                        <i class="fal fa-phone-rotary"></i>
                        <h4>Our Phones<span>02</span></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <a href="#" class="serv-link sl-b">+7(111)123456789</a>
                    </div>
                </div>
                <!-- services-item  end-->
                <!-- services-item -->
                <div class="col-md-4">
                    <div class="services-item fl-wrap">
                        <i class="fal fa-map-marked"></i>
                        <h4>Our Adress <span>03</span></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        <a href="#" class="serv-link sl-b">USA 27TH Brooklyn NY</a>
                    </div>
                </div>
                <!-- services-item  end-->
            </div>
            <div class="clearfix"></div>
            <div class="contacts-opt fl-wrap">
                <div class="contact-social">
                    <span class="cs-title">Find us on: </span>
                    <ul>
                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                    </ul>
                </div>
                <a href="#" class="btn small-btn float-btn color-bg cf_btn">Write Mesagge</a>
                <div class="contact-notifer">Or visit our <a href="help.html">  help page</a></div>
            </div>
            <!--box-widget  -->
            <div class="box-widget">
                <div class="box-widget-title single_bwt fl-wrap   ">Office Location</div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.</p>
                <!--box-widget end-->
            </div>
            <!--box-widget-->
            <div class="box-widget fl-wrap">
                <div class="map-widget contacts-map fl-wrap">
                    <div class="map-container mapC_vis">
                        <div id="singleMap" data-latitude="40.7427837" data-longitude="-73.11445617675781"   data-infotitle="Our Loacation In NewYork" data-infotext="70 Bright St New York, USA"></div>
                        <div class="scrollContorl"></div>
                    </div>
                </div>
            </div>
            <!--box-widget end -->
        </div>
    </section>
    <!-- section end-->
</div>
<!-- content end -->
<!-- subscribe-wrap -->
<div class="subscribe-wrap fl-wrap">
    <div class="container">
        <div class="subscribe-container fl-wrap color-bg">
            <div class="pwh_bg"></div>
            <div class="mrb_dec mrb_dec3"></div>
            <div class="row">
                <div class="col-md-6">
                    <div class="subscribe-header">
                        <h4>newsletter</h4>
                        <h3>Sign up for newsletter and get latest news and update</h3>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="footer-widget fl-wrap">
                        <div class="subscribe-widget fl-wrap">
                            <div class="subcribe-form">
                                <form id="subscribe">
                                    <input class="enteremail fl-wrap" name="email" id="subscribe-email" placeholder="Enter Your Email" spellcheck="false" type="text">
                                    <button type="submit" id="subscribe-button" class="subscribe-button color-bg">  Subscribe</button>
                                    <label for="subscribe-email" class="subscribe-message"></label>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- subscribe-wrap end -->
<!-- footer -->
<footer class="main-footer fl-wrap">
    <div class="footer-inner fl-wrap">
        <div class="container">
            <div class="row">
                <!-- footer widget-->
                <div class="col-md-3">
                    <div class="footer-widget fl-wrap">
                        <div class="footer-widget-logo fl-wrap">
                            <img src="images/logo.png" alt="">
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
                        <div class="fw_hours fl-wrap">
                            <span>Monday - Friday:<strong> 8am - 6pm</strong></span>
                            <span>Saturday - Sunday:<strong> 9am - 3pm</strong></span>
                        </div>
                    </div>
                </div>
                <!-- footer widget end-->
                <!-- footer widget-->
                <div class="col-md-3">
                    <div class="footer-widget fl-wrap">
                        <div class="footer-widget-title fl-wrap">
                            <h4>Helpful links</h4>
                        </div>
                        <ul class="footer-list fl-wrap">
                            <li><a href="about.html">About Our Company</a></li>
                            <li><a href="blog.html">Our last News</a></li>
                            <li><a href="pricing.html">Pricing Plans</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="help.html">Help Center</a></li>
                        </ul>
                    </div>
                </div>
                <!-- footer widget end-->
                <!-- footer widget-->
                <div class="col-md-3">
                    <div class="footer-widget fl-wrap">
                        <div class="footer-widget-title fl-wrap">
                            <h4>Contacts Info</h4>
                        </div>
                        <ul  class="footer-contacts fl-wrap">
                            <li><span><i class="fal fa-envelope"></i> Mail :</span><a href="#" target="_blank">yourmail@domain.com</a></li>
                            <li> <span><i class="fal fa-map-marker"></i> Adress :</span><a href="#" target="_blank">USA 27TH Brooklyn NY</a></li>
                            <li><span><i class="fal fa-phone"></i> Phone :</span><a href="#">+7(111)123456789</a></li>
                        </ul>
                        <div class="footer-social fl-wrap">
                            <ul>
                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-vk"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- footer widget end-->
                <!-- footer widget-->
                <div class="col-md-3">
                    <div class="footer-widget fl-wrap">
                        <div class="footer-widget-title fl-wrap">
                            <h4>Download our API</h4>
                        </div>
                        <p>Start working with Homeradar that can provide everything you need </p>
                        <div class="api-links fl-wrap">
                            <a href="#" class="api-btn color-bg"><i class="fab fa-apple"></i> App Store</a>
                            <a href="#" class="api-btn color-bg"><i class="fab fa-google-play"></i> Play Market</a>
                        </div>
                    </div>
                </div>
                <!-- footer widget end-->
            </div>
        </div>
    </div>
    <!--sub-footer-->
    <div class="sub-footer gray-bg fl-wrap">
        <div class="container">
            <div class="copyright"> &#169; Homeradar 2022 .  All rights reserved.</div>
            <div class="subfooter-nav">
                <ul class="no-list-style">
                    <li><a href="#">Terms of use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--sub-footer end -->
</footer>
<!-- footer end -->
</div>
<!-- wrapper end -->
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
                            <form method="post"  name="registerform">
                                <label>Username or Email Address  * <span class="dec-icon"><i class="fal fa-user"></i></span></label>
                                <input name="email" type="text"    onClick="this.select()" value="">
                                <div class="pass-input-wrap fl-wrap">
                                    <label >Password  * <span class="dec-icon"><i class="fal fa-key"></i></span></label>
                                    <input name="password" type="password"  autocomplete="off" onClick="this.select()" value="" >
                                    <span class="eye"><i class="fal fa-eye"></i> </span>
                                </div>
                                <div class="lost_password">
                                    <a href="#">Lost Your Password?</a>
                                </div>
                                <div class="filter-tags">
                                    <input id="check-a3" type="checkbox" name="check">
                                    <label for="check-a3">Remember me</label>
                                </div>
                                <div class="clearfix"></div>
                                <button type="submit"  class="log_btn color-bg"> LogIn </button>
                            </form>
                        </div>
                    </div>
                    <!--tab end -->
                    <!--tab -->
                    <div class="tab">
                        <div id="tab-2" class="tab-content">
                            <div class="custom-form">
                                <form method="post"   name="registerform" class="main-register-form" id="main-register-form2">
                                    <label >Full Name  * <span class="dec-icon"><i class="fal fa-user"></i></span></label>
                                    <input name="name" type="text"    onClick="this.select()" value="">
                                    <label>Email Address  * <span class="dec-icon"><i class="fal fa-envelope"></i></span></label>
                                    <input name="email" type="text"    onClick="this.select()" value="">
                                    <div class="pass-input-wrap fl-wrap">
                                        <label >Password  * <span class="dec-icon"><i class="fal fa-key"></i></span></label>
                                        <input name="password" type="password"  autocomplete="off"  onClick="this.select()" value="" >
                                        <span class="eye"><i class="fal fa-eye"></i> </span>
                                    </div>
                                    <div class="filter-tags ft-list">
                                        <input id="check-a2" type="checkbox" name="check">
                                        <label for="check-a2">I agree to the <a href="#">Privacy Policy</a> and <a href="#">Terms and Conditions</a></label>
                                    </div>
                                    <div class="clearfix"></div>
                                    <button type="submit"     class="log_btn color-bg"> Register </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--tab end -->
                </div>
                <!--tabs end -->
                <div class="log-separator fl-wrap"><span>or</span></div>
                <div class="soc-log fl-wrap">
                    <p>For faster login or register use your social account.</p>
                    <a href="#" class="facebook-log"> Facebook</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--register form end -->
<!--secondary-nav -->
<div class="secondary-nav">
<ul>
    <li><a href="dashboard-add-listing.html" class="tolt" data-microtip-position="left"  data-tooltip="Sell Property"><i class="fal fa-truck-couch"></i> </a></li>
    <li><a href="listing.html" class="tolt" data-microtip-position="left"  data-tooltip="Buy Property"> <i class="fal fa-shopping-bag"></i></a></li>
    <li><a href="compare.html" class="tolt" data-microtip-position="left"  data-tooltip="Your Compare"><i class="fal fa-exchange"></i></a></li>
</ul>
<div class="progress-indicator">
    <svg xmlns="http://www.w3.org/2000/svg"
        viewBox="-1 -1 34 34">
        <circle cx="16" cy="16" r="15.9155"
            class="progress-bar__background" />
        <circle cx="16" cy="16" r="15.9155"
            class="progress-bar__progress
            js-progress-bar" />
    </svg>
</div>
</div>
<!--secondary-nav end -->
<a class="to-top color-bg"><i class="fas fa-caret-up"></i></a>
</div>
<!-- Main end -->
<!--contact-form-wrap -->
<div class="contact-form-wrap">
<div class="contact-form-container">
<div class="contact-form-main fl-wrap">
    <div class="contact-form-header">
        <h4>Get In Touch</h4>
        <span class="close-contact-form"><i class="fal fa-times"></i></span>
    </div>
    <div id="contact-form" class="contact-form fl-wrap">
        <div id="message"></div>
        <form  class="custom-form" action="https://homeradar.kwst.net/php/contact.php" name="contactform" id="contactform">
            <fieldset>
                <label>Your name* <span class="dec-icon"><i class="fas fa-user"></i></span></label>
                <input type="text" name="name" id="name" placeholder="Your Name *" value=""/>
                <label>Your mail* <span class="dec-icon"><i class="fas fa-envelope"></i></span></label>
                <input type="text"  name="email" id="email" placeholder="Email Address*" value=""/>
                <textarea name="comments"  id="comments" cols="40" rows="3" placeholder="Your Message:"></textarea>
            </fieldset>
            <button class="btn float-btn color-bg" style="margin-top:15px;" id="submit">Send Message</button>
        </form>
    </div>
    <!-- contact form  end-->
</div>
</div>
<div class="contact-form-overlay"></div>
</div>
<!--contact-form-wrap end-->
<!--=============== scripts  ===============-->
<script src="js/jquery.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/scripts.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo&amp;libraries=places"></script>
<script src="js/map-single.js"></script>
</body>

<!-- Mirrored from homeradar.kwst.net/contacts.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Aug 2023 08:47:52 GMT -->
</html>
@endsection
