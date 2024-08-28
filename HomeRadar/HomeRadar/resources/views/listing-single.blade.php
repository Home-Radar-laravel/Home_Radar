@extends('layouts.app-two')

@section('title', $property->property_name . ' - Real Estate Listing Template')
@section('keywords', 'real estate, listing, template')
@section('description', 'Find the best real estate listings here.')

@section('content')
 <style>
  .gallery-item img {
    height: 200px;
    width: 100%;
    object-fit: cover;
    margin-bottom: 20px;
    border-radius: 10px;
}

.gallery-item {
    padding: 10px; 
    
}



 </style>
<!-- content -->
<div class="content">
    <section class="hidden-section single-hero-section" data-scrollax-parent="true" id="sec1">
        <div class="bg-wrap bg-parallax-wrap-gradien">
            <div class="bg par-elem "  data-bg="{{ Storage::url($property->image1) }}" data-scrollax="properties: { translateY: '30%' }"></div>
        </div>
        <div class="container">
            <!--  list-single-opt_header end -->
            <div class="list-single-header-item no-bg-list_sh fl-wrap">
                <div class="row">
                    <div class="col-md-12">
                        <h1>{{ $property->property_name }} <span class="verified-badge tolt" data-microtip-position="bottom"  data-tooltip="Verified"><i class="fas fa-check"></i></span></h1>
                        <div class="geodir-category-location fl-wrap">
                            <a href="#"><i class="fas fa-map-marker-alt"></i> {{ $property->location }}</a>
                        </div>
                    </div>
                </div>
                <div class="list-single-header-footer fl-wrap">
                    <div class="list-single-header-price" data-propertyprise="{{ $property->price }}"><strong>Price:</strong><span>$</span>{{ number_format($property->price, 2) }}</div>
                    <div class="list-single-stats">
                        <ul class="no-list-style">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="breadcrumbs fw-breadcrumbs smpar fl-wrap">
        <div class="container">
            <div class="breadcrumbs-list">
                <a href="#">Home</a><a href="#">Listings</a><a href="#">New York</a><span>Property Single</span>
            </div>
            <div class="show-more-snopt smact"><i class="fal fa-ellipsis-v"></i></div>
            <div class="show-more-snopt-tooltip">
                <a href="#sec15" class="custom-scroll-link"> <i class="fasfa-comment-alt"></i> Write a review</a>
                <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
            </div>
        </div>
    </div>
    <div class="gray-bg small-padding fl-wrap">
        <div class="container">
            <div class="row">
                <!--  listing-single content -->
                <div class="col-md-8">
                    <div class="list-single-main-wrapper fl-wrap">
                        <!--  scroll-nav-wrap -->
                        <div class="scroll-nav-wrap">
                            <nav class="scroll-nav scroll-init fixed-column_menu-init">
                                <ul class="no-list-style">
                                    <li><a class="act-scrlink" href="#sec1"><i class="fal fa-home-lg-alt"></i></a><span>Main</span></li>
                                    <li><a  href="#sec2"><i class="fal fa-image"></i></a><span>Gallery</span></li>
                                    <li><a href="#sec3"><i class="fal fa-info"></i> </a><span>Details</span></li>
                                    <li><a href="#sec7"><i class="fal fa-comment-alt-lines"></i></a><span>Reviews</span></li>
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
                            </nav>
                        </div>
                        <!--  scroll-nav-wrap end-->
                        <div class="list-single-main-media fl-wrap" id="sec2">
                            <!-- gallery-items   -->
                            <div class="gallery-items grid-small-pad list-single-gallery three-coulms lightgallery">
                                @for ($i = 1; $i <= 6; $i++)
                                    @php $imageField = "image$i"; @endphp
                                    @if ($property->$imageField)
                                        <div class="gallery-item">
                                            <div class="grid-item-holder">
                                                <div class="box-item">
                                                    <img src="{{ Storage::url($property->$imageField) }}" alt="Property Image {{ $i }}" class="img-fluid" style="height: 200px; object-fit: cover; margin-bottom: 10px;">
                                                    <a href="{{ Storage::url($property->$imageField) }}" class="gal-link popup-image"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                            <!-- end gallery items -->
                        </div>
                        <div class="list-single-facts fl-wrap">
                            <!-- inline-facts -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <i class="fal fa-bed"></i>
                                    <h6>Bedrooms</h6>
                                    <span>{{ $property->rooms }} Bedrooms</span>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                            <!-- inline-facts -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <i class="fal fa-bath"></i>
                                    <h6>Bathrooms</h6>
                                    <span>{{ $property->bathrooms }} Full</span>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <i class="fal fa-car"></i>
                                    <h6>Garage Size</h6>
                                    <span>{{ $property->garage_size }} cars</span>
                                </div>
                            </div>
                             <!-- inline-facts end -->
                            <div class="inline-facts-wrap">
                                <div class="inline-facts">
                                    <i class="fal fa-ruler-combined"></i>
                                    <h6>Property Size</h6>
                                    <span>{{ $property->property_size }} m²</span>
                                </div>
                            </div>
                            <!-- inline-facts end -->
                        </div>
                        <div class="list-single-main-container fl-wrap" id="sec3">
                            <!-- list-single-main-item -->
                            <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title">
                                    <h3>About This Listing</h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <p>{{ $property->description }}</p>
                                    <a href="#" class="btn float-btn color-bg">Visit Website</a>
                                </div>
                            </div>
                            <!-- list-single-main-item end -->
                            <!-- list-single-main-item -->
                            <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title">
                                    <h3>Details</h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <div class="details-list">
                                        <ul>
                                            <li><span>Property Id:</span>{{ $property->id }}</li>
                                            <li><span>Property Lot Size:</span>{{ $property->property_size }} m²</li>
                                            <li><span>Bathrooms:</span>{{ $property->bathrooms }}</li>
                                            <li><span>Rooms:</span>{{ $property->rooms }}</li>
                                            <li><span>Bedrooms:</span>{{ $property->rooms }}</li>
                                            <li><span>Garage Size:</span>{{ $property->garage_size }} cars</li>
                                            <li><span>Available from:</span>{{ $property->availability }}</li>
                                            <li><span>Price:</span>$ {{ number_format($property->price, 2) }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- list-single-main-item end -->
                            <div class="list-single-main-item fl-wrap" id="sec7">
                                <div class="list-single-main-item-title">
                                    <h3>Reviews <span>2</span></h3>
                                </div>
                                <div class="list-single-main-item_content fl-wrap">
                                    <div class="reviews-comments-wrap fl-wrap">
                                        <!-- reviews-comments-item -->
                                        <div class="reviews-comments-item">
                                            <div class="review-comments-avatar">
                                            </div>
                                            <div class="reviews-comments-item-text smpar">
                                                <h4><a href="#">Liza Rose</a></h4>
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="3"><span class="re_stars-title">Average</span></div>
                                                <div class="clearfix"></div>
                                                <p>" Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. "</p>
                                                <div class="reviews-comments-item-date"><span class="reviews-comments-item-date-item"><i class="far fa-calendar-check"></i>12 April 2018</span><a href="#" class="rate-review"><i class="fal fa-thumbs-up"></i>  Helpful Review  <span>6</span> </a></div>
                                            </div>
                                        </div>
                                        <!--reviews-comments-item end-->
                                        <!-- reviews-comments-item -->
                                        <div class="reviews-comments-item">
                                            <div class="review-comments-avatar">
                                            </div>
                                            <div class="reviews-comments-item-text smpar">
                                                <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                                <div class="show-more-snopt-tooltip bxwt">
                                                    <a href="#"> <i class="fas fa-reply"></i> Reply</a>
                                                    <a href="#"> <i class="fas fa-exclamation-triangle"></i> Report </a>
                                                </div>
                                                <h4><a href="#">Adam Koncy</a></h4>
                                                <div class="listing-rating card-popup-rainingvis" data-starrating2="5"><span class="re_stars-title">Excellent</span></div>
                                                <div class="clearfix"></div>
                                                <p>" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. "</p>
                                                <div class="reviews-comments-item-date"><span class="reviews-comments-item-date-item"><i class="far fa-calendar-check"></i>03 December 2017</span><a href="#" class="rate-review"><i class="fal fa-thumbs-up"></i>  Helpful Review  <span>2</span> </a></div>
                                            </div>
                                        </div>
                                        <!--reviews-comments-item end-->
                                    </div>
                                </div>
                            </div>
                            <!-- list-single-main-item end -->
                            <!-- list-single-main-item -->
                            <div class="list-single-main-item fl-wrap" id="sec15">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>Add Your Review</h3>
                                </div>
                                <!-- Add Review Box -->
                                <div id="add-review" class="add-review-box">
                                    <!-- Review Comment -->
                                    <form class="add-comment custom-form">
                                        <fieldset>
                                            <textarea cols="40" rows="3" placeholder="Your Review:"></textarea>
                                        </fieldset>
                                        <button class="btn big-btn color-bg float-btn">Submit Review <i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                                <!-- Add Review Box / End -->
                            </div>
                            <!-- list-single-main-item end -->
                        </div>
                    </div>
                </div>
                <!-- listing-single content end-->
                <!-- sidebar -->
                <div class="col-md-4">
                    <!--box-widget-->
                    <div class="box-widget fl-wrap">
                        <div class="profile-widget">
                            <div class="profile-widget-header color-bg smpar fl-wrap">
                                <div class="pwh_bg"></div>
                                <div class="box-widget-menu-btn smact"><i class="far fa-ellipsis-h"></i></div>
                                
                                <div class="profile-widget-card">
                                    <div class="profile-widget-image">
                                    </div>
                                    <div class="profile-widget-header-title">
                                        <h4><a href="agent-single.html">Jessie Wilcox</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-widget-content fl-wrap">
                                <div class="contats-list fl-wrap">
                                    <ul class="no-list-style">
                                        <li><span><i class="fal fa-phone"></i> Phone :</span> <a href="#">+7(123)987654</a></li>
                                        <li><span><i class="fal fa-envelope"></i> Mail :</span> <a href="#">JessieWilcox@domain.com</a></li>
                                    </ul>
                                </div>
                                <div class="profile-widget-footer fl-wrap">
                             
                                    <a href="{{ route('user_bookings.create', ['property_id' => $property->id]) }}" class="btn float-btn color-bg">Book now </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--box-widget end -->
                </div>
                <!--  sidebar end-->
            </div>
           
        </div>
    </div>
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
