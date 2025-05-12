<div class="min-h-screen bg-cover bg-center text-white" style="background-image: url('{{ asset('asset/images/Contactus.jpg') }}')">
    {{-- Header --}}
    <div class="text-center py-12">
        <h1 class="text-5xl font-bold">Contact Us</h1>
    </div>

    {{-- Map Section --}}
    <div class="w-full mb-16 px-4 md:px-64">
        <iframe
            width="100%"
            height="350"
            scrolling="no"
            src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Uva%20wellassa%20University,%20passara%20road,%20badulla+(Proxmart)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
        ></iframe>
    </div>

    {{-- Footer Section --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            {{-- Explore Links --}}
            <div class="px-36">
                <h2 class="text-xl font-semibold mb-4">Explore</h2>
                <ul class="space-y-2">
                    <li><a href="/" class="hover:text-gray-300">Home</a></li>
                    <li><a href="/about-us" class="hover:text-gray-300">About Us</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-gray-300">Sign Up</a></li>
                    <li><a href="" class="hover:text-gray-300">Contact</a></li>
                </ul>
            </div>

            {{-- News --}}
            <div>
                <h2 class="text-xl font-semibold mb-4">News</h2>
                <div class="space-y-5">
                    <div>
                        <h3 class="font-medium">Bringing Food Production Back To Cities</h3>
                        <p class="text-sm text-yellow-300">July 5, 2022</p>
                    </div>
                    <div>
                        <h3 class="font-medium">The Future of Farming, Smart Irrigation Solutions</h3>
                        <p class="text-sm text-yellow-300">July 5, 2022</p>
                    </div>
                </div>
            </div>

            {{-- Contact & Newsletter --}}
            <div>
                <h2 class="text-xl font-semibold mb-4">Contact</h2>
                <div class="space-y-4 text-sm text-gray-300 mb-6">
                    <p class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-sm text-yellow-300">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        055 888 0000
                    </p>
                    <p class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-sm text-yellow-300">
                            <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                        </svg>
                        proxmart.agri@gmail.com
                    </p>
                    <p class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-sm text-yellow-300">
                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        Uva Wellassa University, Passara road, Badulla
                    </p>
                </div>

                <h2 class="text-xl font-semibold mb-4">Newsletter</h2>
                <form action="" method="POST" class="flex">
                    @csrf
                    <input
                        type="email"
                        name="email"
                        placeholder="Your Email Address"
                        class="flex-1 px-4 py-2 bg-gray-800 rounded-l text-white placeholder-gray-400"
                    />
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-r hover:bg-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                            <path d="m22 2-7 20-4-9-9-4Z"></path>
                            <path d="M22 2 11 13"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        {{-- Bottom Footer --}}
        <div class="mt-16 text-center text-sm text-gray-400 border-t border-gray-700 pt-6">
            © All Copyright {{ date('Y') }} by shawonbtc Themes
        </div>
    </div>
</div>