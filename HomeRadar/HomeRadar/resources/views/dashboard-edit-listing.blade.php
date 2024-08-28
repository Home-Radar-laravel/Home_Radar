@extends('layouts.main-two')

@section('title', 'dashboard-edit-listing')

@section('content')



<style>
    .input-container {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .input-container label {
        flex: 0 0 150px;
        margin-right: 10px;
    }

    .input-container input,
    .input-container select,
    .input-container textarea {
        flex: 1;
    }

</style>

<div class="dashboard-content">
    <div class="container dasboard-container">
        <div class="dashboard-title fl-wrap">
            <div class="dashboard-title-item"><span>Edit Listing</span></div>
            <div class="dashbard-menu-header">
                <div class="dashbard-menu-avatar fl-wrap">
                    <h4>Welcome, <span>{{ Auth::user()->name }}</span></h4>
                </div>
                <a href="index.html" class="log-out-btn tolt" data-microtip-position="bottom" data-tooltip="Log Out"><i class="far fa-power-off"></i></a>
            </div>
        </div>

        <!-- Form to edit property -->
        <form action="{{ route('properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Location / Contacts -->
            <div class="dasboard-widget-box fl-wrap">
                <div class="custom-form">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>City</label>
                            <div class="listsearch-input-item">
                                <select name="location" class="chosen-select no-search-select">
                                    <option value="">Select City</option>
                                    <option value="New York" {{ $property->location == 'New York' ? 'selected' : '' }}>New York</option>
                                    <option value="London" {{ $property->location == 'London' ? 'selected' : '' }}>London</option>
                                    <option value="Paris" {{ $property->location == 'Paris' ? 'selected' : '' }}>Paris</option>
                                    <option value="Kiev" {{ $property->location == 'Kiev' ? 'selected' : '' }}>Kiev</option>
                                    <option value="Moscow" {{ $property->location == 'Moscow' ? 'selected' : '' }}>Moscow</option>
                                    <option value="Dubai" {{ $property->location == 'Dubai' ? 'selected' : '' }}>Dubai</option>
                                    <option value="Rome" {{ $property->location == 'Rome' ? 'selected' : '' }}>Rome</option>
                                    <option value="Beijing" {{ $property->location == 'Beijing' ? 'selected' : '' }}>Beijing</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Property Name</label>
                            <input type="text" name="property_name" placeholder="Property Name" value="{{ $property->property_name }}" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Media -->
            <div class="dasboard-widget-box fl-wrap">
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
                    <!-- Add more image upload inputs as needed -->
                </div>
            </div>

            <!-- Listing Details -->
            <div class="dasboard-widget-box fl-wrap">
                <div class="custom-form">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Area:</label>
                                    <input type="text" name="property_size" placeholder="House Area" value="{{ $property->property_size }}" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Bedrooms:</label>
                                    <input type="text" name="rooms" placeholder="House Bedrooms" value="{{ $property->rooms }}" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Bathrooms:</label>
                                    <input type="text" name="bathrooms" placeholder="House Bathrooms" value="{{ $property->bathrooms }}" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Garage:</label>
                                    <input type="text" name="garage_size" placeholder="Number of cars" value="{{ $property->garage_size }}" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Price:</label>
                                    <input type="text" name="price" placeholder="Price" value="{{ $property->price }}" />
                                </div>
                                <div class="col-sm-6">
                                    <label>Availability:</label>
                                    <select name="availability">
                                        <option value="available" {{ $property->availability == 'available' ? 'selected' : '' }}>Available</option>
                                        <option value="not available" {{ $property->availability == 'not available' ? 'selected' : '' }}>Not Available</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Details Text</label>
                            <div class="listsearch-input-item">
                                <textarea cols="40" rows="3" style="height: 235px" placeholder="Details" name="description">{{ $property->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn color-bg float-btn">Save Changes</button>
        </form>
    </div>
</div>










@endsection