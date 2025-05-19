@extends('layouts.farmer_lay')

@section('title', 'Farm Land Overview')

@section('content')
    <div class="py-6 px-4 md:px-8 w-100">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-green-800">Paddy Product Management</h1>
            <button id="addLandBtn"
                class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Add New Product
            </button>
        </div>


        <!-- Data Table Section -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table id="landTable" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Land
                                Registraion No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Varient</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Swan Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Expected Yield</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="landTableBody">
                        <!-- Sample data - this would come from your database -->
                        @foreach ($products as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->registraion_no }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->sawn_date }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $product->expected_yeild }} MT</td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('paddy_product_edit_index', $product->id) }}"
                                        class="text-green-600 hover:text-green-900 mr-3 edit-btn">Edit</a>
                                    <form action="{{ route('paddy_product_delete', $product->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        <button type="submit" class="text-red-600 hover:text-red-900 delete-btn"
                                            onclick="return confirm('Are you sure you want to delete this item?');">
                                            Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                <div class="flex items-center justify-between">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Previous</a>
                        <a href="#"
                            class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Next</a>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span
                                    class="font-medium">4</span> results
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <a href="#"
                                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href="#" aria-current="page"
                                    class="z-10 bg-green-50 border-green-500 text-green-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</a>
                                <a href="#"
                                    class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Next</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add/Edit Land Modal -->
        <div id="landModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
            <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
                <div class="mt-3">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="modalTitle">Add New Product</h3>

                    <form id="farmLandForm" action="{{ route('paddy_product_reate', $user->id) }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Land Selector -->
                            <div class="col-span-1">
                                <label for="land_id" class="block text-sm font-medium text-gray-700 mb-1">Land</label>
                                <div class="relative">
                                    <select id="land_id" name="land_id" required
                                        class="block w-full rounded-lg border border-gray-300 bg-white py-3 px-4 pr-10 text-gray-700 focus:border-blue-500 focus:outline-none focus:ring-blue-500">
                                        <option value="" selected disabled>Select Land</option>
                                        @foreach ($lands as $land)
                                            <option value="{{ $land->id }}">{{ $land->registraion_no }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <!-- Varieties Selector -->
                            <div class="col-span-1">
                                <label for="variety_id" class="block text-sm font-medium text-gray-700 mb-1">Paddy
                                    Variety</label>
                                <div class="relative">
                                    <select id="variety_id" name="variety_id" required
                                        class="block w-full rounded-lg border border-gray-300 bg-white py-3 px-4 pr-10 text-gray-700 focus:border-blue-500 focus:outline-none focus:ring-blue-500">
                                        <option value="" selected disabled>Select Variety</option>
                                        @foreach ($paddyVarieties as $paddyVariety)
                                            <option value="{{ $paddyVariety->id }}">{{ $paddyVariety->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <!-- Paddy Sown Date -->
                            <div class="col-span-1">
                                <label for="sown_date" class="block text-sm font-medium text-gray-700 mb-1">Paddy Sown
                                    Date</label>
                                <div class="relative">
                                    <input type="date" id="sown_date" name="sown_date" required
                                        class="block w-full rounded-lg border border-gray-300 bg-white py-3 px-4 text-gray-700 focus:border-blue-500 focus:outline-none focus:ring-blue-500"
                                        placeholder="Select date">

                                </div>
                            </div>

                            <!-- Expected Yield -->
                            <div class="col-span-1">
                                <label for="expected_yield" class="block text-sm font-medium text-gray-700 mb-1">Expected
                                    Yield</label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <input type="number" step="0.01" id="expected_yield_display"
                                        name="expected_yield_display" required
                                        class="block w-full rounded-lg border border-gray-300 bg-white py-3 px-4 text-gray-700 focus:border-blue-500 focus:outline-none focus:ring-blue-500"
                                        placeholder="0.00">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-24">
                                        <select id="unit_selector"
                                            class="border-none bg-transparent text-gray-700 focus:ring-0">
                                            <option value="kg">kg</option>
                                            <option value="mt">mt</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Hidden field to submit converted value in mt -->
                                <input type="hidden" name="expected_yield" id="expected_yield_converted">
                            </div>

                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8">
                            <button type="button" id="cancelBtn"
                                class="btn-danger px-6 py-2.5 bg-white border border-red-500 text-red-500 rounded-lg font-medium hover:bg-red-50 transition duration-300">
                                Cancel
                            </button>

                            <button type="submit" id="register-btn"
                                class="btn-primary px-6 py-2.5 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition duration-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                Add Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
            <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3 text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mt-2">Delete Land</h3>
                    <div class="mt-2 px-7 py-3">
                        <p class="text-sm text-gray-500">Are you sure you want to delete this land? This action
                            cannot be
                            undone.</p>
                        <input type="hidden" id="deleteId" value="">
                    </div>
                    <div class="flex justify-center mt-3">
                        <button id="cancelDeleteBtn"
                            class="bg-white mr-2 border border-gray-300 rounded-md shadow-sm py-2 px-4 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                        <button id="confirmDeleteBtn"
                            class="bg-red-600 border border-transparent rounded-md shadow-sm py-2 px-4 text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const landModal = document.getElementById('landModal');
        const viewModal = document.getElementById('viewModal');
        const deleteModal = document.getElementById('deleteModal');
        const cancelBtn = document.getElementById('cancelBtn');

        addLandBtn.addEventListener('click', () => openAddModal());
        cancelBtn.addEventListener('click', () => closeModal(landModal));

        function openAddModal() {
            landModal.classList.remove('hidden');
        }

        function closeModal(modal) {
            modal.classList.add('hidden');
        }
    </script>

    <script>
        document.querySelector('#farmLandForm').addEventListener('submit', function(e) {
            const displayValue = parseFloat(document.getElementById('expected_yield_display').value);
            const unit = document.getElementById('unit_selector').value;
            const convertedField = document.getElementById('expected_yield_converted');

            if (isNaN(displayValue)) {
                alert("Please enter a valid number for expected yield.");
                e.preventDefault();
                return;
            }

            // Convert: 1 kg = 0.001 mt
            const converted = unit === 'kg' ? displayValue / 1000 : displayValue;
            convertedField.value = converted;
        });
    </script>
@endsection
