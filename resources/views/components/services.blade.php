{{-- components/services.blade.php --}}

<div class="min-h-screen bg-gray-50">
    {{-- Hero Section --}}
    <div 
        class="relative h-[400px] bg-cover bg-center"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('asset/images/farmland.jpg') }}')"
    >
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative h-full flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Our Services</h1>
                <p class="text-xl text-gray-200 max-w-2xl mx-auto px-4">
                    Empowering agriculture through data-driven insights and expert solutions
                </p>
            </div>
        </div>
    </div>

    {{-- Services Grid --}}
    <div class="max-w-7xl mx-auto px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Service Card: Rice Demand Forecasting --}}
            <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-green-600">
                        <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                        <line x1="3" x2="21" y1="9" y2="9"></line>
                        <line x1="3" x2="21" y1="15" y2="15"></line>
                        <line x1="9" x2="9" y1="3" y2="21"></line>
                        <line x1="15" x2="15" y1="3" y2="21"></line>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-gray-800">Rice Demand Forecasting</h3>
                <p class="text-gray-600 mb-4">Leverage advanced analytics for accurate, data-driven predictions on rice demand across regions, helping optimize your supply chain and production planning.</p>
            </div>

            {{-- Service Card: Supply Chain Optimization --}}
            <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-green-600">
                        <path d="M10 17h4V5H2v12h3"></path>
                        <path d="M20 17h2v-3.34a4 4 0 0 0-1.17-2.83L19 9"></path>
                        <path d="M14 17h1"></path>
                        <rect x="5" y="13" width="5" height="4" rx="1"></rect>
                        <path d="M5 17v4"></path>
                        <path d="M10 17v4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-gray-800">Supply Chain Optimization</h3>
                <p class="text-gray-600 mb-4">Streamline your operations with smart inventory management, procurement strategies, and delivery optimization to reduce waste and costs.</p>
            </div>

            {{-- Service Card: Market Trend Analysis --}}
            <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-green-600">
                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                        <polyline points="17 6 23 6 23 12"></polyline>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-gray-800">Market Trend Analysis</h3>
                <p class="text-gray-600 mb-4">Stay ahead with real-time insights into market trends, price fluctuations, and consumer behavior patterns for informed decision-making.</p>
            </div>

            {{-- Service Card: Agricultural Consulting --}}
            <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-green-600">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-gray-800">Agricultural Consulting</h3>
                <p class="text-gray-600 mb-4">Get expert guidance on rice cultivation best practices, tailored to your specific needs and backed by data-driven insights.</p>
            </div>

            {{-- Service Card: Data-Driven Crop Planning --}}
            <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-green-600">
                        <path d="M12 2a3 3 0 0 0-3 3c0 1.6.8 3 2 4l-2 7h6l-2-7c1.2-1 2-2.4 2-4a3 3 0 0 0-3-3z"></path>
                        <path d="M12 19h7a2 2 0 0 0 2-2v-1a3 3 0 0 0-3-3h-2"></path>
                        <path d="M5 19h7"></path>
                        <path d="M12 19v3"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-gray-800">Data-Driven Crop Planning</h3>
                <p class="text-gray-600 mb-4">Optimize your yield with personalized crop planning services using cutting-edge predictive analytics for variety selection and timing.</p>
            </div>

            {{-- Service Card: Sales & Price Prediction --}}
            <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-green-600">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <line x1="2" y1="7" y2="7" x2="22"></line>
                        <path d="M22 11.5a2.5 2.5 0 0 0-5 0c0 2.5 5 2.5 5 5a2.5 2.5 0 0 0-5 0"></path>
                        <path d="M7 12h.01"></path>
                        <path d="M17 12h.01"></path>
                        <path d="M7 16h.01"></path>
                        <path d="M12 12h.01"></path>
                        <path d="M17 16h.01"></path>
                        <path d="M12 16h.01"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-gray-800">Sales & Price Prediction</h3>
                <p class="text-gray-600 mb-4">Make informed pricing decisions with accurate forecasting of rice prices and sales volumes across different markets.</p>
            </div>
        </div>

        {{-- Call to Action --}}
        <div class="mt-16 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Ready to Optimize Your Agriculture Business?</h2>
            <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                Join the growing number of farmers and vendors who are transforming their operations with our data-driven solutions.
            </p>
            <a
                href="{{ route('login') }}"
                class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 transition-colors duration-300 font-semibold"
            >
                Get Started Today
            </a>
        </div>
    </div>
</div>