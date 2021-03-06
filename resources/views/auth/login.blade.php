{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}


<x-main-layout>

    <main class="flex justify-center items-center h-screen">
      <div class="flex max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-4xl w-full">
          <div class="hidden bg-cover lg:block lg:w-1/2" style="background-image:url('https://images.unsplash.com/photo-1606660265514-358ebbadc80d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1575&q=80')"></div>
          
          <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
              <a href="{{ route('home') }}">
                <h2 class="text-2xl font-semibold text-center text-gray-700 dark:text-white">Brand</h2>
              </a>
  
              <p class="text-xl text-center text-gray-600 dark:text-gray-200">Welcome back!</p>
  
              <form action="{{ route('login') }}" method="post">
                  @csrf
                  <div class="mt-4">
                      <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="LoggingEmailAddress">Email Address</label>
                      <input id="LoggingEmailAddress" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" name="email" value="{{ old('email') }}">
                    </div>
                    @if($errors->has('email'))
                    <div class="mt-4">
                        <p class="text-red-500 text-xs italic">{{ $errors->first('email') }}</p>
                    </div>
                    @endif
                    <div class="mt-4">
                        <div class="flex justify-between">
                      <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="loggingPassword">Password</label>
                      <a href="{{ route('password.request') }}" class="text-xs text-gray-500 dark:text-gray-300 hover:underline">Forget Password?</a>
                    </div>
  
                  <input id="loggingPassword" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" type="password" name="password">
              </div>
  
              <div class="mt-8">
                  <button class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-gray-700 rounded hover:bg-gray-600 focus:outline-none focus:bg-gray-600" type="submit">
                      Login
                  </button>
              </div>
            </form>
              
              <div class="flex items-center justify-between mt-4">
                  <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>
  
                  <a href="{{ route('register') }}" class="text-xs text-gray-500 uppercase dark:text-gray-400 hover:underline">or sign up</a>
                  
                  <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>
              </div>
          </div>
      </div>
  </main>
  </x-main-layout>