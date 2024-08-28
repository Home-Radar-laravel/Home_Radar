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
            <div class="bg par-elem "  data-bg="images/bg/4.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
        </div>
        <div class="container">
            <div class="section-title center-align big-title">
                <h2><span>Our Pricing Plans</span></h2>
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
                <a href="#">Home</a><a href="#">Pages</a> <span>Pricing Plans</span>
            </div>
            <div class="share-holder hid-share">
                <a href="#" class="share-btn showshare sfcs">  <i class="fas fa-share-alt"></i>  Share   </a>
                <div class="share-container  isShare"></div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs end -->
    <!-- section -->
    <section class="gray-bg small-padding ">
        <div class="container">
            <div class="pricing-switcher-header">Simple Pricing For Everyone Users:</div>
            <div class="pricing-switcher">
                <div class="fieldset color-bg">
                    <input type="radio" name="duration-1"  id="monthly-1" class="tariff-toggle" checked>
                    <label for="monthly-1">Monthly Tariff</label>
                    <input type="radio" name="duration-1" class="tariff-toggle"  id="yearly-1">
                    <label for="yearly-1">Yearly Tariff</label>
                    <span class="switch"></span>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <!-- pricing-column -->
                <div class="col-md-3">
                    <div class="pricing-column fl-wrap">
                        <div class="pricing-header">
                            <h3><span>01.</span>Free</h3>
                            <div class="price-num price-item fl-wrap">
                                <div class="price-num-item"><span class="mouth-cont"><span class="curen">$</span>0</span><span class="year-cont"><span class="curen">$</span>0</span></div>
                                <div class="price-num-desc"><span class="mouth-cont">Per  Month</span><span class="year-cont">Per Year</span></div>
                            </div>
                            <p>Lorem ipsum dolor   amet, consectetur adipiscing elit.  </p>
                        </div>
                        <div class="pricing-content fl-wrap">
                            <ul class="no-list-style">
                                <li>One Listing</li>
                                <li class="not-included">90 Days Availability</li>
                                <li class="not-included">Non-Featured</li>
                                <li class="not-included">Limited Support</li>
                            </ul>
                            <a href="#" class="price-link color-bg fl-wrap">Choose Free</a>
                        </div>
                    </div>
                </div>
                <!-- pricing-column end -->
                <!-- pricing-column -->
                <div class="col-md-3">
                    <div class="pricing-column fl-wrap">
                        <div class="pricing-header">
                            <h3><span>02.</span>Basic</h3>
                            <div class="price-num price-item fl-wrap">
                                <div class="price-num-item"><span class="mouth-cont"><span class="curen">$</span>49</span><span class="year-cont"><span class="curen">$</span>530</span></div>
                                <div class="price-num-desc"><span class="mouth-cont">Per  Month</span><span class="year-cont">Per Year</span></div>
                            </div>
                            <p>Lorem ipsum dolor   amet, consectetur adipiscing elit.  </p>
                        </div>
                        <div class="recomm-price color-bg">
                            Recommended
                        </div>
                        <div class="pricing-content fl-wrap">
                            <ul class="no-list-style">
                                <li>20 Listings</li>
                                <li>190 Days Availability</li>
                                <li>Non-Featured</li>
                                <li class="not-included">24/7 Support</li>
                            </ul>
                            <a href="#" class="price-link color-bg fl-wrap">Choose Basic</a>
                        </div>
                    </div>
                </div>
                <!-- pricing-column end -->
                <!-- pricing-column -->
                <div class="col-md-3">
                    <div class="pricing-column fl-wrap">
                        <div class="pricing-header">
                            <h3><span>03.</span>Extended</h3>
                            <div class="price-num price-item fl-wrap">
                                <div class="price-num-item"><span class="mouth-cont"><span class="curen">$</span>109</span><span class="year-cont"><span class="curen">$</span>1100</span></div>
                                <div class="price-num-desc"><span class="mouth-cont">Per  Month</span><span class="year-cont">Per Year</span></div>
                            </div>
                            <p>Lorem ipsum dolor   amet, consectetur adipiscing elit.  </p>
                        </div>
                        <div class="pricing-content fl-wrap">
                            <ul class="no-list-style">
                                <li>Unlimited Listings</li>
                                <li>220 Days Availability</li>
                                <li>Non-Featured</li>
                                <li>Limited Support</li>
                            </ul>
                            <a href="#" class="price-link color-bg fl-wrap">Choose Extended</a>
                        </div>
                    </div>
                </div>
                <!-- pricing-column end -->
                <!-- pricing-column -->
                <div class="col-md-3">
                    <div class="pricing-column fl-wrap">
                        <div class="pricing-header">
                            <h3><span>04.</span>Premium</h3>
                            <div class="price-num price-item fl-wrap">
                                <div class="price-num-item"><span class="mouth-cont"><span class="curen">$</span>149</span><span class="year-cont"><span class="curen">$</span>1430</span></div>
                                <div class="price-num-desc"><span class="mouth-cont">Per  Month</span><span class="year-cont">Per Year</span></div>
                            </div>
                            <p>Lorem ipsum dolor   amet, consectetur adipiscing elit.  </p>
                        </div>
                        <div class="pricing-content fl-wrap">
                            <ul class="no-list-style">
                                <li>Unlimited Listings</li>
                                <li>Lifetime Availability</li>
                                <li>Featured In Search Results</li>
                                <li>24/7 Support</li>
                            </ul>
                            <a href="#" class="price-link color-bg fl-wrap">Choose Premium</a>
                        </div>
                    </div>
                </div>
                <!-- pricing-column end -->
            </div>
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
@endsection
