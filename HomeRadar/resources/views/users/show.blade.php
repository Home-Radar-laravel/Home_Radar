@extends('layout/side-menu')

@section('subhead')
    <title>Show User - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
    <div class="container mx-auto mt-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">User Details</h2>
            <a href="{{ route('users.index') }}" class="btn btn-primary">
                <svg class="w-4 h-4 mr-2 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back
            </a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mb-4">
                    <strong class="block text-gray-700 font-medium">Name:</strong>
                    <p class="text-gray-900 text-lg">{{ $user->name }}</p>
                </div>
                <div class="mb-4">
                    <strong class="block text-gray-700 font-medium">Email:</strong>
                    <p class="text-gray-900 text-lg">{{ $user->email }}</p>
                </div>
                <div class="mb-4">
                    <strong class="block text-gray-700 font-medium">Phone:</strong>
                    <p class="text-gray-900 text-lg">{{ $user->phone }}</p>
                </div>
                <div class="mb-4">
                    <strong class="block text-gray-700 font-medium">Role:</strong>
                    @if($user->role)
                        <span class="inline-block px-3 py-1 text-sm font-medium text-white bg-blue-500 rounded-full">{{ $user->role->role_name }}</span>
                    @else
                        <span class="inline-block px-3 py-1 text-sm font-medium text-gray-600 bg-gray-200 rounded-full">No role assigned</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
