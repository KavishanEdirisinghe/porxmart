@extends('layouts.vendor_lay')

@section('title', 'Farm Land Overview')

@section('content')
    <div class="py-6 px-4 md:px-8 w-100">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-green-800">Business Management</h1>
            <button id="addBusinessBtn"
                class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Add New Business
            </button>
        </div>


        <!-- Data Table Section -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table id="landTable" class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Business
                                Registraion No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Business Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Type</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="landTableBody">
                        <!-- Sample data - this would come from your database -->
                        @foreach ($business as $business)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $business->registration_no }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $business->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $business->type }}</td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('business_edit_index', $business->id) }}"
                                        class="text-green-600 hover:text-green-900 mr-3 edit-btn">Edit</a>

                                    <form action="{{ route('business_delete', $business->id) }}" method="POST"
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
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="modalTitle">Add New Land</h3>
                    <form id="businessForm" action="{{ route('business_create', $user->id) }}" method="POST">
                        @csrf
                        <div id="businesses-container">
                            <!-- Initial Business Section -->
                            <div class="business-section mt-5" id="business-section-1">
                                <h3 class="font-bold text-lg mb-4">Business #1</h3>
                                <div class="space-y-4 md:space-y-6">
                                    <!-- Business Name -->
                                    <div class="flex flex-col space-y-2">
                                        <label for="businessName-1" class="font-sans font-semibold text-black text-base">
                                            Business Name
                                        </label>
                                        <input id="businessName-1" name="businesses[0][business_name]"
                                            class="w-full h-10  rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] px-4" />
                                    </div>

                                    <!-- Business Registration Number -->
                                    <div class="flex flex-col space-y-2">
                                        <label for="businessRegistration-1"
                                            class="font-sans font-semibold text-black text-base">
                                            Business Registration Number
                                        </label>
                                        <input id="businessRegistration-1"
                                            name="businesses[0][business_registration_number]"
                                            class="w-full h-10  rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] px-4" />
                                    </div>

                                    <!-- Business Type -->
                                    <div class="flex flex-col space-y-2">
                                        <label for="businessType-1" class="font-sans font-semibold text-black text-base">
                                            Business Type
                                        </label>
                                        <select id="businessType-1" name="businesses[0][business_type]"
                                            class="w-full h-10  rounded-[20px] border border-solid border-black shadow-[0px_4px_4px_#00000040] text-xs font-semibold px-4">
                                            <option value="" disabled selected>Select Business Type</option>
                                            @foreach ($business_types as $business_type)
                                                <option value="{{ $business_type->id }}">{{ $business_type->type }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Remove button (hidden for first section) -->
                                    <button type="button"
                                        class="remove-business-btn hidden mt-2 text-red-500 text-sm underline">
                                        Remove this business
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row justify-between gap-3 pt-6">
                            <button type="submit" id="register-btn"
                                class="bg-gray-800 hover:bg-gray-900 text-white font-medium py-2 px-4 rounded-lg flex items-center">
                                Register
                            </button>

                            <button type="button" id="add-business-btn"
                                class="bg-gray-800 hover:bg-gray-900 text-white font-medium py-2 px-4 rounded-lg flex items-center">
                                Add Business
                            </button>

                            <button type="button" id="cancelBtn"
                                class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-lg flex items-center">
                                Cancel</button>

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
                        <p class="text-sm text-gray-500">Are you sure you want to delete this land? This action cannot be
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
        const addLandBtn = document.getElementById('addBusinessBtn');
        const landModal = document.getElementById('landModal');
        const viewModal = document.getElementById('viewModal');
        const deleteModal = document.getElementById('deleteModal');
        const cancelBtn = document.getElementById('cancelBtn');

        addLandBtn.addEventListener('click', () => openAddModal());
        cancelBtn.addEventListener('click', () => closeModal(landModal));

        function openAddModal() {
            modalTitle.textContent = 'Add New Land';
            landModal.classList.remove('hidden');
        }

        function closeModal(modal) {
            modal.classList.add('hidden');
        }
    </script>

    <script>
        $(document).ready(function() {
            let businessCount = 1;

            // Add new business section
            $('#add-business-btn').click(function() {
                businessCount++;
                const newIndex = businessCount - 1;

                // Create new business section by cloning the first one
                const newSection = $('#business-section-1').clone();

                // Update IDs and names
                newSection.attr('id', 'business-section-' + businessCount);
                newSection.find('h3').text('Business #' + businessCount);

                // Update form field IDs and names
                newSection.find('input, select').each(function() {
                    const oldName = $(this).attr('name');
                    const newName = oldName.replace('businesses[0]', 'businesses[' + newIndex +
                        ']');
                    $(this).attr('name', newName);

                    if ($(this).attr('id')) {
                        const oldId = $(this).attr('id');
                        const newId = oldId.replace('-1', '-' + businessCount);
                        $(this).attr('id', newId);
                    }

                    // Clear values
                    $(this).val('');
                });

                // Show remove button
                newSection.find('.remove-business-btn').removeClass('hidden');

                // Add to container
                $('#businesses-container').append(newSection);

                // Scroll to the new section
                $('html, body').animate({
                    scrollTop: newSection.offset().top - 100
                }, 500);
            });

            // Remove business section
            $(document).on('click', '.remove-business-btn', function() {
                $(this).closest('.business-section').remove();

                // Renumber remaining sections
                $('.business-section').each(function(index) {
                    $(this).find('h3').text('Business #' + (index + 1));
                });

                businessCount = $('.business-section').length;
            });

            // Form submission
            $('#businessForm').submit(function() {
                // The controller will handle the array of business data
                console.log('Form submitted with data:', $(this).serialize());
            });
        });
    </script>
@endsection
