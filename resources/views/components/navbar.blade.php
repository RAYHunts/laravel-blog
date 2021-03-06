      <nav class="bg-white shadow dark:bg-gray-800 fixed top-0 z-[9999] w-full md:px-20">
          <div class="container px-6 py-3 mx-auto">
              <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                  <div class="flex items-center justify-between">
                      <div class="flex items-center">
                          <a class="text-2xl font-bold text-gray-800 transition-colors duration-200 transform dark:text-white lg:text-3xl hover:text-gray-700 dark:hover:text-gray-300" href="{{ route('home') }}">
                          {{-- env app name --}}
                              {{ config('app.name', 'Laravel') }}
                          </a>
  
                          <!-- Search input on desktop screen -->
                          <div class="hidden mx-10 md:block">
                              <div class="relative">
                                <form action="{{ url('/') }}" method="get">
                                  @if(request()->has('category'))
                                  <input type="hidden" name="category" value="{{ request()->get('category') }}">
                                  @endif
                                  @if(request()->has('author'))
                                  <input type="hidden" name="author" value="{{ request()->get('author') }}">
                                  @endif
                                  <input type="text" class="w-full py-2 pl-4 pr-4 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300" placeholder="Search" name="search">
                                  <button class="absolute inset-y-0 right-0 flex items-center pr-3" type="submit">
                                      <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                          <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                      </svg>
                                  </button>
                                </form>
                              </div>
                          </div>
                      </div>
  
                      <!-- Mobile menu button -->
                      <div class="flex md:hidden">
                          <button type="button" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu" id="toggle">
                              <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                                  <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                              </svg>
                          </button>
                      </div>
                  </div>
  
                  <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                  <div class="items-center md:flex hidden flex-nowrap" id="collapse">
                      <div class="flex flex-col mt-2 md:flex-row md:mt-0 md:mx-1">
                          <a class="my-1 text-sm leading-5 text-gray-700 transition-colors duration-200 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline md:mx-4 md:my-0" href="{{ route('home') }}">Home</a>
                          <a class="my-1 text-sm leading-5 text-gray-700 transition-colors duration-200 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline md:mx-4 md:my-0" href="{{ route('trending') }}">Trending</a>
                          <div class="form-check form-switch">
                            <input class="form-check-input appearance-none w-9 rounded-full float-left h-5 align-top bg-no-repeat bg-contain bg-gray-300 focus:outline-none cursor-pointer shadow-sm" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                          </div>
                      </div>
                      <div class="flex items-center py-2 -mx-1 md:mx-0">
                        @if(Auth::check())
                        <div class="dropdown relative">
                            <button type="button" class="dropdown-toggle focus:outline-none flex items-center hidden-arrow" href="#" id="dropdownMenuButton2" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="w-8 h-8 overflow-hidden border-2 border-gray-400 rounded-full">
                                    <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" class="object-cover w-full h-full" alt="avatar">
                                </div>
    
                                <h3 class="mx-2 text-sm font-medium text-gray-700 dark:text-gray-200 md:hidden">Khatab wedaa</h3>
                            </button>
                          <ul class="
                          dropdown-menu
                          min-w-max
                          absolute
                          bg-white
                          text-base
                          z-50
                          float-left
                          py-2
                          list-none
                          text-left
                          rounded-lg
                          shadow-lg
                          mt-1
                          hidden
                          m-0
                          bg-clip-padding
                          border-none
                          left-auto
                          right-0
                        " aria-labelledby="dropdownMenuButton2">
                            <li>
                              <a class="
                              dropdown-item
                              text-sm
                              py-2
                              px-4
                              font-normal
                              block
                              w-full
                              whitespace-nowrap
                              bg-transparent
                              text-gray-700
                              hover:bg-gray-100
                            " href="#">{{ Auth::user()->name }}</a>
                            </li>
                            <li>
                              <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                this.closest('form').submit();"
                                class="
                                dropdown-item
                                text-sm
                                py-2
                                px-4
                                font-normal
                                block
                                w-full
                                whitespace-nowrap
                                bg-transparent
                                text-gray-700
                                hover:bg-gray-100
                              ">Log Out</a>
                            </form>
                            </li>
                          </ul>
                        </div>
                        @else
                          <a class="block w-1/2 px-3 py-2 mx-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-200 transform bg-gray-500 rounded-md hover:bg-blue-600 md:mx-2 md:w-auto" href="{{ route('login') }}">Login</a>
                          <a class="block w-1/2 px-3 py-2 mx-1 text-sm font-medium leading-5 text-center text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-600 md:mx-0 md:w-auto whitespace-nowrap" href="{{ route('register') }}">Join free</a>
                        @endif
                      </div>
  
                      <!-- Search input on mobile screen -->
                      <div class="mt-3 md:hidden">
                          <div class="relative">
                              <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                  <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                      <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                  </svg>
                              </span>
  
                              <input type="text" class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300" placeholder="Search">
                          </div>
                      </div>
                  </div>
              </div>
  
              <div class="py-3 mt-3 -mx-3 overflow-y-auto whitespace-nowrap scroll-hidden">
                  @foreach ($categories as $category)
                  <a class="mx-4 text-sm leading-5 text-gray-700 transition-colors duration-200 transform dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 hover:underline md:my-0 uppercase" href="{{ url('?category='.$category->slug) }}">{{ $category->name }}</a>
                  @endforeach
              </div>
          </div>
      </nav>


      