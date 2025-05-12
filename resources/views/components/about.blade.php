{{-- components/about.blade.php --}}

<div class="min-h-screen bg-gradient-to-b from-[#f9f8f3] to-white">
    {{-- Hero Section --}}
    <div class="w-full px-0 py-0">
        <div class="relative overflow-hidden bg-white shadow-xl">
            <div class="absolute inset-0">
                <img
                    class="h-full w-full object-cover opacity-20"
                    style="background-image: url('{{ asset('asset/images/aboutus1.jpg') }}')"
                />
                <div class="absolute inset-0 bg-gradient-to-r from-green-300 to-green-50 mix-blend-multiply"></div>
            </div>
            
            <div class="relative px-4 sm:px-6 py-12">
                {{-- Main Content --}}
                <div class="text-center">
                    <div class="inline-block p-2 bg-green-100 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-green-600">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                            <path d="M6 12v5c0 2 2 3 6 3s6-1 6-3v-5"></path>
                        </svg>
                    </div>
                    <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent">
                        About Proxmart
                    </h1>
                    <p class="mt-6 max-w-4xl mx-auto text-xl text-gray-700 leading-relaxed">
                        We are a team of final-year students from Uva Wellassa University, dedicated to transforming Sri Lanka's 
                        rice supply chain through data-driven innovation. Our research focuses on developing a Business 
                        Intelligence (BI) framework integrated with Reinforcement Learning (RL) to predict real-time rice 
                        demand.
                    </p>
                    <div class="mt-8 flex justify-center space-x-4">
                        <div class="flex items-center text-green-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span>Student-Led Initiative</span>
                        </div>
                        <div class="flex items-center text-green-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mr-2">
                                <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                                <line x1="3" x2="21" y1="9" y2="9"></line>
                                <line x1="3" x2="21" y1="15" y2="15"></line>
                                <line x1="9" x2="9" y1="3" y2="21"></line>
                                <line x1="15" x2="15" y1="3" y2="21"></line>
                            </svg>
                            <span>Data-Driven Approach</span>
                        </div>
                    </div>
                </div>

                {{-- Image Grid --}}
                <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <img
                        style="background-image: url('{{ asset('asset/images/aboutus2.jpg') }}')"
                        class="rounded-lg shadow-md h-48 w-full object-cover"
                    />
                    <img
                        style="background-image: url('{{ asset('asset/images/aboutus3.jpg') }}')"
                        class="rounded-lg shadow-md h-48 w-full object-cover"
                    />
                    <img
                        style="background-image: url('{{ asset('asset/images/aboutus4.jpg') }}')"
                        class="rounded-lg shadow-md h-48 w-full object-cover"
                    />
                </div>

                {{-- Mission Section --}}
                <div class="mt-16">
                    <div class="text-center mb-12">
                        <div class="inline-block p-2 bg-green-100 rounded-full mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-green-600">
                                <circle cx="12" cy="12" r="10"></circle>
                                <circle cx="12" cy="12" r="6"></circle>
                                <circle cx="12" cy="12" r="2"></circle>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900">Our Mission</h2>
                        <p class="mt-4 text-lg text-gray-700 max-w-3xl mx-auto">
                            To create sustainable insights for farmers and vendors, reducing inefficiencies,
                            minimizing waste, and optimizing resource allocation in the agricultural sector.
                        </p>
                    </div>
                </div>

                {{-- Values Grid --}}
                <div class="mt-16 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="bg-white/90 p-6 sm:p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-green-50">
                        <div class="bg-green-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-green-600">
                                <line x1="9" x2="9" y1="18" y2="12"></line>
                                <line x1="15" x2="15" y1="18" y2="12"></line>
                                <path d="M12 18h6a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6z"></path>
                                <path d="M12 8v4"></path>
                                <path d="M12 2v2"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900">Innovation</h3>
                        <p class="mt-2 text-gray-600 leading-relaxed">
                            Leveraging cutting-edge technology and AI to revolutionize traditional farming practices
                            and create smarter agricultural solutions.
                        </p>
                        <img
                            style="background-image: url('{{ asset('asset/images/aboutus5.jpg') }}')"
                            class="mt-4 rounded-lg w-full h-32 object-cover"
                        />
                    </div>
                    <div class="bg-white/90 p-6 sm:p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-green-50">
                        <div class="bg-green-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-green-600">
                                <path d="M12 2L8 6H16L12 2Z"></path>
                                <circle cx="12" cy="11" r="3"></circle>
                                <path d="M17 17c.7-1 1-2.3 1-4a6 6 0 0 0-12 0c0 1.7.3 3 1 4L12 22l5-5Z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900">Sustainability</h3>
                        <p class="mt-2 text-gray-600 leading-relaxed">
                            Promoting eco-friendly and sustainable agricultural methods while ensuring
                            long-term food security for future generations.
                        </p>
                        <img
                            src="https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Sustainable farming"
                            class="mt-4 rounded-lg w-full h-32 object-cover"
                        />
                    </div>
                    <div class="bg-white/90 p-6 sm:p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 border border-green-50">
                        <div class="bg-green-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-green-600">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900">Community</h3>
                        <p class="mt-2 text-gray-600 leading-relaxed">
                            Building strong connections between farmers and vendors while fostering
                            a collaborative agricultural ecosystem.
                        </p>
                        <img
                            src="https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="Farming community"
                            class="mt-4 rounded-lg w-full h-32 object-cover"
                        />
                    </div>
                </div>

                {{-- Research Focus --}}
                <div class="mt-16 text-center">
                    <div class="inline-block p-2 bg-green-100 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-green-600">
                            <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                            <line x1="3" x2="21" y1="9" y2="9"></line>
                            <line x1="3" x2="21" y1="15" y2="15"></line>
                            <line x1="9" x2="9" y1="3" y2="21"></line>
                            <line x1="15" x2="15" y1="3" y2="21"></line>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Our Research Focus</h2>
                    <div class="bg-white/90 p-6 sm:p-8 rounded-xl shadow-lg border border-green-50 max-w-4xl mx-auto">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                            <img
                                src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                alt="Data analysis"
                                class="rounded-lg shadow-md w-full h-64 object-cover"
                            />
                            <p class="text-gray-700 leading-relaxed text-left">
                                By leveraging historical sales, weather patterns, and population growth data, we aim to 
                                provide actionable insights for farmers and vendors. Our innovative approach combines
                                Business Intelligence with Reinforcement Learning to create a sustainable and efficient
                                agricultural ecosystem. Join us in shaping the future of smart and sustainable agriculture!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>