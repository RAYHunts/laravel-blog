<x-main-layout>
<x-navbar>
    <x-slot :name="__('brand')">
        <a class="navbar-brand text-white" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </x-slot>
    <x-slot name=leftlinks>
      @foreach ($categories as $category)
      <li class="nav-item p-2">
          <a class="nav-link text-white" href="{{ url('?category='. $category->slug) }}">{{ $category->name }}</a>
      </li>
      @endforeach
    </x-slot>
    <x-slot name=rightlinks>
      <div class="dropdown relative">
        <a
          class="text-white opacity-60 hover:opacity-80 focus:opacity-80 mr-4 dropdown-toggle hidden-arrow flex items-center"
          href="#"
          id="dropdownMenuButton1"
          role="button"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          {{-- font awesome search icon --}}
          <i class="fa-solid fa-magnifying-glass fa-lg"></i>
        </a>
        <div
          class="dropdown-menu min-w-max absolute bg-white text-base z-50 p-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none left-0"
          aria-labelledby="dropdownMenuButton1"
        >
            <form action="{{ url('/') }}" method="get">
              @if(request()->has('category'))
              <input type="hidden" name="category" value="{{ request()->get('category') }}">
              @endif
              @if(request()->has('author'))
              <input type="hidden" name="author" value="{{ request()->get('author') }}">
              @endif
              <div class="input-group relative flex flex-wrap items-stretch w-full">
                <input type="search" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon3" name="search" value="{{ request('search') }}">
                <button class="btn inline-block px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" type="submit" id="button-addon3">Search</button>
              </div>
            </form>
          </div>
      </div>
      <div class="dropdown relative">
        <a
          class="dropdown-toggle flex items-center hidden-arrow"
          href="#"
          id="dropdownMenuButton2"
          role="button"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          <img
            src="https://mdbootstrap.com/img/new/avatars/2.jpg"
            class="rounded-full"
            style="height: 25px; width: 25px"
            alt=""
            loading="lazy"
          />
        </a>
        <ul
          class="dropdown-menu min-w-max absolute bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none left-auto right-0"
          aria-labelledby="dropdownMenuButton2"
        >
          <li>
            <a
              class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"
              href="#"
              >Action</a
            >
          </li>
          <li>
            <a
              class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"
              href="#"
              >Another action</a
            >
          </li>
          <li>
            <a
              class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"
              href="#"
              >Something else here</a
            >
          </li>
        </ul>
      </div>
    </x-slot>
</x-navbar>
<main>
  {{-- articles --}}
  <section class="flex gap-3 flex-wrap items-start justify-center px-3 lg:mx-32 flex-col lg:flex-row mt">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 w-full place-content-center">
      @foreach ($articles as $article)
        
      <div class="max-w-sm w-full mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
        <img class="object-cover object-center w-full h-56" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" alt="avatar">
        
        <div class="flex items-center text-white px-6 py-3 bg-gray-900 justify-between">
          <div class="flex items-center">
            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M17 21C15.8954 21 15 20.1046 15 19V15C15 13.8954 15.8954 13 17 13H19V12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12V13H7C8.10457 13 9 13.8954 9 15V19C9 20.1046 8.10457 21 7 21H3V12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12V21H17ZM19 15H17V19H19V15ZM7 15H5V19H7V15Z"/>
            </svg>
            <h1 class="mx-3 text-lg font-semibold ">{{ $article->category->name }}</h1>
          </div>
            <h1 class="px-2 text-sm">{{ $article->published_at->diffForHumans() }}</h1>
        </div>

        <div class="px-6 py-4">
            <h1 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $article->title }}</h1>

            <p class="py-2 text-gray-700 dark:text-gray-400">{{ $article->excerpt }}</p>
          <div class="flex float-right py-3 items-center text-gray-700 dark:text-gray-200">
              <h1 class="text-sm">by <a href="{{ url('?author?'.$article->author->username) }}">{{ $article->author->name }}</a></h1>
          </div>
        </div>
    </div>
      @endforeach
    </div>
    {{-- <div class="w-full lg:w-1/5 flex justify-center gap-3 flex-col">
      @foreach ($advs as $adv)
        <div class="flex justify-center flex-col gap-3">
          <div class="rounded-lg shadow-lg overflow-clip bg-white max-w-sm">
            <a href="{{ $adv->link  }}" data-mdb-ripple="true" data-mdb-ripple-color="light">
              <img class="w-full hover:scale-110 transition duration-300 ease-in-out" src="{{ $adv->image }}" alt=""/>
            </a>
            <div class="p-6">
              <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $adv->title }}</h5>
            </div>
          </div>
        </div>
      @endforeach
    </div> --}}
    <div class="w-full">
      {{ $articles->links() }}
    </div>
  </section>
</main>
<x-footer/>
</x-main-layout>
