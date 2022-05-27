<nav class="fixed top-0 bg-white shadow dark:bg-gray-800 border-b border-slate-200 dark:border-slate-600 z-30 w-full">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 -mb-px">
            <div class="flex items-center gap-3">
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
                <div class="text-xl font-black text-slate-900 dark:text-slate-500">
                    {{ config('app.name') }}
                </div>
            </div>
            <div class="flex items-center">
                <button type="button" class="w-8 h-8  items-center justify-center bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:text-gray-200 text-gray-700 transition duration-150 rounded-full false" data-toggle="toggle-dark"><i class="fa-solid fa-moon"></i></button>
                <hr class="w-px h-6 bg-slate-200 mx-3" />
                <div class="dropdown relative">
                    <button type="button" class="dropdown-toggle focus:outline-none flex items-center hidden-arrow" href="#" id="dropdownMenuButton2" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="w-8 h-8 overflow-hidden rounded-full">
                            <img src="{{ asset('storage/'.Auth::user()->image) }}" class="object-cover w-full h-full" alt="avatar">
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
    id="sidebar">
    <div>
        <h3>Author</h3>
        <ul>
                <x-side-item
                    :href="route('dashboard')"
                    icon="fa-solid fa-objects-column"
                    :active="Route::is('dashboard')">
                    Dashboard
                </x-side-item>
                <x-side-item
                    :href="route('article.index')"
                    icon="fa-solid fa-file"
                    :active="Route::is('article*')">
                    Posts
                </x-side-item>
                <x-side-item 
                    href="{{ route('profile') }}"
                    icon="fa-solid fa-user"
                    :active="Route::is('profile')">
                    Profile
                </x-side-item>
            </ul>
        @can('admin')
        <h3>Admin</h3>
        <ul>
            <x-side-item 
                href="{{ route('users.index') }}" 
                icon="fa-solid fa-users" 
                :active="Route::is('users*')">
                Users
            </x-side-item>
            <x-side-item 
                href="{{ route('all_articles') }}" 
                icon="fa-solid fa-copy" 
                :active="Route::is('all_articles')">
                All Posts
            </x-side-item>
            <x-side-item 
                href="{{ route('category.index') }}" 
                icon="fa-solid fa-folder" 
                :active="Route::is('category.index')">
                Categories
            </x-side-item>
            <x-side-item 
                href="{{ url('/') }}" 
                icon="fa-solid fa-rectangle-ad" 
                :active="Route::is('category.index')">
                Adverticements
            </x-side-item>
        </ul>
        @endcan
        @can('developer')
        <h3>Developer</h3>
        <ul>
            <x-side-item 
                href="{{ url('/') }}" 
                icon="fa-solid fa-browser" >
                Developer
            </x-side-item>
            <x-side-item 
                href="{{ url('/') }}" 
                icon="fa-solid fa-database">
                Migration
            </x-side-item>
        </ul>
        @endcan
    </div>
</aside>