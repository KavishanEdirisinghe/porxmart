@extends('Layouts.auth')

@section('content')
    <div class="relative min-h-screen flex flex-col items-center justify-start py-16 px-4"
        style="
     background-image: url('{{ asset('asset/images/Rolechoosing.jpeg') }}');
        background-repeat: no-repeat;
        background-size: cover;
           background-position: center;
    ">
        {{-- Half White Overlay --}}
        <div class="absolute bottom-0 left-0 w-full h-1/2 bg-white opacity-80 z-10"></div>

        {{-- Title --}}
        <div class="z-10 bg-white/90 px-8 py-2 rounded-full shadow-md mb-12">
            <h1 class="text-4xl md:text-5xl font-semibold text-gray-900 text-center">
                Choose Your Role
            </h1>
        </div>

        {{-- Cards --}}
        <div class="z-10 grid grid-cols-1 md:grid-cols-2 gap-10 max-w-4xl w-full">
            {{-- Farmer Card --}}
            <div class="bg-white rounded-3xl shadow-xl p-6 md:p-8 flex flex-col items-center text-center">
                <img src="{{ asset('asset/images/role_1.jpeg') }}" alt="Farmer"
                    class="w-36 h-36 rounded-full object-cover mb-4 border-4 border-white shadow" />
                <div class="bg-lime-400 text-black font-semibold rounded-full px-4 py-1 mb-2 flex items-center gap-2">
                    <span class="text-sm">👨‍🌾</span> Farmer
                </div>
                <a href="{{ route('farmer_registation', $user->id) }}" class="mb-4 bg-emerald-500 hover:bg-emerald-600 text-white text-sm px-4 py-2 rounded-md">
                    Register as Farmer
                </a>
                <p class="text-gray-900 text-sm">
                    As a farmer, you can register your land using a unique Land Registration Number,
                    specify the location of your paddy field, and declare the rice variety you cultivate.
                    This allows buyers to understand your product offerings. Additionally, you can list your selling
                    capacity,
                    making it easier to connect with vendors looking for reliable suppliers.
                </p>
            </div>

            {{-- Vendor Card --}}
            <div class="bg-white rounded-3xl shadow-xl p-6 md:p-8 flex flex-col items-center text-center">
                <img src="{{ asset('asset/images/role_2.jpeg') }}" alt="Vendor"
                    class="w-36 h-36 rounded-full object-cover mb-4 border-4 border-white shadow" />
                <div class="bg-lime-400 text-black font-semibold rounded-full px-4 py-1 mb-2 flex items-center gap-2">
                    <span class="text-sm">🏪</span> Vendor
                </div>
                <a href="{{ route('vendor_registation', $user->id) }}" class="mb-4 bg-emerald-500 hover:bg-emerald-600 text-white text-sm px-4 py-2 rounded-md">
                    Register as Vendor
                </a>
                <p class="text-gray-900 text-sm">
                    As a vendor, you gain access to a network of farmers, helping you find reliable
                    rice suppliers based on location, variety, and availability. You can track supply trends,
                    compare offerings, and make informed purchasing decisions, ensuring a smooth and efficient procurement
                    process.
                </p>
            </div>
        </div>
    </div>
@endsection
