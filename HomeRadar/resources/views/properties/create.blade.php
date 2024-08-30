@extends('layout/side-menu')

@section('subhead')
    <title>Create New User - Your App</title>
@endsection

@section('subcontent')
<div class="intro-y box">
    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
        <h2 class="font-medium text-base mr-auto">Add Property</h2>
    </div>
    <div id="input" class="p-5">
        <div class="preview">
            <form method="POST" action="{{ route('admin_properties.store') }}" enctype="multipart/form-data" class="dropzone" id="property-dropzone">
                @csrf
                <div>
                    <label for="property_name" class="form-label">Property Name</label>
                    <input id="property_name" name="property_name" type="text" class="form-control" placeholder="Property Name">
                </div>
                <div class="mt-3">
                    <label for="price" class="form-label">Price</label>
                    <input id="price" name="price" type="text" class="form-control" placeholder="Price">
                </div>
                <div class="mt-3">
                    <label for="property_size" class="form-label">Property Size</label>
                    <input id="property_size" name="property_size" type="text" class="form-control" placeholder="Property Size">
                </div>
                <div class="mt-3">
                    <label for="rooms" class="form-label">Rooms</label>
                    <input id="rooms" name="rooms" type="number" class="form-control" placeholder="Rooms">
                </div>
                <div class="mt-3">
                    <label for="bathrooms" class="form-label">Bathrooms</label>
                    <input id="bathrooms" name="bathrooms" type="number" class="form-control" placeholder="Bathrooms">
                </div>
                <div class="mt-3">
                    <label for="garage_size" class="form-label">Garage Size</label>
                    <input id="garage_size" name="garage_size" type="text" class="form-control" placeholder="Garage Size">
                </div>
                <div class="mt-3">
                    <label for="location" class="form-label">Location</label>
                    <input id="location" name="location" type="text" class="form-control" placeholder="Location">
                </div>
                <div class="mt-3">
                    <label for="availability" class="form-label">Availability</label>
                    <select id="availability" name="availability" class="form-control">
                        <option value="available">Available</option>
                        <option value="not available">Not Available</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control" placeholder="Description"></textarea>
                </div>

                  <!-- Image inputs -->
                    @foreach(range(1, 6) as $i)
                    <div class="mt-3">
                        <label for="image{{ $i }}" class="form-label">Image {{ $i }}</label>
                        <input id="image{{ $i }}" name="image{{ $i }}" type="file" class="form-control">
                    </div>
                    @endforeach



                

                <div class="mt-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection