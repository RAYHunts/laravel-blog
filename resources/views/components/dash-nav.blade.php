

        <nav class="fixed top-0 bg-white shadow dark:bg-gray-800 border-b border-slate-200 dark:border-slate-600 z-30 w-full">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16 -mb-px">
                    <div class="flex items-center">
                        <button
                            class="text-slate-500 hover:text-slate-600 lg:hidden"
                            aria-controls="sidebar"
                            aria-expanded="false" id="expand">
                            <span class="sr-only">Open sidebar</span
                            ><svg
                                class="w-6 h-6 fill-current"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <rect x="4" y="5" width="16" height="2"></rect>
                                <rect x="4" y="11" width="16" height="2"></rect>
                                <rect x="4" y="17" width="16" height="2"></rect>
                            </svg>
                        </button>
                        <a href="{{ route('home') }}">
                            <x-application-logo class="w-12"/>
                        </a>
                    </div>
                    <div class="flex items-center">
                        <button type="button" class="w-8 h-8  items-center justify-center bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:text-gray-200 text-gray-700 transition duration-150 rounded-full false" data-toggle="toggle-dark"><i class="fa-solid fa-moon"></i></button>
                        <hr class="w-px h-6 bg-slate-200 mx-3" />
                        <div class="dropdown relative">
                            <button type="button" class="dropdown-toggle focus:outline-none flex items-center hidden-arrow" href="#" id="dropdownMenuButton2" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="w-8 h-8 overflow-hidden border-2 border-gray-400 rounded-full">
                                    <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" class="object-cover w-full h-full" alt="avatar">
                                </div>
                                <h3 class="mx-2 text-sm font-medium text-gray-700 dark:text-gray-200 hidden md:block">{{ Auth::user()->name }}</h3>
                            </button>
                          <ul class="dropdown-menu min-w-max absolute bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none left-auto right-0" aria-labelledby="dropdownMenuButton2">
                            <li>
                              <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-slate-500 hover:text-white" href="#">{{ Auth::user()->name }}</a>
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
                                hover:bg-slate-500
                                hover:text-white
                              ">Log Out</a>
                            </form>
                            </li>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <aside
            id="sidebar"
            class="flex flex-col fixed z-20 left-0 top-0 lg:translate-x-0 transform h-screen w-64 shrink-0  p-4 transition-all duration-200 ease-in-out -translate-x-64 bg-white shadow dark:bg-gray-800">
                <button
                    class="lg:hidden text-slate-500 hover:text-slate-400"
                    aria-controls="sidebar"
                    aria-expanded="false" id="expand">
                    <span class="sr-only">Close sidebar</span
                    ><svg
                        class="w-6 h-6 fill-current"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"
                        ></path>
                    </svg></button
                >
                <a href="{{ route('home') }}">
                    <x-application-logo class="w-24"/>
                </a>
            </div>
            <div class="flex flex-col gap-2 dark:text-slate-300 text-sm mt-9">
                <h3 class="text-xs uppercase text-slate-500 font-semibold border-b-2 border-slate-500 pb-3">Author</h3>
                <ul>
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0  {{ Route::is('dashboard') ? 'bg-slate-900 dark:bg-slate-400 dark:text-slate-800 text-slate-300 font-semibold' : '' }} hover:bg-slate-900 dark:hover:bg-slate-400 transition-all duration-300 ease-in-out dark:hover:text-slate-800 hover:text-slate-300"
                        >
                            <a href="{{ route('dashboard') }}"
                                ><div class="flex items-center">
                                    <i class="fa-solid fa-gauge-high"></i>
                                    <span class="ml-3">Dashboard</span>
                                </div></a
                            >
                        </li>
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0  {{ Route::is('article*') ? 'bg-slate-900 dark:bg-slate-400 dark:text-slate-800 text-slate-300 font-semibold' : '' }} hover:bg-slate-900 dark:hover:bg-slate-400 transition-all duration-300 ease-in-out dark:hover:text-slate-800 hover:text-slate-300"
                        >
                            <a href="{{ route('article.index') }}">
                                <div class="flex items-center">
                                  <i class="fa-solid fa-file"></i>
                                    <span class="ml-3">Post</span>
                                </div>
                        </a>
                        </li>
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0  {{ Route::is('profile') ? 'bg-slate-900 dark:bg-slate-400 dark:text-slate-800 text-slate-300 font-semibold' : '' }} hover:bg-slate-900 dark:hover:bg-slate-400 transition-all duration-300 ease-in-out dark:hover:text-slate-800 hover:text-slate-300"
                        >
                            <a href="{{ route('profile') }}">
                                <div class="flex items-center">
                                  <i class="fa-solid fa-user"></i>
                                    <span class="ml-3">Profile</span>
                                </div>
                        </a>
                        </li>
                    </ul>
                    @can('admin')
                    <h3 class="text-xs uppercase text-slate-500 font-semibold border-b-2 border-slate-500 pb-3">Admin</h3>
                <ul>
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0  {{ Route::is('category.index') ? 'bg-slate-900 dark:bg-slate-400 dark:text-slate-800 text-slate-300 font-semibold' : '' }} hover:bg-slate-900 dark:hover:bg-slate-400 transition-all duration-300 ease-in-out dark:hover:text-slate-800 hover:text-slate-300"
                        >
                            <a href="{{ route('category.index') }}"
                                ><div class="flex items-center">
                                    <i class="fa-solid fa-gauge-high"></i>
                                    <span class="ml-3">Categories</span>
                                </div></a
                            >
                        </li>
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0  {{ Route::is('all_articles') ? 'bg-slate-900 dark:bg-slate-400 dark:text-slate-800 text-slate-300 font-semibold' : '' }} hover:bg-slate-900 dark:hover:bg-slate-400 transition-all duration-300 ease-in-out dark:hover:text-slate-800 hover:text-slate-300"
                        >
                            <a href="{{ route('all_articles') }}">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-paste"></i>
                                    <span class="ml-3">All Post</span>
                                </div>
                        </a>
                        </li>
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0  {{ Route::is('article*') ? 'bg-slate-900 dark:bg-slate-400 dark:text-slate-800 text-slate-300 font-semibold' : '' }} hover:bg-slate-900 dark:hover:bg-slate-400 transition-all duration-300 ease-in-out dark:hover:text-slate-800 hover:text-slate-300"
                        >
                            <a href="{{ route('article.index') }}">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-rectangle-ad"></i>
                                    <span class="ml-3">Advertisement</span>
                                </div>
                        </a>
                        </li>
                        <li
                            class="px-3 py-2 rounded-sm mb-0.5 last:mb-0  {{ Route::is('users*') ? 'bg-slate-900 dark:bg-slate-400 dark:text-slate-800 text-slate-300 font-semibold' : '' }} hover:bg-slate-900 dark:hover:bg-slate-400 transition-all duration-300 ease-in-out dark:hover:text-slate-800 hover:text-slate-300"
                        >
                            <a href="{{ route('users.index') }}">
                                <div class="flex items-center">
                                  <i class="fa-solid fa-circle-user"></i>
                                    <span class="ml-3">Users</span>
                                </div>
                        </a>
                        </li>
                    </ul>
                    @endcan
                    @can('developer')
                    <h3 class="text-xs uppercase text-slate-500 font-semibold border-b-2 border-slate-500 pb-3">Developer</h3>
                    <ul>

                      <li
                      class="px-3 py-2 rounded-sm mb-0.5 last:mb-0  {{ Route::is('article*') ? 'bg-slate-900 dark:bg-slate-400 dark:text-slate-800 text-slate-300 font-semibold' : '' }} hover:bg-slate-900 dark:hover:bg-slate-400 transition-all duration-300 ease-in-out dark:hover:text-slate-800 hover:text-slate-300"
                        >
                            <a href="{{ route('article.index') }}">
                                <div class="flex items-center">
                                  <i class="fa-solid fa-browser"></i>
                                    <span class="ml-3">Website</span>
                                  </div>
                                </a>
                              </li>
                    </ul>
                    @endcan
      </div>
    </aside>