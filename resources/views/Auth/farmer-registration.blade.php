@extends('Layouts.auth')

@section('content')
    <div class="min-h-screen w-full relative">
        {{-- Background Image with Better Handling --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('asset/images/farmer.jpg') }}" alt="Farmer Background"
                class="w-full h-full object-cover object-center" />
            <div class="absolute inset-0 bg-white opacity-20"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10 py-12">
            {{-- Title --}}
            <h1 class="text-5xl md:text-7xl font-semibold text-black text-center tracking-wide mb-8 md:mb-12">
                FARMER
            </h1>

            {{-- Description --}}
            <div class="max-w-4xl mx-auto mb-10">
                <p class="font-semibold text-black text-base md:text-lg text-justify leading-relaxed">
                    A farmer is an agricultural producer cultivating rice for sale. Each
                    farmer's land is identified by a Land Registration Number,
                    confirming ownership or lease rights. The Location of Paddy Field
                    (district) helps categorize regional production. Farmers specify the
                    Cultivating Rice Variety, ensuring buyers understand the types
                    available. They also declare their Rice Selling Capacity, defining the
                    quantity they can supply. This information enhances market
                    transparency, helping vendors find reliable suppliers while supporting
                    efficient rice trade and demand forecasting.
                </p>
            </div>

            {{-- Registration Form Card --}}

            <div class="container mx-auto px-4 py-8">
                <div
                    class="max-w-lg mx-auto bg-[#fff8f88a] backdrop-blur-sm rounded-3xl overflow-hidden border-none p-6 md:p-8">
                    <form id="farmLandForm" action="{{ route('farm_land_registration', $user->id) }}" method="POST">
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
                                            class="w-full h-10 bg-[#d3dfd1] rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] px-4" />
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
                                                    class="province-select w-full h-10 bg-[#d3dfd1] rounded-[20px] border border-solid border-black shadow-[0px_4px_4px_#00000040] text-xs font-semibold px-4">
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
                                                    class="district-select w-full h-10 bg-[#d3dfd1] rounded-[20px] border border-solid border-black shadow-[0px_4px_4px_#00000040] text-xs font-semibold px-4">
                                                    <option value="" disabled selected>Districts</option>
                                                </select>
                                            </div>

                                            <!-- Divisional Secretary -->
                                            <div>
                                                <select name="lands[0][divisionalSecretary]" id="divisional_secretariat"
                                                    class="divisional-select w-full h-10 bg-[#d3dfd1] rounded-[20px] border border-solid border-black shadow-[0px_4px_4px_#00000040] text-xs font-semibold px-4">
                                                    <option value="" disabled selected>Divisional Secretary</option>
                                                </select>
                                            </div>

                                            <!-- Grama Niladari -->
                                            <div>
                                                <select name="lands[0][gramaNiladari]" id="grama_niladhari"
                                                    class="grama-select w-full h-10 bg-[#d3dfd1] rounded-[20px] border border-solid border-black shadow-[0px_4px_4px_#00000040] text-xs font-semibold px-4">
                                                    <option value="" disabled selected>Grama Niladari</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Land Size -->
                                    <div class="flex flex-col space-y-2">
                                        <label for="landSize-1" class="font-sans font-semibold text-black text-base">
                                            Land Size
                                        </label>
                                        <input id="landSize-1" name="lands[0][landSize]"
                                            class="w-full h-10 bg-[#d3dfd1] rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] px-4" />
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
                                class="w-full sm:w-auto px-6 h-10 bg-black rounded-2xl shadow-[0px_4px_4px_#00000040] text-[13px] font-semibold text-white">
                                Register
                            </button>

                            <button type="button" id="add-land-btn"
                                class="w-full sm:w-auto px-6 h-10 bg-black rounded-2xl shadow-[0px_4px_4px_#00000040] text-[13px] font-semibold text-white flex items-center justify-center">
                                Add Land
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
