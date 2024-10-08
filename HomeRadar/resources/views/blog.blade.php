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
                <h2><span>Our last News</span></h2>
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
                <a href="#">Home</a> <span>Blog</span>
            </div>
            <div class="share-holder hid-share">
                <a href="#" class="share-btn showshare sfcs">  <i class="fas fa-share-alt"></i>  Share   </a>
                <div class="share-container  isShare"></div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs end -->
    <!-- col-list-wrap -->
    <div class="gray-bg small-padding fl-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="post-container fl-wrap">
                        <!-- article> -->
                        <article class="post-article fl-wrap">
                            <div class="list-single-main-media fl-wrap">
                                <div class="single-slider-wrapper carousel-wrap fl-wrap">
                                    <div class="single-slider fl-wrap carousel lightgallery"  >
                                        <!--  slick-slide-item -->
                                        <div class="slick-slide-item">
                                            <div class="box-item">
                                                <a href="images/all/blog/1.jpg" class="gal-link popup-image"><i class="fal fa-search"  ></i></a>
                                                <img src="images/all/blog/1.jpg" alt="">
                                            </div>
                                        </div>
                                        <!--  slick-slide-item end -->
                                        <!--  slick-slide-item -->
                                        <div class="slick-slide-item">
                                            <div class="box-item">
                                                <a href="images/all/blog/2.jpg" class="gal-link popup-image"><i class="fal fa-search"  ></i></a>
                                                <img src="images/all/blog/2.jpg" alt="">
                                            </div>
                                        </div>
                                        <!--  slick-slide-item end -->
                                        <!--  slick-slide-item -->
                                        <div class="slick-slide-item">
                                            <div class="box-item">
                                                <a href="images/all/blog/3.jpg" class="gal-link popup-image"><i class="fal fa-search"  ></i></a>
                                                <img src="images/all/blog/3.jpg" alt="">
                                            </div>
                                        </div>
                                        <!--  slick-slide-item end -->
                                    </div>
                                    <div class="swiper-button-prev ssw-btn"><i class="fas fa-caret-left"></i></div>
                                    <div class="swiper-button-next ssw-btn"><i class="fas fa-caret-right"></i></div>
                                </div>
                            </div>
                            <div class="list-single-main-item fl-wrap block_box">
                                <h2 class="post-opt-title"><a href="blog-single.html">Best House to Your Family .</a></h2>
                                <p>Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
                                <span class="fw-separator fl-wrap"></span>
                                <div class="post-author"><a href="#"><img src="images/avatar/5.jpg" alt=""><span>By , Alisa Noory</span></a></div>
                                <div class="post-opt">
                                    <ul class="no-list-style">
                                        <li><i class="fal fa-calendar"></i> <span>15 April 2019</span></li>
                                        <li><i class="fal fa-eye"></i> <span>164</span></li>
                                        <li><i class="fal fa-tags"></i> <a href="#">Shop</a> , <a href="#">Hotels</a> </li>
                                    </ul>
                                </div>
                                <a href="blog-single.html" class="btn color-bg float-btn small-btn">Read more</a>
                            </div>
                        </article>
                        <!-- article end -->
                        <!-- article> -->
                        <article class="post-article fl-wrap">
                            <div class="list-single-main-media fl-wrap">
                                <img src="images/all/blog/4.jpg" class="respimg" alt="">
                            </div>
                            <div class="list-single-main-item fl-wrap block_box">
                                <h2 class="post-opt-title"><a href="blog-single.html">How to choose the right Agent.</a></h2>
                                <p>Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
                                <span class="fw-separator fl-wrap"></span>
                                <div class="post-author"><a href="#"><img src="images/avatar/5.jpg" alt=""><span>By , Alisa Noory</span></a></div>
                                <div class="post-opt">
                                    <ul class="no-list-style">
                                        <li><i class="fal fa-calendar"></i> <span>15 April 2019</span></li>
                                        <li><i class="fal fa-eye"></i> <span>164</span></li>
                                        <li><i class="fal fa-tags"></i> <a href="#">Shop</a> , <a href="#">Hotels</a> </li>
                                    </ul>
                                </div>
                                <a href="blog-single.html" class="btn color-bg float-btn small-btn">Read more</a>
                            </div>
                        </article>
                        <!-- article end -->
                        <!-- article> -->
                        <article class="post-article fl-wrap">
                            <div class="list-single-main-media fl-wrap">
                                <img src="images/all/blog/2.jpg" class="respimg" alt="">
                            </div>
                            <div class="list-single-main-item fl-wrap block_box">
                                <h2 class="post-opt-title"><a href="blog-single.html">RealEstate Facts And Story</a></h2>
                                <p>Ut euismod ultricies sollicitudin. Curabitur sed dapibus nulla. Nulla eget iaculis lectus. Mauris ac maximus neque. Nam in mauris quis libero sodales eleifend. Morbi varius, nulla sit amet rutrum elementum, est elit finibus tellus, ut tristique elit risus at metus.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt...</p>
                                <span class="fw-separator fl-wrap"></span>
                                <div class="post-author"><a href="#"><img src="images/avatar/5.jpg" alt=""><span>By , Alisa Noory</span></a></div>
                                <div class="post-opt">
                                    <ul class="no-list-style">
                                        <li><i class="fal fa-calendar"></i> <span>15 April 2019</span></li>
                                        <li><i class="fal fa-eye"></i> <span>164</span></li>
                                        <li><i class="fal fa-tags"></i> <a href="#">Shop</a> , <a href="#">Hotels</a> </li>
                                    </ul>
                                </div>
                                <a href="blog-single.html" class="btn color-bg float-btn small-btn">Read more</a>
                            </div>
                        </article>
                        <!-- article end -->
                        <!-- pagination-->
                        <div class="pagination">
                            <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                            <a href="#" >1</a>
                            <a href="#" class="current-page">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                        </div>
                        <!-- pagination end-->
                    </div>
                </div>
                <!-- col-md 8 end -->
                <!--  sidebar-->
                <div class="col-md-4">
                    <div class="box-widget-wrap fl-wrap fixed-bar">
                        <!--box-widget-->
                        <div class="box-widget fl-wrap">
                            <div class="search-widget fl-wrap">
                                <form action="#" class="fl-wrap custom-form">
                                    <input name="se" id="se" type="text" class="search" placeholder="Search.." value="" />
                                    <button class="search-submit" id="submit_btn"><i class="far fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!--box-widget end -->
                        <!--box-widget-->
                        <div class="box-widget fl-wrap">
                            <div class="box-widget-title fl-wrap">Popular Posts</div>
                            <div class="box-widget-content fl-wrap">
                                <!--widget-posts-->
                                <div class="widget-posts  fl-wrap">
                                    <ul class="no-list-style">
                                        <li>
                                            <div class="widget-posts-img"><a href="blog-single.html"><img src="images/all/blog/5.jpg" alt=""></a></div>
                                            <div class="widget-posts-descr">
                                                <h4><a href="listing-single.html">Nullam dictum felis</a></h4>
                                                <div class="geodir-category-location fl-wrap"><a href="#"><i class="fal fa-calendar"></i> 27 Mar 2020</a></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="widget-posts-img"><a href="blog-single.html"><img src="images/all/blog/2.jpg" alt=""></a></div>
                                            <div class="widget-posts-descr">
                                                <h4><a href="listing-single.html">Scrambled it to mak</a></h4>
                                                <div class="geodir-category-location fl-wrap"><a href="#"><i class="fal fa-calendar"></i> 12 May 2020</a></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="widget-posts-img"><a href="blog-single.html"><img src="images/all/blog/6.jpg" alt=""></a> </div>
                                            <div class="widget-posts-descr">
                                                <h4><a href="listing-single.html">Fermentum nis type</a></h4>
                                                <div class="geodir-category-location fl-wrap"><a href="#"><i class="fal fa-calendar"></i>22 Feb  2020</a></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="widget-posts-img"><a href="blog-single.html"><img src="images/all/blog/4.jpg" alt=""></a> </div>
                                            <div class="widget-posts-descr">
                                                <h4><a href="listing-single.html">Rutrum elementum</a></h4>
                                                <div class="geodir-category-location fl-wrap"><a href="#"><i class="fal fa-calendar"></i> 7 Mar 2019</a></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- widget-posts end-->
                            </div>
                        </div>
                        <!--box-widget end -->
                        <!--box-widget-->
                        <div class="box-widget fl-wrap">
                            <div class="box-widget-title fl-wrap">Categories</div>
                            <div class="box-widget-content fl-wrap">
                                <ul class="cat-item no-list-style">
                                    <li><a href="#">Standard</a> <span>3</span></li>
                                    <li><a href="#">Video</a> <span>6 </span></li>
                                    <li><a href="#">Gallery</a> <span>12 </span></li>
                                    <li><a href="#">Quotes</a> <span>4</span></li>
                                </ul>
                            </div>
                        </div>
                        <!--box-widget end -->
                        <!--box-widget-->
                        <div class="box-widget fl-wrap">
                            <div class="banner-widget fl-wrap">
                                <div class="bg-wrap bg-parallax-wrap-gradien">
                                    <div class="bg  "  data-bg="images/all/blog/1.jpg"></div>
                                </div>
                                <div class="banner-widget_content">
                                    <h5>Do you want to join our real estate network?</h5>
                                    <a href="#" class="btn float-btn color-bg small-btn">Become an Agent</a>
                                </div>
                            </div>
                        </div>
                        <!--box-widget end -->
                        <!--box-widget-->
                        <div class="box-widget fl-wrap">
                            <div class="box-widget-title fl-wrap">Tags</div>
                            <div class="box-widget-content fl-wrap">
                                <!--tags-->
                                <div class="list-single-tags fl-wrap tags-stylwrap" style="margin-top: 20px;">
                                    <a href="#">Hotel</a>
                                    <a href="#">Hostel</a>
                                    <a href="#">Room</a>
                                    <a href="#">Spa</a>
                                    <a href="#">Restourant</a>
                                    <a href="#">Parking</a>
                                </div>
                                <!--tags end-->
                            </div>
                        </div>
                        <!--box-widget end -->
                        <!--box-widget-->
                        <div class="box-widget fl-wrap">
                            <div class="box-widget-title fl-wrap">Archive</div>
                            <div class="box-widget-content fl-wrap">
                                <ul class="cat-item cat-item_dec no-list-style">
                                    <li><a href="#">March 2020</a></li>
                                    <li><a href="#">May 2019</a>  </li>
                                    <li><a href="#">January 2016</a>  </li>
                                    <li><a href="#">Decemder 2018</a> </li>
                                </ul>
                            </div>
                        </div>
                        <!--box-widget end -->
                    </div>
                    <!-- sidebar end-->
                </div>
            </div>
        </div>
    </div>
    <div class="limit-box fl-wrap"></div>
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
