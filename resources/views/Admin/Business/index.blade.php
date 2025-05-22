@extends('layouts.admin')

@section('title', 'Registered Businesses')

@section('breadcrumb', 'Registered Businesses')


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
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                        Registered Businesses
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total Businesses</p>
                                <p class="text-2xl font-bold text-gray-800">{{ count($businesses) }}</p>
                            </div>
                            <div class="bg-green-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Active Businesses</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $businesses->where('status', 'active')->count() }}</p>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-amber-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Business Owners</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $businesses->groupBy('user_id')->count() }}</p>
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
                        <input type="text" id="searchInput" placeholder="Search by registration number, business name, or owner..."
                            class="pl-10 w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                    </div>
                    <div class="flex gap-4">
                        <select id="typeFilter"
                            class="rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                            <option value="">All Types</option>
                            @foreach ($businesses_types as $businesses_type)
                                <option value="{{ strtolower($businesses_type->type) }}">{{ $businesses_type->type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Businesses List -->
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Registration No
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Business Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Owner
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Contact
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Type
                                </th>
                            </tr>
                        </thead>
                        <tbody id="businessesTableBody" class="bg-white divide-y divide-gray-200">
                            @forelse ($businesses as $business)
                                <tr class="hover:bg-gray-50 business-row" 
                                    data-id="{{ $business->registration_no }}"
                                    data-name="{{ strtolower($business->name) }}"
                                    data-owner="{{ strtolower($business->fist_name . ' ' . $business->last_name) }}"
                                    data-type="{{ strtolower($business->type) }}"
                                    data-status="{{ strtolower($business->status ?? 'active') }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $business->registration_no }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $business->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 bg-green-100 rounded-full flex items-center justify-center">
                                                <span class="text-green-600 font-medium text-sm">
                                                    {{ strtoupper(substr($business->fist_name, 0, 1) . substr($business->last_name, 0, 1)) }}
                                                </span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $business->fist_name }} {{ $business->last_name }}
                                                </div>
                                                @if ($business->user_type_id == 1)
                                                    <div class="text-xs text-gray-500">Farmer</div>
                                                @else
                                                    <div class="text-xs text-gray-500">Vendor</div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $business->contact_no }}</div>
                                        @if($business->email)
                                            <div class="text-xs text-gray-500">{{ $business->email }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium capitalize
                                            {{ $business->type == 'retail' ? 'bg-blue-100 text-blue-800' : '' }}
                                            {{ $business->type == 'wholesale' ? 'bg-purple-100 text-purple-800' : '' }}
                                            {{ $business->type == 'manufacturing' ? 'bg-red-100 text-red-800' : '' }}
                                            {{ $business->type == 'service' ? 'bg-green-100 text-green-800' : '' }}
                                            {{ $business->type == 'agriculture' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                            {{ !in_array($business->type, ['retail', 'wholesale', 'manufacturing', 'service', 'agriculture']) ? 'bg-gray-100 text-gray-800' : '' }}">
                                            {{ $business->type }}
                                        </span>
                                    </td>
                                   
                                </tr>
                            @empty
                                <tr id="noBusinessesRow">
                                    <td colspan="6" class="px-6 py-10 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                            <p class="mt-2 text-gray-500 text-lg font-medium">No businesses found</p>
                                            <p class="text-gray-400">Register new businesses to get started</p>
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
                        <p class="mt-2 text-gray-500 text-lg font-medium">No matching businesses found</p>
                        <p class="text-gray-400">Try different search terms or clear filters</p>
                    </div>
                </div>

                <!-- Pagination -->
                @if (isset($businesses) && method_exists($businesses, 'links'))
                    <div class="px-4 py-3 border-t border-gray-200 sm:px-6">
                        {{ $businesses->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const typeFilter = document.getElementById('typeFilter');
            const businessRows = document.querySelectorAll('.business-row');
            const noBusinessesRow = document.getElementById('noBusinessesRow');
            const noSearchResults = document.getElementById('noSearchResults');

            // Function to filter businesses
            function filterBusinesses() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                const selectedType = typeFilter.value.toLowerCase();
                let visibleRows = 0;

                // Hide the no businesses row if it exists
                if (noBusinessesRow) {
                    noBusinessesRow.style.display = 'none';
                }

                // Filter each row
                businessRows.forEach(row => {
                    const id = row.getAttribute('data-id').toLowerCase();
                    const name = row.getAttribute('data-name');
                    const owner = row.getAttribute('data-owner');
                    const type = row.getAttribute('data-type');

                    // Check if row matches search term
                    const matchesSearch = id.includes(searchTerm) ||
                        name.includes(searchTerm) ||
                        owner.includes(searchTerm);

                    // Check if row matches type filter
                    const matchesType = selectedType === '' || type === selectedType;

                    // Show or hide the row
                    if (matchesSearch && matchesType) {
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
                searchInput.addEventListener('input', filterBusinesses);
            }

            if (typeFilter) {
                typeFilter.addEventListener('change', filterBusinesses);
            }
        });
    </script>
@endsection