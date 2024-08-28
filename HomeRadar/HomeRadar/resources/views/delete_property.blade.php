@extends('layouts.main-two')

@section('title', 'Delete Property')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Delete Property</h3>
                </div>
                <div class="card-body">
                    <p>Are you sure you want to delete the property "<strong>{{ $property->property_name }}</strong>"?</p>
                    <p>This action cannot be undone.</p>

                    <form action="{{ route('properties.destroy', $property->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="form-group">
                            <a href="{{ route('properties.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-danger">Delete Property</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
