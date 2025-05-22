@extends('layouts.admin')

@section('title', 'Registered Farm Lands')

@section('breadcrumb', 'Farm Lands')


@section('content')
    <div class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header with Stats -->
            <div class="mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <h2 class="text-3xl font-bold text-gray-800 flex items-center">
                        <svg class="mr-3 h-8 w-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                        </svg>
                        Registered Farm Lands
                    </h2>
                    
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total Farmlands</p>
                                <p class="text-2xl font-bold text-gray-800">{{ count($farmLands) }}</p>
                            </div>
                            <div class="bg-green-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total Land Area</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $farmLands->sum('size') }} acres</p>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-amber-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Number of Owners</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $farmLands->groupBy('user_id')->count() }}
                                </p>
                            </div>
                            <div class="bg-amber-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search and Filter -->
            <div class="mb-6 bg-white rounded-lg shadow p-4">
                <div class="flex flex-col md:flex-row gap-4 justify-between">
                    <div class="relative flex-grow">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" id="searchInput" placeholder="Search by ID, owner name, or location..."
                            class="pl-10 w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                    </div>
                    <div class="flex gap-4">
                       
                        <select id="sizeFilter"
                            class="rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                            <option value="">All Sizes</option>
                            <option value="small">Small (< 5 acres)</option>
                            <option value="medium">Medium (5-20 acres)</option>
                            <option value="large">Large (> 20 acres)</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Farm Lands List -->
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Size (acres)
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Owner Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Contact No
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Location
                                </th>
                            </tr>
                        </thead>
                        <tbody id="farmLandsTableBody" class="bg-white divide-y divide-gray-200">
                            @forelse ($farmLands as $land)
                                <tr class="hover:bg-gray-50 farm-land-row" data-id="{{ $land->registraion_no }}"
                                    data-owner="{{ strtolower($land->fist_name . ' ' . $land->last_name) }}"
                                    data-location="{{ strtolower($land->place) }}" data-size="{{ $land->size }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $land->registraion_no }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $land->size }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 bg-green-100 rounded-full flex items-center justify-center">
                                                <span class="text-green-600 font-medium text-sm">
                                                    {{ strtoupper(substr($land->fist_name, 0, 1) . substr($land->last_name, 0, 1)) }}
                                                </span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $land->fist_name }} {{ $land->last_name }}
                                                </div>
                                                @if ($land->user_type_id == 1)
                                                    <div class="text-xs text-gray-500">Farmer</div>
                                                @else
                                                    <div class="text-xs text-gray-500">Vendor</div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $land->contact_no }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 text-gray-400 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <div class="text-sm text-gray-500">{{ $land->grama_niladhari_division }}</div>
                                        </div>
                                    </td>
                                    
                                </tr>
                            @empty
                                <tr id="noLandsRow">
                                    <td colspan="6" class="px-6 py-10 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                            </svg>
                                            <p class="mt-2 text-gray-500 text-lg font-medium">No farm lands found</p>
                                            <p class="text-gray-400">Register new farm lands to get started</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Empty Search Results Message (Hidden by default) -->
                <div id="noSearchResults" class="hidden px-6 py-10 text-center">
                    <div class="flex flex-col items-center justify-center">
                        <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <p class="mt-2 text-gray-500 text-lg font-medium">No matching farm lands found</p>
                        <p class="text-gray-400">Try different search terms or clear filters</p>
                    </div>
                </div>

                <!-- Pagination -->
                @if (isset($farmLands) && method_exists($farmLands, 'links'))
                    <div class="px-4 py-3 border-t border-gray-200 sm:px-6">
                        {{ $farmLands->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const locationFilter = document.getElementById('locationFilter');
            const sizeFilter = document.getElementById('sizeFilter');
            const farmLandRows = document.querySelectorAll('.farm-land-row');
            const noLandsRow = document.getElementById('noLandsRow');
            const noSearchResults = document.getElementById('noSearchResults');

            // Function to filter farm lands
            function filterFarmLands() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                const selectedLocation = locationFilter.value.toLowerCase();
                const selectedSize = sizeFilter.value;
                let visibleRows = 0;

                // Hide the no lands row if it exists
                if (noLandsRow) {
                    noLandsRow.style.display = 'none';
                }

                // Filter each row
                farmLandRows.forEach(row => {
                    const id = row.getAttribute('data-id');
                    const owner = row.getAttribute('data-owner');
                    const location = row.getAttribute('data-location');
                    const size = parseFloat(row.getAttribute('data-size'));

                    // Check if row matches search term
                    const matchesSearch = id.includes(searchTerm) ||
                        owner.includes(searchTerm) ||
                        location.includes(searchTerm);

                    // Check if row matches location filter
                    const matchesLocation = selectedLocation === '' || location.includes(selectedLocation);

                    // Check if row matches size filter
                    let matchesSize = true;
                    if (selectedSize === 'small') {
                        matchesSize = size < 5;
                    } else if (selectedSize === 'medium') {
                        matchesSize = size >= 5 && size <= 20;
                    } else if (selectedSize === 'large') {
                        matchesSize = size > 20;
                    }

                    // Show or hide the row
                    if (matchesSearch && matchesLocation && matchesSize) {
                        row.style.display = '';
                        visibleRows++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Show or hide the no search results message
                if (visibleRows === 0) {
                    noSearchResults.style.display = 'block';
                } else {
                    noSearchResults.style.display = 'none';
                }
            }

            // Add event listeners
            if (searchInput) {
                searchInput.addEventListener('input', filterFarmLands);
            }

            if (locationFilter) {
                locationFilter.addEventListener('change', filterFarmLands);
            }

            if (sizeFilter) {
                sizeFilter.addEventListener('change', filterFarmLands);
            }
        });
    </script>
@endsection
