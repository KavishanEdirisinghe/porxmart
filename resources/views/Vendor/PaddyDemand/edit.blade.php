@extends('layouts.vendor_lay')

@section('title', 'Business Edit')

@section('content')
    <div class="container">
        <form id="businessForm" action="{{ route('paddy_demand_edit', $paddy_demand->id) }}" method="POST">
            @csrf
            <div id="businesses-container">
                <!-- Initial Business Section -->
                <div class="business-section mt-5" id="business-section-1">
                    <div class="space-y-4 md:space-y-6">
                        <!-- Business Name -->
                        <div class="flex flex-col space-y-2">
                            <label for="businessType-1" class="font-sans font-semibold text-black text-base">
                                Select Business
                            </label>
                            <select id="businessType-1" name="business"
                                class="w-full h-10 bg-[#d3dfd1] rounded-[20px] border border-solid border-black shadow-[0px_4px_4px_#00000040] text-xs font-semibold px-4">
                                <option value="" disabled selected>Select Business</option>
                                @foreach ($business as $business)
                                    @if ($business->id == $paddy_demand->business_id)
                                        <option value="{{ $business->id }}" selected>{{ $business->name }}</option>
                                    @endif
                                    <option value="{{ $business->id }}">{{ $business->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Paddy Varieties Selection -->
                        <div class="flex flex-col space-y-2">
                            <label class="font-sans font-semibold text-black text-base">
                                Select Paddy Varieties
                            </label>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                @foreach ($paddy_variety as $variety)
                                    <div class="flex items-center">
                                        @if ($variety->id == $paddy_demand->paddy_varieties_id)
                                            <input type="checkbox" id="paddy-variety-{{ $variety->id }}"
                                                name="paddy_varieties[]" value="{{ $variety->id }}"
                                                class="h-5 w-5 text-green-600 rounded border-gray-300 focus:ring-green-500"
                                                checked>
                                            <label for="paddy-variety-{{ $variety->id }}"
                                                class="ml-2 block text-sm font-medium text-gray-700">
                                                {{ $variety->name }}
                                            </label>
                                        @else
                                            <input type="checkbox" id="paddy-variety-{{ $variety->id }}"
                                                name="paddy_varieties[]" value="{{ $variety->id }}"
                                                class="h-5 w-5 text-green-600 rounded border-gray-300 focus:ring-green-500">
                                            <label for="paddy-variety-{{ $variety->id }}"
                                                class="ml-2 block text-sm font-medium text-gray-700">
                                                {{ $variety->name }}
                                            </label>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Business Type -->
                        <div class="flex flex-col space-y-2">
                            <label for="timing" class="font-sans font-semibold text-black text-base">
                                Timing
                            </label>
                            <select name="timing"
                                class="w-full h-10 bg-[#d3dfd1] rounded-[20px] border border-solid border-black shadow-[0px_4px_4px_#00000040] text-xs font-semibold px-4">
                                <option value="" disabled selected>Select Timing</option>
                                @foreach ($timing as $time)
                                    @if ($time->id == $paddy_demand->timing_id)
                                        <option value="{{ $time->id }}" selected>{{ $time->timing }}</option>
                                    @endif
                                    <option value="{{ $time->id }}">{{ $time->timing }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Business Registration Number -->
                        <div class="flex flex-col space-y-2">
                            <label for="Quntity" class="font-sans font-semibold text-black text-base">
                                Quntity
                            </label>
                            <input id="Quntity" name="quntity" type="number" value="{{ $paddy_demand->quantity }}"
                                class="w-full h-10 bg-[#d3dfd1] rounded-[20px] border border-solid border-[#040404] shadow-[0px_4px_4px_#00000040] px-4" />
                        </div>

                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-between gap-3 pt-6">
                <button type="submit" id="register-btn"
                    class="w-full sm:w-auto px-6 h-10 bg-black rounded-2xl shadow-[0px_4px_4px_#00000040] text-[13px] font-semibold text-white">
                    Edit
                </button>
            </div>
        </form>
    </div>
@endsection
