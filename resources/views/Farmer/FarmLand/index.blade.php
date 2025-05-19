@extends('layouts.farmer_lay')

@section('title', 'Farm Land Overview')

@section('content')
    <div class="py-6 px-4 md:px-8 w-100">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-green-800">Farm Land Management</h1>
            <button id="addLandBtn"
                class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-lg flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Add New Land
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
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Size
                                (Acres)</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Province</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                District</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Divisional Secretariat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Grama Niladhari Division</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="landTableBody">
                        <!-- Sample data - this would come from your database -->
                        @foreach ($land as $land)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $land->registraion_no }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $land->size }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $land->province }} province</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $land->district }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $land->divisional_secretariat }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $land->grama_niladhari_division }}</td>
                                {{-- <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                </td> --}}
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('farm_edit_index', $land->id) }}"
                                        class="text-green-600 hover:text-green-900 mr-3 edit-btn">Edit</a>
                                    <form action="{{ route('farm_delete', $land->id) }}" method="POST"
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
                    <form id="farmLandForm" action="{{ route('farm_land_create', $user->id) }}" method="POST">
                        @csrf
                        <div id="lands-container">
                            <!-- Initial Land Section -->
                            <div class="land-section mt-5" id="land-section-1">
                                <h3 class="font-bold text-lg mb-4">Land #1</h3>
                                <div class="space-y-4 md:space-y-6">
                                    <!-- Land Registration Number -->
                                    <div class="flex flex-col space-y-2">
                                        <label for="landRegistration-1"
                                            class="font-sans font-semibold text-black text-base">
                                            Land Registration Number
                                        </label>
                                        <input id="landRegistration-1" name="lands[0][landRegistration]"
                                            class="w-full h-10  rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] px-4" />
                                    </div>

                                    <!-- Location of Paddy Field -->
                                    <div class="flex flex-col space-y-2">
                                        <label class="font-sans font-semibold text-black text-base">
                                            Location of Paddy Field
                                        </label>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                            <!-- Province -->
                                            <div>
                                                <select name="lands[0][province]" id="province"
                                                    class="province-select w-full h-10  rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] text-xs font-semibold px-4">
                                                    <option value="" disabled selected>Province</option>
                                                    @foreach ($province ?? [] as $province)
                                                        <option value="{{ $province->id }}" style="color: black;"
                                                            {{ old('province') == $province->id ? 'selected' : '' }}>
                                                            {{ $province->province }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Districts -->
                                            <div>
                                                <select name="lands[0][districts]" id="district"
                                                    class="district-select w-full h-10  rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] text-xs font-semibold px-4">
                                                    <option value="" disabled selected>Districts</option>
                                                </select>
                                            </div>

                                            <!-- Divisional Secretary -->
                                            <div>
                                                <select name="lands[0][divisionalSecretary]" id="divisional_secretariat"
                                                    class="divisional-select w-full h-10  rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] text-xs font-semibold px-4">
                                                    <option value="" disabled selected>Divisional Secretary</option>
                                                </select>
                                            </div>

                                            <!-- Grama Niladari -->
                                            <div>
                                                <select name="lands[0][gramaNiladari]" id="grama_niladhari"
                                                    class="grama-select w-full h-10  rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] text-xs font-semibold px-4">
                                                    <option value="" disabled selected>Grama Niladari</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Land Size -->
                                    <div class="flex flex-col space-y-2">
                                        <label for="landSize-1" class="font-sans font-semibold text-black text-base">
                                            Land Size (Acres)
                                        </label>
                                        <input id="landSize-1" name="lands[0][landSize]"
                                            class="w-full h-10 rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] px-4" />
                                    </div>

                                    <!-- Remove button (hidden for first section) -->
                                    <button type="button"
                                        class="remove-land-btn hidden mt-2 text-red-500 text-sm underline">
                                        Remove this land
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row justify-between gap-3 pt-6">
                            <button type="submit" id="register-btn"
                                class="bg-gray-800 hover:bg-gray-900 text-white font-medium py-2 px-4 rounded-lg flex items-center">
                                Done
                            </button>

                            <button type="button" id="add-land-btn"
                                class="bg-gray-800 hover:bg-gray-900 text-white font-medium py-2 px-4 rounded-lg flex items-center">
                                Add Land
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
        const addLandBtn = document.getElementById('addLandBtn');
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
            let landCount = 1;

            // Setup cascade select for original land section
            setupLocationSelectors('#land-section-1');

            // Function to setup location cascade selectors for a specific land section
            function setupLocationSelectors(sectionSelector) {
                const section = $(sectionSelector);

                // Province -> Districts
                section.find('.province-select').on('change', function() {
                    const provinceId = $(this).val();
                    const districtSelect = $(this).closest('.grid').find('.district-select');
                    const divisionalSelect = $(this).closest('.grid').find('.divisional-select');
                    const gramaSelect = $(this).closest('.grid').find('.grama-select');

                    districtSelect.html('<option selected>Loading...</option>');

                    $.ajax({
                        url: '/get-districts/' + provinceId,
                        type: 'GET',
                        success: function(data) {
                            districtSelect.empty().append(
                                '<option value="" disabled selected>Select District</option>'
                            );
                            divisionalSelect.html(
                                '<option value="" disabled selected>Select Divisional Secretariat</option>'
                            );
                            gramaSelect.html(
                                '<option value="" disabled selected>Select Grama Niladhari</option>'
                            );

                            $.each(data, function(key, value) {
                                districtSelect.append('<option value="' + value.id +
                                    '">' + value.district + '</option>');
                            });
                        }
                    });
                });

                // District -> Divisional Secretariats
                section.find('.district-select').on('change', function() {
                    const districtId = $(this).val();
                    const divisionalSelect = $(this).closest('.grid').find('.divisional-select');
                    const gramaSelect = $(this).closest('.grid').find('.grama-select');

                    divisionalSelect.html('<option selected>Loading...</option>');

                    $.ajax({
                        url: '/get-divisional-secretariats/' + districtId,
                        type: 'GET',
                        success: function(data) {
                            divisionalSelect.empty().append(
                                '<option value="" disabled selected>Select Divisional Secretariat</option>'
                            );
                            gramaSelect.html(
                                '<option value="" disabled selected>Select Grama Niladhari</option>'
                            );

                            $.each(data, function(key, value) {
                                divisionalSelect.append('<option value="' + value.id +
                                    '">' + value.divisional_secretariat +
                                    '</option>');
                            });
                        }
                    });
                });

                // Divisional Secretariat -> GN Divisions
                section.find('.divisional-select').on('change', function() {
                    const dsId = $(this).val();
                    const gramaSelect = $(this).closest('.grid').find('.grama-select');

                    gramaSelect.html('<option selected>Loading...</option>');

                    $.ajax({
                        url: '/get-grama-niladharis/' + dsId,
                        type: 'GET',
                        success: function(data) {
                            gramaSelect.empty().append(
                                '<option value="" disabled selected>Select Grama Niladhari</option>'
                            );

                            $.each(data, function(key, value) {
                                gramaSelect.append('<option value="' + value.id + '">' +
                                    value.grama_niladhari_division + '</option>');
                            });
                        }
                    });
                });
            }

            // Add new land section
            $('#add-land-btn').click(function() {
                landCount++;
                const newIndex = landCount - 1;

                // Create new land section by cloning the first one
                const newSection = $('#land-section-1').clone();

                // Update IDs and names
                newSection.attr('id', 'land-section-' + landCount);
                newSection.find('h3').text('Land #' + landCount);

                // Update form field IDs and names
                newSection.find('input, select').each(function() {
                    const oldName = $(this).attr('name');
                    const newName = oldName.replace('lands[0]', 'lands[' + newIndex + ']');
                    $(this).attr('name', newName);

                    if ($(this).attr('id')) {
                        const oldId = $(this).attr('id');
                        const newId = oldId.replace('-1', '-' + landCount);
                        $(this).attr('id', newId);
                    }

                    // Clear values
                    $(this).val('');
                });

                // Show remove button
                newSection.find('.remove-land-btn').removeClass('hidden');

                // Add to container
                $('#lands-container').append(newSection);

                // Setup location cascade selectors for the new section
                setupLocationSelectors('#land-section-' + landCount);

                // Scroll to the new section
                $('html, body').animate({
                    scrollTop: newSection.offset().top - 100
                }, 500);
            });

            // Remove land section
            $(document).on('click', '.remove-land-btn', function() {
                $(this).closest('.land-section').remove();

                // Renumber remaining sections
                $('.land-section').each(function(index) {
                    $(this).find('h3').text('Land #' + (index + 1));
                });

                landCount = $('.land-section').length;
            });

            // Form submission
            $('#farmLandForm').submit(function() {
                // Remove the default e.preventDefault() to allow normal form submission
                // The controller will handle the array of land data
                console.log('Form submitted with data:', $(this).serialize());
            });
        });
    </script>
@endsection
