@extends('Layouts.auth')

@section('content')
    <div>
        <div class="text-white bg-black">
            {{-- Hero Section --}}
            <div class="relative h-[calc(100vh-64px)]">
                <div
                    class="absolute inset-0 bg-cover bg-center"
                    style="background-image: url('{{ asset('asset/images/div-elementor-repeater-item-5887cc6.png') }}')"
                >
                    <div class="absolute inset-0 bg-black/40"></div>
                    <div class="relative h-full flex items-center">
                        <div class="w-full px-4 sm:px-6 lg:px-8">
                            <div class="text-white">
                                <h1 class="text-9xl md:text-6xl font-bold mb-4">
                                    <span class="text-green-400">Empowering</span> Farmers,<br>
                                    Elevating Markets.
                                </h1>
                                <p class="text-xl mb-8">
                                    Connecting Farmers & Vendors - A Smarter<br>
                                    Way to Trade Agriculture
                                </p>
                                <div class="space-x-4">
                                    <a
                                        href=""
                                        class="text-black px-6 py-3 rounded-md text-lg font-medium hover:bg-gray-100"
                                        style="background-color: #f8f7f2;"
                                    >
                                        Contact Us
                                    </a>
                                    <a
                                        href="{{ route('login') }}"
                                        class="bg-green-500 text-white px-6 py-3 rounded-md text-lg font-medium hover:bg-green-600"
                                    >
                                        Join Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- About Us Section --}}
        <div id="about">
        @include('components.about')

        </div>

        {{-- Services --}}
        <div id="services">
            @include('components.services')
</div>
{{-- Contact Info --}}
        <div id="contact">
            @include('components.contact')
</div>

    </div>
@endsection