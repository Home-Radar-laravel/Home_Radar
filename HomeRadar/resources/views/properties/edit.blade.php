@extends('layout.side-menu')

@section('subhead')
    <title>Edit Property - Your App</title>
@endsection

@section('subcontent')
<div class="intro-y box">
    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
        <h2 class="font-medium text-base mr-auto">Edit Property</h2>
    </div>
    <div id="input" class="p-5">
        <div class="preview">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mt-3">
                    <label for="property_name" class="form-label">Property Name</label>
                    <input id="property_name" name="property_name" type="text" class="form-control" value="{{ old('property_name', $property->property_name) }}" required>
                </div>

                <div class="mt-3">
                    <label for="price" class="form-label">Price</label>
                    <input id="price" name="price" type="text" class="form-control" value="{{ old('price', $property->price) }}" required>
                </div>

                <div class="mt-3">
                    <label for="property_size" class="form-label">Property Size</label>
                    <input id="property_size" name="property_size" type="text" class="form-control" value="{{ old('property_size', $property->property_size) }}" required>
                </div>

                <div class="mt-3">
                    <label for="garage_size" class="form-label">Garage Size</label>
                    <input id="garage_size" name="garage_size" type="text" class="form-control" value="{{ old('garage_size', $property->garage_size) }}">
                </div>

                <div class="mt-3">
                    <label for="rooms" class="form-label">Rooms</label>
                    <input id="rooms" name="rooms" type="number" class="form-control" value="{{ old('rooms', $property->rooms) }}" required>
                </div>

                <div class="mt-3">
                    <label for="bathrooms" class="form-label">Bathrooms</label>
                    <input id="bathrooms" name="bathrooms" type="number" class="form-control" value="{{ old('bathrooms', $property->bathrooms) }}" required>
                </div>

                <div class="mt-3">
                    <label for="availability" class="form-label">Availability</label>
                    <select id="availability" name="availability" class="form-control">
                        <option value="available" {{ old('availability', $property->availability) == 'not available' ? 'selected' : '' }}>Available</option>
                        <option value="not available" {{ old('availability', $property->availability) == 'available' ? 'selected' : '' }}>Not Available</option>
                    </select>
                </div>

                

                <div class="mt-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control" required>{{ old('description', $property->description) }}</textarea>
                </div>

                <div class="mt-3">
                    <label for="location" class="form-label">Location</label>
                    <input id="location" name="location" type="text" class="form-control" value="{{ old('location', $property->location) }}" required>
                </div>

                <!-- Image inputs -->
                @foreach(range(1, 6) as $i)
                    <div class="mt-3">
                        <label for="image{{ $i }}" class="form-label">Image {{ $i }}</label>
                        <input id="image{{ $i }}" name="image{{ $i }}" type="file" class="form-control">
                        @if ($property->{'image'.$i})
                            <img src="{{ asset('storage/' . $property->{'image'.$i}) }}" alt="Image {{ $i }}" class="img-fluid mt-2">
                        @endif
                    </div>
                @endforeach

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update Property</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
