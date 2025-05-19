@extends('layouts.farmer_lay')

@section('title', 'Paddy Product Edit')

@section('content')
    <div class="container p-5 m-5 mx-auto form-card bg-white rounded-xl md:p-8">
        <form id="farmLandForm" action="{{ route('paddy_product_edit', $products->id) }}" method="POST">
            @csrf
            <div id="lands-container">
                <!-- Initial Land Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Land Selector -->
                    <div class="col-span-1">
                        <label for="land_id" class="block text-sm font-medium text-gray-700 mb-1">Land</label>
                        <div class="relative">
                            <select id="land_id" name="land_id" required
                                class="block w-full rounded-lg border border-gray-300 bg-white py-3 px-4 pr-10 text-gray-700 focus:border-blue-500 focus:outline-none focus:ring-blue-500">
                                @foreach ($lands as $land)
                                    @if ($land->id == $products->fam_land_id)
                                        <option value="{{ $land->id }}" selected>{{ $land->registraion_no }}</option>
                                    @endif
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
                                @foreach ($paddyVarieties as $paddyVariety)
                                    @if ($paddyVariety->id == $products->paddy_varieties_id)
                                        <option value="{{ $paddyVariety->id }}" selected>{{ $paddyVariety->name }}</option>
                                    @endif
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
                                placeholder="Select date" value="{{ $products->sawn_date }}">

                        </div>
                    </div>

                    <!-- Expected Yield -->
                    <div class="col-span-1">
                        <label for="expected_yield_input" class="block text-sm font-medium text-gray-700 mb-1">Expected
                            Yield</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <input type="number" step="0.01" id="expected_yield_input" name="expected_yield_display"
                                required
                                class="block w-full rounded-lg border border-gray-300 bg-white py-3 px-4 text-gray-700 focus:border-blue-500 focus:outline-none focus:ring-blue-500"
                                placeholder="0.00" value="{{ old('expected_yield_display', $expectedYieldDisplay) }}">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-24">
                                <select id="unit_selector" class="border-none bg-transparent text-gray-700 focus:ring-0">
                                    <option value="kg"
                                        {{ old('expected_yield_unit', $expectedYieldUnit) === 'kg' ? 'selected' : '' }}>kg
                                    </option>
                                    <option value="mt"
                                        {{ old('expected_yield_unit', $expectedYieldUnit) === 'mt' ? 'selected' : '' }}>mt
                                    </option>
                                </select>
                            </div>
                        </div>
                        <!-- Hidden field to submit converted mt value -->
                        <input type="hidden" name="expected_yield" id="expected_yield_converted">
                    </div>


                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row justify-between gap-3 pt-6">
                <button type="submit" id="register-btn"
                    class="w-full sm:w-auto px-6 h-10 bg-black rounded-2xl shadow-[0px_4px_4px_#00000040] text-[13px] font-semibold text-white">
                    Edit
                </button>

                <a href="{{ route('paddy_product_index') }}"
                    class="w-full sm:w-auto px-6 h-10 bg-black rounded-2xl shadow-[0px_4px_4px_#00000040] text-[13px] font-semibold text-white flex items-center justify-center">
                    Cancel</a>
            </div>
        </form>
    </div>

    <script>
        const form = document.querySelector('#farmLandForm');
        form.addEventListener('submit', function(e) {
            const displayValue = parseFloat(document.getElementById('expected_yield_input').value);
            const unit = document.getElementById('unit_selector').value;
            const convertedField = document.getElementById('expected_yield_converted');
            const unitField = document.getElementById('expected_yield_unit_hidden');

            if (isNaN(displayValue)) {
                alert("Please enter a valid number for expected yield.");
                e.preventDefault();
                return;
            }

            const converted = unit === 'kg' ? displayValue / 1000 : displayValue;
            convertedField.value = converted;
            unitField.value = unit;
        });
    </script>


@endsection
