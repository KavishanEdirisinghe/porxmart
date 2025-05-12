@extends('Layouts.auth')

@section('content')
    <div class="min-h-screen w-full relative">
        {{-- Background Image with Better Handling --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('asset/images/vendor.jpeg') }}" alt="Vendor Background"
                class="w-full h-full object-cover object-center" />
            <div class="absolute inset-0 bg-white opacity-20"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10 py-12">
            {{-- Title --}}
            <h1 class="text-5xl md:text-7xl font-semibold text-black text-center tracking-wide mb-8 md:mb-12">
                VENDOR
            </h1>

            {{-- Description --}}
            <div class="max-w-4xl mx-auto mb-10">
                <p class="font-semibold text-black text-base md:text-lg text-justify leading-relaxed">
                    A vendor is a registered business entity involved in purchasing rice
                    from farmers for resale, processing, or distribution. Each vendor has
                    a Business Name and a Business Registration Number for identification.
                    Vendors specify the Rice Variety Being Purchased, ensuring
                    compatibility with their market demand. They also declare their Rice
                    Capacity Being Purchased, which determines the quantity they can
                    handle. This data helps streamline supply chains, ensuring vendors
                    connect with suitable farmers and optimize logistics, reducing waste
                    and improving efficiency in the rice market.
                </p>
            </div>

            {{-- Registration Form Card --}}
            <div class="container mx-auto px-4 py-8">
                <div
                    class="max-w-lg mx-auto bg-[#fff8f88a] backdrop-blur-sm rounded-3xl overflow-hidden border-none p-6 md:p-8">
                    <form id="businessForm" action="{{ route('business_registration', $user->id) }}" method="POST">
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
                                            class="w-full h-10 bg-[#d3dfd1] rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] px-4" />
                                    </div>

                                    <!-- Business Registration Number -->
                                    <div class="flex flex-col space-y-2">
                                        <label for="businessRegistration-1"
                                            class="font-sans font-semibold text-black text-base">
                                            Business Registration Number
                                        </label>
                                        <input id="businessRegistration-1"
                                            name="businesses[0][business_registration_number]"
                                            class="w-full h-10 bg-[#d3dfd1] rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] px-4" />
                                    </div>

                                    <!-- Business Type -->
                                    <div class="flex flex-col space-y-2">
                                        <label for="businessType-1" class="font-sans font-semibold text-black text-base">
                                            Business Type
                                        </label>
                                        <select id="businessType-1" name="businesses[0][business_type]"
                                            class="w-full h-10 bg-[#d3dfd1] rounded-[20px] border border-solid border-black shadow-[0px_4px_4px_#00000040] text-xs font-semibold px-4">
                                            <option value="" disabled selected>Select Business Type</option>
                                            @foreach ($business_types as $business_type)
                                                <option value="{{ $business_type->id }}">{{ $business_type->type }}</option>
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
                                class="w-full sm:w-auto px-6 h-10 bg-black rounded-2xl shadow-[0px_4px_4px_#00000040] text-[13px] font-semibold text-white">
                                Register
                            </button>

                            <button type="button" id="add-business-btn"
                                class="w-full sm:w-auto px-6 h-10 bg-black rounded-2xl shadow-[0px_4px_4px_#00000040] text-[13px] font-semibold text-white flex items-center justify-center">
                                Add Business
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
