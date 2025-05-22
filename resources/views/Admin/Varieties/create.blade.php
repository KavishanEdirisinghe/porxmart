@extends('layouts.admin')

@section('title', 'Add New Paddy Variety')

@section('content')
    <div class="py-8 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <a href="{{ route('admin_varieties') }}"
                            class="mr-4 text-gray-500 hover:text-gray-700 transition duration-150 ease-in-out">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                        </a>
                        <h2 class="text-3xl font-bold text-gray-800 flex items-center">
                            <svg class="mr-3 h-8 w-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 2c-4 0-8 3-8 8 0 3 2 6 4 8l4 4 4-4c2-2 4-5 4-8 0-5-4-8-8-8z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 8c2-1 4-1 4 2" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 8c-2-1-4-1-4 2" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12c1.5-0.5 3-0.5 3 1" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12c-1.5-0.5-3-0.5-3 1" />
                            </svg>
                            Add New Paddy Variety
                        </h2>
                    </div>
                </div>
                <p class="mt-2 text-gray-600">Create a new paddy variety with detailed information</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin_varieties_store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Variety Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                        </path>
                                    </svg>
                                    Variety Name *
                                </span>
                            </label>
                            <input type="text" name="name" id="name" required
                                class="w-full rounded-lg p-3 border border-gray-300 focus:border-green-500 focus:ring-green-500 @error('name') border-red-500 @enderror"
                                placeholder="e.g., Basmati 385, IRRI-6, etc." value="{{ old('name') }}">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    Description
                                </span>
                            </label>
                            <textarea name="description" id="description" rows="4" required
                                class="w-full rounded-lg p-3 border border-gray-300 focus:border-green-500 focus:ring-green-500 @error('description') border-red-500 @enderror"
                                placeholder="Describe the variety characteristics, features, and growing conditions...">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Row for Harvest Time and Average Yield -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                            <div>
                                <label for="harvest_time" class="block text-sm font-medium text-gray-700 mb-2">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        Harvest Time
                                    </span>
                                </label>
                                <input type="number" name="harvest_time" id="harvest_time" required
                                    class="w-full rounded-lg p-3 border border-gray-300 focus:border-green-500 focus:ring-green-500 @error('harvest_time') border-red-500 @enderror"
                                    placeholder="e.g., 100 , 180, etc." value="{{ old('harvest_time') }}">
                                @error('harvest_time')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="average_yield" class="block text-sm font-medium text-gray-700 mb-2">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        Average Yield
                                    </span>
                                </label>
                                <input type="number" name="average_yield" id="average_yield" required
                                    class="w-full rounded-lg p-3 border border-gray-300 focus:border-green-500 focus:ring-green-500 @error('average_yield') border-red-500 @enderror"
                                    placeholder="e.g., 80, 150, etc." value="{{ old('average_yield') }}">
                                @error('average_yield')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="color" class="block text-sm font-medium text-gray-700 mb-2">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                        </path>
                                    </svg>
                                    Color
                                </span>
                            </label>
                            <input type="text" name="pericarp_colour" id="pericarp_colour" required
                                class="w-full rounded-lg p-3 border border-gray-300 focus:border-green-500 focus:ring-green-500 @error('color') border-red-500 @enderror"
                                placeholder="White , Red" value="{{ old('color') }}">
                            @error('color')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button type="submit"
                                class="inline-flex items-center px-6 py-3 bg-green-600 border border-transparent rounded-md font-semibold text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition ease-in-out duration-150">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Save Variety
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
