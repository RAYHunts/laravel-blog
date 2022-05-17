
<x-main>
    <main class="flex justify-center items-center h-screen px-3">
      <div class="flex max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-4xl w-full">
          <div class="hidden bg-cover lg:block lg:w-1/2" style="background-image:url('https://images.unsplash.com/photo-1606660265514-358ebbadc80d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1575&q=80')"></div>
          
          <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
              <a href="{{ route('home') }}">
                {{-- <h2 class="text-2xl font-semibold text-center text-gray-700 dark:text-white">Brand</h2> --}}
                <x-application-logo class="w-28 fill-current text-gray-500 mx-auto" />
              </a>
  
              <p class="text-xl text-center text-gray-600 dark:text-gray-200">Welcome back!</p>
  
              <form action="{{ route('register') }}" method="post">
                  @csrf
                  <div class="mt-4">
                      <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="name">Name</label>
                      <input id="name" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" name="name" value="{{ old('name') }}">
                    </div>
                    @error('name')
                    <div class="mt-4">
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    </div>
                    @enderror
                  <div class="mt-4">
                      <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="LoggingEmailAddress">Email Address</label>
                      <input id="LoggingEmailAddress" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" name="email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                    <div class="mt-4">
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    </div>
                    @enderror
                  <div class="mt-4">
                      <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="LoggingusernameAddress">Username</label>
                      <input id="LoggingusernameAddress" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" name="username" value="{{ old('username') }}">
                    </div>
                    @error('username')
                    <div class="mt-4">
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    </div>
                    @enderror
                    <div class="mt-4">
                        <div class="flex justify-between">
                      <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="loggingPassword">Password</label>
                    </div>
                    <input id="loggingPassword" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" type="password" name="password">
                    @error('password')
                    <div class="mt-4">
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    </div>
                    @enderror
                    <div class="mt-4">
                        <div class="flex justify-between">
                      <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="password_confirmation">Confirm Password</label>
                    </div>
                  <input id="password_confirmation" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" type="password" name="password_confirmation">
              </div>
  
              <div class="mt-8">
                  <button class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-gray-700 rounded hover:bg-gray-600 focus:outline-none focus:bg-gray-600" type="submit">
                      Register
                  </button>
              </div>
            </form>
              
              <div class="flex items-center justify-between mt-4">
                  <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>
  
                  <a href="{{ route('login') }}" class="text-xs text-gray-500 uppercase dark:text-gray-400 hover:underline">or login</a>
                  
                  <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>
              </div>
          </div>
      </div>
  </main>
  </x-main>