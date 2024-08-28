@extends('layout.side-menu')

@section('subhead')
    <title>Property Details - Your App</title>
@endsection

@section('subcontent')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Property Details</h1>
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-1/2 px-4 mb-4">
                    <h2 class="text-xl font-semibold mb-2">Basic Information</h2>
                    <p><strong>Name:</strong> {{ $property->property_name }}</p>
                    <p><strong>Location:</strong> {{ $property->location }}</p>
                    <p><strong>Price:</strong> ${{ number_format($property->price, 2) }}</p>
                    <p><strong>Size:</strong> {{ $property->property_size }} sq ft</p>
                    <p><strong>Garage Size:</strong> {{ $property->garage_size }} sq ft</p>
                    <p><strong>Rooms:</strong> {{ $property->rooms }}</p>
                    <p><strong>Bathrooms:</strong> {{ $property->bathrooms }}</p>
                    <p><strong>Availability:</strong> {{ $property->availability == 1 ? 'Available' : 'Not Available' }}</p>
                    <p><strong>Description:</strong> {{ $property->description }}</p>
                </div>
                <div class="w-full md:w-1/2 px-4 mb-4">
                   
                </div>
            </div>
            <div class="mt-6">
                
            </div>
        </div>
    </div>
@endsection
