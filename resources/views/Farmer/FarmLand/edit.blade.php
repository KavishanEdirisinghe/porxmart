@extends('layouts.farmer_lay')

@section('title', 'Farm Land Edit')

@section('content')
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-sm rounded-lg bg-white">
        <form id="farmLandForm" action="{{ route('farm_edit', $land->id) }}" method="POST">
            @csrf
            <div id="lands-container">
                <!-- Initial Land Section -->
                <div class="land-section mt-5" id="land-section-1">
                    <div class="space-y-4 md:space-y-6">
                        <!-- Land Registration Number -->
                        <div class="flex flex-col space-y-2">
                            <label for="landRegistration-1" class="font-sans font-semibold text-black text-base">
                                Land Registration Number
                            </label>
                            <input id="landRegistration-1" name="landRegistration" value="{{ $land->registraion_no }}"
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
                                    <select name="province" id="province"
                                        class="province-select w-full h-10  rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] text-xs font-semibold px-4">
                                        <option value="" disabled selected>Province</option>
                                        @foreach ($province ?? [] as $province)
                                            @if ($province->province == $land->province)
                                                <option value="{{ $province->id }}" style="color: black;" selected>
                                                    {{ $province->province }}
                                                </option>
                                            @endif
                                            <option value="{{ $province->id }}" style="color: black;"
                                                {{ old('province') == $province->id ? 'selected' : '' }}>
                                                {{ $province->province }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Districts -->
                                <div>
                                    <select name="districts" id="district"
                                        class="district-select w-full h-10  rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] text-xs font-semibold px-4">
                                        <option value="{{ $land->district_id }}" selected>{{ $land->district }}</option>
                                    </select>
                                </div>

                                <!-- Divisional Secretary -->
                                <div>
                                    <select name="divisionalSecretary" id="divisional_secretariat"
                                        class="divisional-select w-full h-10  rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] text-xs font-semibold px-4">
                                        <option value="{{ $land->divisional_secretariat_id }}" selected>{{ $land->divisional_secretariat }}</option>
                                    </select>
                                </div>

                                <!-- Grama Niladari -->
                                <div>
                                    <select name="gramaNiladari" id="grama_niladhari"
                                        class="grama-select w-full h-10  rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] text-xs font-semibold px-4">
                                        <option value="{{ $land->grama_niladhari_division_id }}" selected>{{ $land->grama_niladhari_division }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Land Size -->
                        <div class="flex flex-col space-y-2">
                            <label for="landSize-1" class="font-sans font-semibold text-black text-base">
                                Land Size
                            </label>
                            <input id="landSize-1" name="landSize" value="{{ $land->size }}"
                                class="w-full h-10 rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] px-4" />
                        </div>

                        <!-- Remove button (hidden for first section) -->
                        <button type="button" class="remove-land-btn hidden mt-2 text-red-500 text-sm underline">
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

                <a href="{{ route('farm_land') }}"
                    class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg flex items-center">
                    Cancel</a>
            </div>
        </form>
    </div>

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
