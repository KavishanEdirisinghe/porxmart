@extends('layouts.vendor_lay')

@section('title', 'Business Edit')

@section('content')
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-sm rounded-lg bg-white">
        <form id="businessForm" action="{{ route('business_edit', $business->id) }}" method="POST">
            @csrf
            <div id="businesses-container">
                <!-- Initial Business Section -->
                <div class="business-section mt-5" id="business-section-1">
                    <div class="space-y-4 md:space-y-6">
                        <!-- Business Name -->
                        <div class="flex flex-col space-y-2">
                            <label for="businessName-1" class="font-sans font-semibold text-black text-base">
                                Business Name
                            </label>
                            <input id="businessName-1" name="business_name" value="{{ $business->name }}"
                                class="w-full h-10 bg-[#d3dfd1] rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] px-4" />
                        </div>

                        <!-- Business Registration Number -->
                        <div class="flex flex-col space-y-2">
                            <label for="businessRegistration-1" class="font-sans font-semibold text-black text-base">
                                Business Registration Number
                            </label>
                            <input id="businessRegistration-1" name="business_registration_number"
                                value="{{ $business->registration_no }}"
                                class="w-full h-10 bg-[#d3dfd1] rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] px-4" />
                        </div>

                        <!-- Business Type -->
                        <div class="flex flex-col space-y-2">
                            <label for="businessType-1" class="font-sans font-semibold text-black text-base">
                                Business Type
                            </label>
                            <select id="businessType-1" name="business_type"
                                class="w-full h-10 bg-[#d3dfd1] rounded-[20px] border border-solid border-black shadow-[0px_4px_4px_#00000040] text-xs font-semibold px-4">
                                <option value="" disabled selected>Select Business Type</option>
                                @foreach ($business_types as $business_type)
                                    @if ($business->business_types_id == $business_type->id)
                                        <option value="{{ $business_type->id }}" selected>{{ $business_type->type }}
                                        </option>
                                    @endif
                                    <option value="{{ $business_type->id }}">{{ $business_type->type }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Remove button (hidden for first section) -->
                        <button type="button" class="remove-business-btn hidden mt-2 text-red-500 text-sm underline">
                            Remove this business
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
                 <a href="{{ route('business') }}"
                    class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg flex items-center">
                    Cancel</a>

            </div>
        </form>
    </div>
@endsection
