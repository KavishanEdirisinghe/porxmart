@extends('layouts.admin')

@section('title', 'Paddy Varieties Management')
@section('breadcrumb', 'Paddy Varieties')

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
                                d="M12 2c-4 0-8 3-8 8 0 3 2 6 4 8l4 4 4-4c2-2 4-5 4-8 0-5-4-8-8-8z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 8c2-1 4-1 4 2" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8c-2-1-4-1-4 2" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12c1.5-0.5 3-0.5 3 1" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12c-1.5-0.5-3-0.5-3 1" />
                        </svg>
                        Paddy Varieties Management
                    </h2>
                    <div class="mt-4 md:mt-0">
                        <a href="{{ route('admin_varieties_create') }}"
                            class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add New Variety
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total Varieties</p>
                                <p class="text-2xl font-bold text-gray-800">{{ count($varieties) }}</p>
                            </div>
                            <div class="bg-green-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 2c-4 0-8 3-8 8 0 3 2 6 4 8l4 4 4-4c2-2 4-5 4-8 0-5-4-8-8-8z" />
                                </svg>
                            </div>
                        </div>
                    </div>


                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-amber-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Avg Harvest Time</p>
                                <p class="text-2xl font-bold text-gray-800">{{ round($varieties->avg('harvest_time')) }}
                                    days</p>
                            </div>
                            <div class="bg-amber-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-purple-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Avg Yield</p>
                                <p class="text-2xl font-bold text-gray-800">{{ round($varieties->avg('average_yield'), 1) }}
                                    kg</p>
                            </div>
                            <div class="bg-purple-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
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
                        <input type="text" id="searchInput" placeholder="Search by variety name or description..."
                            class="pl-10 w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                    </div>
                    <div class="flex gap-4">
                        <select id="colorFilter"
                            class="rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500">
                            <option value="">All Colors</option>
                            <option value="white">White</option>
                            <option value="red">Red</option>
                            <option value="brown">Brown</option>
                            <option value="black">Black</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Varieties List -->
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Variety Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Description
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Harvest Time
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Average Yield
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Pericarp Colour
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody id="varietiesTableBody" class="bg-white divide-y divide-gray-200">
                            @forelse ($varieties as $variety)
                                <tr class="hover:bg-gray-50 variety-row" data-name="{{ strtolower($variety->name) }}"
                                    data-description="{{ strtolower($variety->description) }}"
                                    data-status="{{ strtolower($variety->status) }}"
                                    data-color="{{ strtolower($variety->pericarp_colour) }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 bg-green-100 rounded-full flex items-center justify-center">
                                                <svg class="w-5 h-5 text-green-600" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 2c-4 0-8 3-8 8 0 3 2 6 4 8l4 4 4-4c2-2 4-5 4-8 0-5-4-8-8-8z" />
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $variety->name }}</div>
                                                <div class="text-xs text-gray-500">ID: {{ $variety->id }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">{{ Str::limit($variety->description, 50) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $variety->harvest_time }} days</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $variety->average_yield }} kg</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium capitalize
                                            {{ $variety->pericarp_colour == 'White' ? 'bg-gray-100 text-gray-800' : '' }}
                                            {{ $variety->pericarp_colour == 'Red' ? 'bg-red-100 text-red-800' : '' }}
                                            {{ $variety->pericarp_colour == 'Brown' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                            {{ $variety->pericarp_colour == 'Black' ? 'bg-gray-900 text-white' : '' }}
                                             ">
                                            {{ $variety->pericarp_colour }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-3">
                                            <a href="{{ route('admin_varieties_edit', $variety->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <form action="{{ route('admin_varieties_delete', $variety->id) }}" method="POST" class="inline-block"
                                                onsubmit="return confirm('Are you sure you want to delete this variety?')">
                                                @csrf
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr id="noVarietiesRow">
                                    <td colspan="7" class="px-6 py-10 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 2c-4 0-8 3-8 8 0 3 2 6 4 8l4 4 4-4c2-2 4-5 4-8 0-5-4-8-8-8z" />
                                            </svg>
                                            <p class="mt-2 text-gray-500 text-lg font-medium">No varieties found</p>
                                            <p class="text-gray-400">Add new paddy varieties to get started</p>
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
                        <p class="mt-2 text-gray-500 text-lg font-medium">No matching varieties found</p>
                        <p class="text-gray-400">Try different search terms or clear filters</p>
                    </div>
                </div>

                <!-- Pagination -->
                @if (isset($varieties) && method_exists($varieties, 'links'))
                    <div class="px-4 py-3 border-t border-gray-200 sm:px-6">
                        {{ $varieties->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const statusFilter = document.getElementById('statusFilter');
            const colorFilter = document.getElementById('colorFilter');
            const varietyRows = document.querySelectorAll('.variety-row');
            const noVarietiesRow = document.getElementById('noVarietiesRow');
            const noSearchResults = document.getElementById('noSearchResults');

            // Function to filter varieties
            function filterVarieties() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                const selectedStatus = statusFilter.value.toLowerCase();
                const selectedColor = colorFilter.value.toLowerCase();
                let visibleRows = 0;

                // Hide the no varieties row if it exists
                if (noVarietiesRow) {
                    noVarietiesRow.style.display = 'none';
                }

                // Filter each row
                varietyRows.forEach(row => {
                    const name = row.getAttribute('data-name');
                    const description = row.getAttribute('data-description');
                    const status = row.getAttribute('data-status');
                    const color = row.getAttribute('data-color');

                    // Check if row matches search term
                    const matchesSearch = name.includes(searchTerm) ||
                        description.includes(searchTerm);

                    // Check if row matches status filter
                    const matchesStatus = selectedStatus === '' || status === selectedStatus;

                    // Check if row matches color filter
                    const matchesColor = selectedColor === '' || color === selectedColor;

                    // Show or hide the row
                    if (matchesSearch && matchesStatus && matchesColor) {
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
                searchInput.addEventListener('input', filterVarieties);
            }

            if (statusFilter) {
                statusFilter.addEventListener('change', filterVarieties);
            }

            if (colorFilter) {
                colorFilter.addEventListener('change', filterVarieties);
            }
        });
    </script>
@endsection
