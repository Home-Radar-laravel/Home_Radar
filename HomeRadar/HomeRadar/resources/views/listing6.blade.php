@extends('layouts.app-two')

@section('title', 'Homeradar - Real Estate Listing Template')
@section('keywords', 'real estate, listing, template')
@section('description', 'Find the best real estate listings here.')

@section('content')
<!-- content -->
<div class="content">
    <!--  section  -->
    <section class="hidden-section single-par2" data-scrollax-parent="true">
        <div class="bg-wrap bg-parallax-wrap-gradien">
            <div class="bg par-elem" data-bg="{{ asset('images/bg/3.jpg') }}" data-scrollax="properties: { translateY: '30%' }"></div>
        </div>
        <div class="container">
            <div class="section-title center-align big-title">
                <h2><span>Listings Without Map</span></h2>
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
                <a href="#">Home</a><a href="#">Listings</a> <span>{{ request('location', 'New York') }}</span>
            </div>
            <div class="share-holder hid-share">
                <a href="#" class="share-btn showshare sfcs">  <i class="fas fa-share-alt"></i>  Share   </a>
                <div class="share-container  isShare"></div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs end -->
    <!-- col-list-wrap -->
    <section class="gray-bg small-padding ">
        <div class="container">
            <div class="mob-nav-content-btn color-bg show-list-wrap-search ntm fl-wrap">Show Filters</div>
            <!-- list-searh-input-wrap-->
            <div class="list-searh-input-wrap box_list-searh-input-wrap lws_mobile fl-wrap">
                <div class="list-searh-input-wrap-title fl-wrap"><i class="far fa-sliders-h"></i><span>Search Filters</span></div>
                <form action="{{ route('properties.search') }}" method="GET">
    <div class="custom-form fl-wrap">
        <div class="row">
            <!-- General Search -->
            <div class="col-sm-6">
                <div class="listsearch-input-item">
                    <input type="text" name="query" placeholder="Search by keyword (e.g., name, location, description...)" value="{{ request('query') }}" />
                </div>
            </div>

            <!-- Location Filter -->
            <div class="col-sm-3">
                <div class="listsearch-input-item">
                    <select name="location" class="chosen-select on-radius no-search-select">
                        <option value="">All Cities</option>
                        <option value="New York" {{ request('location') == 'New York' ? 'selected' : '' }}>New York</option>
                        <option value="London" {{ request('location') == 'London' ? 'selected' : '' }}>London</option>
                        <!-- Add more cities here -->
                    </select>
                </div>
            </div>

      <!-- Min and Max Price Section -->
      <div style="margin-top:7px; margin-right:200px" class="col-sm-4">
    <div class="row">
        <!-- Min Price -->
        <div class="col-sm-6">
            <div class="listsearch-input-item" style="display: flex; align-items: center;">
                <label for="min_price" style="margin-right: 10px;">Min Price</label>
                <input type="number" id="min_price" name="min_price" placeholder="Min Price" value="{{ request('min_price') }}" 
                       style="height: 40px; border-radius: 4px; border: 1px solid #ccc; padding: 10px; font-size: 14px; width: 1000px;">
            </div>
        </div>

        <!-- Max Price -->
        <div class="col-sm-6">
            <div class="listsearch-input-item" style="display: flex; align-items: center;margin-left:100px">
                <label for="max_price" style="margin-right: 10px;">Max Price</label>
                <input type="number" id="max_price" name="max_price" placeholder="Max Price" value="{{ request('max_price') }}" 
                       style="height: 40px; border-radius: 4px; border: 1px solid #ccc; padding: 10px; font-size: 14px; width: 2000px;">
            </div>
        </div>
    </div>
</div>


            <!-- Search Button -->
            <div class="col-sm-3">
                <div class="listsearch-input-item">
                    <button type="submit" class="btn color-bg fw-btn float-btn small-btn">Search</button>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</form>

            </div>
            <!-- list-searh-input-wrap end-->
            <!-- list-main-wrap-header-->
            <div class="list-main-wrap-header box-list-header fl-wrap">
                <!-- list-main-wrap-title-->
                <div class="list-main-wrap-title">
                    <h2>Results For : <span>{{ request('location', 'New York') }}</span></h2>
                </div>
                <!-- list-main-wrap-title end-->
                <!-- list-main-wrap-opt-->
                <div class="list-main-wrap-opt">
                    <!-- price-opt-->
                    <div class="price-opt">
                        <span class="price-opt-title">Sort by:</span>
                        <div class="listsearch-input-item">
                            <select name="sort_by" class="chosen-select no-search-select">
                                <option value="popularity" {{ request('sort_by') == 'popularity' ? 'selected' : '' }}>Popularity</option>
                                <option value="average_rating" {{ request('sort_by') == 'average_rating' ? 'selected' : '' }}>Average rating</option>
                                <option value="price_low_high" {{ request('sort_by') == 'price_low_high' ? 'selected' : '' }}>Price: low to high</option>
                                <option value="price_high_low" {{ request('sort_by') == 'price_high_low' ? 'selected' : '' }}>Price: high to low</option>
                            </select>
                        </div>
                    </div>
                    <!-- price-opt end-->
                    <!-- grid-opt-->
                    <div class="grid-opt">
                        <ul class="no-list-style">
                            <li class="grid-opt_act"><span class="two-col-grid act-grid-opt tolt" data-microtip-position="bottom" data-tooltip="Grid View"><i class="far fa-th"></i></span></li>
                            <li class="grid-opt_act"><span class="one-col-grid tolt" data-microtip-position="bottom" data-tooltip="List View"><i class="far fa-list"></i></span></li>
                        </ul>
                    </div>
                    <!-- grid-opt end-->
                </div>
                <!-- list-main-wrap-opt end-->
            </div>
            <!-- list-main-wrap-header end-->
            <!-- listing-item-wrap-->
            <div class="grid-item-holder gallery-items gisp fl-wrap">
                @foreach($properties as $property)
<div class="gallery-item {{ $property->availability }}">
    <div class="listing-item">
        <article class="geodir-category-listing fl-wrap">
            <div class="geodir-category-img fl-wrap" style="width: 100%; height: 300px; overflow: hidden;">
                <a href="{{ route('properties.show', $property->id) }}">
                    <img src="{{ Storage::url($property->image1) }}" alt="{{ $property->property_name }}" style="width: 100%; height: 100%; object-fit: cover;">
                </a>
            </div>
            <div class="geodir-category-content fl-wrap">
                <div class="property-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h3><a href="{{ route('properties.show', $property->id) }}">{{ $property->property_name }}</a></h3>
                    <div class="geodir-category-location" style="text-align: right;">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>{{ $property->location }}</span>
                    </div>
                </div>
                <div class="geodir-category-content_price">${{ number_format($property->price) }}</div>
                <div style="margin-right:300px"><a class="description">{{ Str::limit($property->description, 100) }}</a></div>
                <div class="geodir-category-content-details">
                    <ul>
                        <li><i class="fal fa-bed"></i><span>{{ $property->rooms }}</span></li>
                        <li><i class="fal fa-bath"></i><span>{{ $property->bathrooms }}</span></li>
                        <li><i class="fal fa-cube"></i><span>{{ $property->property_size }} ftÂ²</span></li>
                        <li><i class="fas fa-warehouse"></i><span>{{ $property->garage_size }} Garage Size</span></li>
                        <li><i class="fal fa-calendar-alt"></i><span>Available from: {{ \Carbon\Carbon::parse($property->available_from)->format('M d, Y') }}</span></li>
                    </ul>
                </div>
            </div>
        </article>
    </div>
</div>
@endforeach
            </div>
            <!-- listing-item-wrap end-->
            <!-- pagination-->
            <div class="pagination">
                {{ $properties->links() }}
            </div>
            <!-- pagination end-->
        </div>
    </section>
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