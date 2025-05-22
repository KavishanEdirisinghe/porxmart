{{-- resources/views/auth/login.blade.php --}}
@extends('Layouts.auth')

@section('content')
<div class="min-h-[calc(100vh-64px)] relative">
    <div
        class="absolute inset-0 bg-cover bg-center"
        style="background-image: url('{{ asset('asset/images/back.jpeg') }}')"
    >
        <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>
    </div>

    <div class="relative flex items-center justify-center min-h-[calc(100vh-64px)]">
        <div class="bg-black/30 backdrop-blur-md p-8 rounded-3xl w-full max-w-md">
            <h2 class="text-3xl font-bold text-white text-center mb-8"><a href="{{ route('admin_registration_index') }}">Login</a></h2>

            <button class="w-full bg-white text-black rounded-xl py-3 px-4 flex items-center justify-center gap-3 hover:bg-gray-100 transition-colors mb-6">
                <img
                    src="{{ asset('asset/images/google--g--logo-svg-1.png') }}"
                    alt="Google"
                    class="w-6 h-6"
                />
                <span class="font-medium">Log in with Google</span>
            </button>

            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 text-white bg-black/30">Or continue with</span>
                </div>
            </div>

            <form method="POST" action="{{ route('login_process') }}" class="space-y-6">
                @csrf
                
                <div>
                    <label for="email" class="block text-sm font-medium text-white mb-2">
                        Email Address
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 @error('email') border-red-500 @enderror"
                        placeholder="Enter your email"
                        required
                        autocomplete="email"
                        autofocus
                    />
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-white mb-2">
                        Password
                    </label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-white/50 @error('password') border-red-500 @enderror"
                        placeholder="••••••••"
                        required
                        autocomplete="current-password"
                    />
                    @error('password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            name="remember"
                            id="remember"
                            class="h-4 w-4 text-white border-white/20 rounded"
                            {{ old('remember') ? 'checked' : '' }}
                        />
                        <label for="remember" class="ml-2 text-sm text-white/80">
                            Remember me
                        </label>
                    </div>
                    
                    @if (Route::has('password.request'))
                        <a href="" class="text-sm text-white/80 hover:text-white">
                            Forgot Password?
                        </a>
                    @endif
                </div>

                <button
                    type="submit"
                    class="w-full bg-white text-black rounded-xl py-3 font-medium hover:bg-gray-100 transition-colors"
                >
                    Login
                </button>
            </form>

            <p class="mt-6 text-center text-white">
                Don't have an account yet?
                <a href="{{ route('register') }}" class="font-bold text-blue-200 cursor-pointer hover:text-blue-400">
                    Sign up
                </a>
            </p>
        </div>
    </div>
</div>
@endsection