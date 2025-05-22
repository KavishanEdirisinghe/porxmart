@extends('layouts.admin')

@section('title', 'Users Overview')

@section('breadcrumb', 'Users')


@section('content')
    <div class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Header with Stats -->
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">
                    Users Overview
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Total Users</p>
                                <p class="text-2xl font-bold text-gray-800">{{ count($users) }}</p>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Farmers</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $users->where('user_type_id', 1)->count() }}
                                </p>
                            </div>
                            <div class="bg-green-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-purple-500">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Vendors</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $users->where('user_type_id', 2)->count() }}
                                </p>
                            </div>
                            <div class="bg-purple-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
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
                        <input type="text" id="searchInput" placeholder="Search by name or email..."
                            class="pl-10 w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div class="flex gap-4">
                        <select id="typeFilter"
                            class="rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                            <option value="">All Types</option>
                            <option value="1">Farmers</option>
                            <option value="2">Vendors</option>
                        </select>
                        <select id="sortOrder" class="rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                            <option value="newest">Newest First</option>
                            <option value="oldest">Oldest First</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Users List -->
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
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Role
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Joined
                                </th>
                            </tr>
                        </thead>
                        <tbody id="usersTableBody" class="bg-white divide-y divide-gray-200">
                            @forelse ($users as $user)
                                <tr class="hover:bg-gray-50 user-row"
                                    data-name="{{ strtolower($user->fist_name . ' ' . $user->last_name) }}"
                                    data-email="{{ strtolower($user->email) }}" data-type="{{ $user->user_type_id }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">#{{ $user->id }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                                                <span class="text-blue-600 font-medium text-sm">
                                                    {{ strtoupper(substr($user->fist_name, 0, 1) . substr($user->last_name, 0, 1)) }}
                                                </span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $user->fist_name }} {{ $user->last_name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($user->user_type_id == 1)
                                            <span
                                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Farmer
                                            </span>
                                        @elseif ($user->user_type_id == 2)
                                            <span
                                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                                Vendor
                                            </span>
                                        @else
                                            <span
                                                class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                Admin
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-500">{{ $user->created_at->format('M d, Y') }}</div>
                                    </td>
                                   
                                </tr>
                            @empty
                                <tr id="noUsersRow">
                                    <td colspan="6" class="px-6 py-10 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                                </path>
                                            </svg>
                                            <p class="mt-2 text-gray-500 text-lg font-medium">No users found</p>
                                            <p class="text-gray-400">Try adjusting your search or filter to find what
                                                you're looking for.</p>
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
                        <p class="mt-2 text-gray-500 text-lg font-medium">No matching users found</p>
                        <p class="text-gray-400">Try different search terms or clear filters</p>
                    </div>
                </div>

                <!-- Pagination -->
                @if (isset($users) && method_exists($users, 'links'))
                    <div class="px-4 py-3 border-t border-gray-200 sm:px-6">
                        {{ $users->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const typeFilter = document.getElementById('typeFilter');
            const sortOrder = document.getElementById('sortOrder');
            const userRows = document.querySelectorAll('.user-row');
            const noUsersRow = document.getElementById('noUsersRow');
            const noSearchResults = document.getElementById('noSearchResults');
            const usersTableBody = document.getElementById('usersTableBody');

            // Function to filter users
            function filterUsers() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                const selectedType = typeFilter.value;
                let visibleRows = 0;

                // Hide the no users row if it exists
                if (noUsersRow) {
                    noUsersRow.style.display = 'none';
                }

                // Filter each row
                userRows.forEach(row => {
                    const name = row.getAttribute('data-name');
                    const email = row.getAttribute('data-email');
                    const type = row.getAttribute('data-type');

                    // Check if row matches search term and type filter
                    const matchesSearch = name.includes(searchTerm) || email.includes(searchTerm);
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

            // Function to sort users
            function sortUsers() {
                const sort = sortOrder.value;
                const rows = Array.from(userRows);

                rows.sort((a, b) => {
                    const aDate = new Date(a.querySelector('td:nth-child(5) div').textContent);
                    const bDate = new Date(b.querySelector('td:nth-child(5) div').textContent);

                    if (sort === 'newest') {
                        return bDate - aDate;
                    } else {
                        return aDate - bDate;
                    }
                });

                // Remove all rows
                rows.forEach(row => row.remove());

                // Append rows in the new order
                rows.forEach(row => {
                    usersTableBody.appendChild(row);
                });
            }

            // Add event listeners
            if (searchInput) {
                searchInput.addEventListener('input', filterUsers);
            }

            if (typeFilter) {
                typeFilter.addEventListener('change', filterUsers);
            }

            if (sortOrder) {
                sortOrder.addEventListener('change', function() {
                    sortUsers();
                    filterUsers(); // Apply filters after sorting
                });
            }
        });
    </script>
@endsection
