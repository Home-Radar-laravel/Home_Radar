@extends('layouts.app-two')

@section('content')
<div class="container-fluid"> <!-- Changed to container-fluid for full-width -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Properties List</h1>
        <a href="{{ route('dashboard.add.listing') }}" class="btn btn-success" style="background-color: #28a745; border-color: #28a745;">Add New Property</a>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            Total Properties: <span class="badge bg-light text-dark">{{ $totalProperties }}</span>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover table-striped table-bordered mb-0 w-100">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Property Name</th>
                        <th>Price</th>
                        <th>Property Size</th>
                        <th>Rooms</th>
                        <th>Bathrooms</th>
                        <th>Location</th>
                        <!-- Add columns for each image -->
                        @for ($i = 1; $i <= 6; $i++)
                            <th>Image {{ $i }}</th>
                        @endfor
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($properties as $property)
                    <tr>
                        <td>{{ $property->id }}</td>
                        <td>{{ $property->property_name }}</td>
                        <td>${{ number_format($property->price, 2) }}</td>
                        <td>{{ $property->property_size }} sq ft</td>
                        <td>{{ $property->rooms }}</td>
                        <td>{{ $property->bathrooms }}</td>
                        <td>{{ $property->location }}</td>
                        <!-- Display each image in its own column -->
                        @for ($i = 1; $i <= 6; $i++)
                            @php $imageField = 'image' . $i; @endphp
                            <td class="text-center">
                                @if ($property->$imageField)
                                    <div class="rounded overflow-hidden" style="width: 60px; height: 60px; margin: 5px;">
                                        <img src="{{ Storage::url($property->$imageField) }}" alt="Image {{ $i }}" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                        @endfor
                        <td class="text-center">
                            <a href="{{ route('propertie.show', $property->id) }}" class="btn btn-sm mb-2" style="background-color: #17a2b8; border-color: #17a2b8; color: white;">View</a>
                            <a href="{{ route('propertie.edit', $property->id) }}" class="btn btn-sm mb-2 text-white" style="background-color: #ffc107; border-color: #ffc107; color: black;">Edit</a>
                            <form action="{{ route('propertie.destroy', $property->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm" style="background-color: #dc3545; border-color: #dc3545; color: white;" onclick="return confirm('Are you sure you want to delete this property?')">Delete</button>
</form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination Links -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $properties->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
