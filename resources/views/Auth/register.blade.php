@extends('Layouts.auth')

@section('content')
    <div class="flex justify-center w-full m-0 p-0">
        <div class="relative w-full min-h-screen bg-cover bg-center"
            style="background-image: url('{{ $isLogin ? asset('asset/images/back.jpeg') : asset('asset/images/sign-up.png') }}');">
            <div class="absolute inset-0 bg-black opacity-40"></div>

            <div
                class="relative z-10 w-[400px] flex items-center left-[80px] border-none shadow-md mx-10 my-24 rounded-lg overflow-hidden">
                <div class="absolute inset-0 bg-black opacity-40 rounded-lg"></div>
                <div class="p-8 flex flex-col items-center relative z-10 w-full">
                    <div class="w-full mt-8 text-center space-y-1">
                        <h1
                            class="font-extralight text-white text-[40px] leading-[30px] font-['Times_New_Roman-Bold',Helvetica]">
                            {{ $isLogin ? 'Welcome Back' : 'Registration Form' }}
                        </h1>
                        <p
                            class="font-extralight text-white text-[20px] leading-[26px] font-['Times_New_Roman-Bold',Helvetica] mt-4">
                            {{ $isLogin ? 'Please login to continue' : 'Please fill in the form below' }}
                        </p>
                    </div>

                    <h2
                        class="mt-4 font-semibold text-white text-[30px] text-center leading-[30px] font-['Manrope',Helvetica] [text-shadow:0px_4px_4px_#00000040]">
                        {{ $isLogin ? 'Login' : 'Sign up' }}
                    </h2>

                    <button
                        class="w-[268px] h-[44px] mt-4 bg-black rounded-2xl shadow-[0px_4px_4px_#00000040] flex items-center justify-center gap-2">
                        <img class="w-[23px] h-[23px] object-cover" alt="Google logo"
                            src="{{ asset('asset/images/google--g--logo-svg-1.png') }}" />
                        <span class="font-bold text-white text-lg text-center font-['Times_New_Roman-Bold',Helvetica]">
                            {{ $isLogin ? 'Login with Google' : 'Sign up with Google' }}
                        </span>
                    </button>

                    <form action="{{ route('basic_registration') }}" method="POST"
                        class="w-full mt-6 space-y-5">
                        @csrf

                        <div class="space-y-1">
                            <label for="name"
                                class="block font-bold text-white text-base font-['Times_New_Roman-Bold',Helvetica]">
                                Fist Name
                            </label>
                            <input id="fname" name="fname" placeholder="First Name" value="{{ old('name') }}"
                                class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 @error('email') border-red-500 @enderror" />
                            @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="space-y-1">
                            <label for="name"
                                class="block font-bold text-white text-base font-['Times_New_Roman-Bold',Helvetica]">
                                Last Name
                            </label>
                            <input id="lname" name="lname" placeholder="Last Name" value="{{ old('name') }}"
                                class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 @error('email') border-red-500 @enderror" />
                            @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label for="nic"
                                class="block font-bold text-white text-base font-['Times_New_Roman-Bold',Helvetica]">
                                National Identity Card Number
                            </label>
                            <input id="nic" name="nic" placeholder="National Identity Card Number" value="{{ old('nic') }}"
                                class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 @error('email') border-red-500 @enderror" />
                            @error('nic')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label for="mobile"
                                class="block font-bold text-white text-base font-['Times_New_Roman-Bold',Helvetica]">
                                Mobile Number
                            </label>
                            <input id="mobile" placeholder="Mobile Number" name="mobile" value="{{ old('mobile') }}"
                                class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 @error('email') border-red-500 @enderror" />
                            @error('mobile')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label for="email"
                                class="block font-bold text-white text-base font-['Times_New_Roman-Bold',Helvetica]">
                                Email Address
                            </label>
                            <input id="email" placeholder="Email Address" name="email" type="email" value="{{ old('email') }}"
                                class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 @error('email') border-red-500 @enderror" />
                            @error('email')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="space-y-1">
                            <label for="password"
                                class="block font-bold text-white text-base font-['Times_New_Roman-Bold',Helvetica]">
                                Password
                            </label>
                            <input id="password" name="password" placeholder="Password" type="password" value="{{ old('password') }}"
                                class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 @error('email') border-red-500 @enderror" />
                            @error('email')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        @if (!$isLogin)
                            <div class="flex items-center space-x-2 mt-4">
                                <input type="checkbox" id="privacy" name="agreeToPrivacy"
                                    class="w-4 h-[17px] bg-[#fdf8f8]" />
                                <label for="privacy" class="font-semibold text-white text-sm font-['Inter',Helvetica]">
                                    I agree to the privacy policies
                                </label>
                                @error('agreeToPrivacy')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif

                        <button type="submit"
                            class="w-[276px] h-[51px] mt-6 bg-black rounded-2xl shadow-[0px_4px_4px_#00000040] font-semibold text-white text-xl font-['Inter',Helvetica]">
                            {{ $isLogin ? 'Login' : 'Next' }}
                        </button>
                    </form>

                    <p class="mt-4 font-semibold text-white text-sm text-center font-['Inter',Helvetica]">
                        {{ $isLogin ? "Don't have an account?" : 'Already have an account?' }}
                        <a href="{{route('login') }}"
                            class="font-bold text-blue-200 cursor-pointer hover:text-blue-400">
                            {{ $isLogin ? 'Sign up' : 'Login' }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
