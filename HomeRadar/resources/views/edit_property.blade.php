@extends('layouts.main-two')

@section('title', 'Edit Property')

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

    .input-container input, .input-container select, .input-container textarea {
        flex: 1; /* Make input take the remaining space */
    }
</style>

<!-- content -->
<div class="dashboard-content">
    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dashboard Menu</div>
    <div class="container dashboard-container">
        <!-- dashboard-title -->
        <div class="dashboard-title fl-wrap">
            <div class="dashboard-title-item"><span>Edit Listing</span></div>
            <div class="dashbard-menu-header">
                <div class="dashbard-menu-avatar fl-wrap">
                    <h4>Welcome, Guest</h4> <!-- Changed from auth()->user()->name to a generic message -->
                </div>
                <a href="{{ route('home') }}" class="log-out-btn tolt" data-microtip-position="bottom" data-tooltip="Back to Home"><i class="far fa-power-off"></i></a>
            </div>
        </div>
        <!-- dashboard-title end -->

        <!-- Edit Property Form -->
        <form action="{{ route('propertie.update', $propertie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Indicate that this is an update request -->

            <!-- Location / Contacts -->
            <div class="dashboard-widget-title dwb-mar fl-wrap" id="sec2">
                <h5><i class="fas fa-street-view"></i> Location / Contacts</h5>
            </div>
            <div class="dashboard-widget-box fl-wrap">
                <div class="custom-form">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>City</label>
                            <div class="listsearch-input-item">
                                <select name="location" data-placeholder="Select City" class="chosen-select no-search-select">
                                    <option value="">Select City</option>
                                    @foreach(['New York', 'London', 'Paris', 'Kiev', 'Moscow', 'Dubai', 'Rome', 'Beijing'] as $city)
                                        <option value="{{ $city }}" {{ $propertie->location == $city ? 'selected' : '' }}>{{ $city }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Property Name</label>
                            <input type="text" name="property_name" placeholder="Property Name" value="{{ $propertie->property_name }}" required/>
                        </div>                        
                    </div>
                </div>
            </div>

            <!-- Header Media -->
            <div class="dashboard-widget-title dwb-mar fl-wrap" id="sec3">
                <h5><i class="fas fa-image"></i> Header Media</h5>
            </div>
            <div class="dashboard-widget-box fl-wrap">
                <div class="custom-form">
                    @foreach(range(1, 6) as $index)
                        <div class="listsearch-input-item fl-wrap input-container">
                            <label for="image{{ $index }}">Upload Image {{ $index }}:</label>
                            <input type="file" class="upload" accept="image/*" name="image{{ $index }}" id="image{{ $index }}">
                            @if($propertie->{"image{$index}"})
                                <img src="{{ asset('storage/' . $propertie->{"image{$index}"}) }}" alt="Image {{ $index }}" style="max-width: 100px; margin-top: 5px;">
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Listing Details -->
            <div class="dashboard-widget-title dwb-mar fl-wrap" id="sec4">
                <h5><i class="fas fa-list"></i> Listing Details</h5>
            </div>
            <div class="dashboard-widget-box fl-wrap">
                <div class="custom-form">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Area (sq ft): <span class="dec-icon"><i class="far fa-sort-size-down-alt"></i></span></label>
                                    <input type="number" name="property_size" placeholder="House Area" value="{{ $propertie->property_size }}" required/>
                                </div>
                                <div class="col-sm-6">
                                    <label>Bedrooms: <span class="dec-icon"><i class="far fa-bed"></i></span></label>
                                    <input type="number" name="rooms" placeholder="House Bedrooms" value="{{ $propertie->rooms }}" required/>
                                </div>
                                <div class="col-sm-6">
                                    <label>Bathrooms: <span class="dec-icon"><i class="far fa-bath"></i></span></label>
                                    <input type="number" name="bathrooms" placeholder="House Bathrooms" value="{{ $propertie->bathrooms }}" required/>
                                </div>
                                <div class="col-sm-6">
                                    <label>Garage Size: <span class="dec-icon"><i class="far fa-warehouse"></i></span></label>
                                    <input type="number" name="garage_size" placeholder="Number of cars" value="{{ $propertie->garage_size }}"/>
                                </div>
                                <div class="col-sm-6">
                                    <label>Price: <span class="dec-icon"><i class="far fa-dollar-sign"></i></span></label>
                                    <input type="number" name="price" placeholder="Price" value="{{ $propertie->price }}" required/>
                                </div>
                                <div class="col-sm-6">
                                    <label>Availability: <span class="dec-icon"><i class="far fa-calendar-alt"></i></span></label>
                                    <select name="availability" required>
                                        <option value="available" {{ $propertie->availability == 'available' ? 'selected' : '' }}>Available</option>
                                        <option value="not available" {{ $propertie->availability == 'not available' ? 'selected' : '' }}>Not Available</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Details Text</label>
                            <div class="listsearch-input-item">
                                <textarea cols="40" rows="3" style="height: 235px" placeholder="Details" name="description" spellcheck="false" required>{{ $propertie->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Save Changes Button -->
            <button type="submit" class="btn color-bg float-btn">Save Changes</button>
        </form>
    </div>
</div>

@endsection
