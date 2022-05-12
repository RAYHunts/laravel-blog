<nav
  class="relative w-full flex flex-wrap items-center justify-between py-3 bg-gray-900 text-gray-200 shadow-lg navbar navbar-expand-lg navbar-light lg:px-32"
>
  <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
    <button
      class="navbar-toggler text-gray-200 border-0 hover:shadow-none hover:no-underline py-2 px-2.5 bg-transparent focus:outline-none focus:ring-0 focus:shadow-none focus:no-underline"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent1"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <svg
        aria-hidden="true"
        focusable="false"
        data-prefix="fas"
        data-icon="bars"
        class="w-6"
        role="img"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 448 512"
      >
        <path
          fill="currentColor"
          d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"
        ></path>
      </svg>
    </button>
    <div class="collapse navbar-collapse flex-grow items-center" id="navbarSupportedContent1">
      <a class="text-xl text-white pr-2 font-semibold" href="#">{{ env('APP_NAME') }}</a>
      {{-- <!-- Left links --> --}}
      <ul class="navbar-nav flex flex-col pl-0 list-style-none mr-auto">
        @foreach ($categories as $item)
        <li class="nav-item p-2">
          <a class="nav-link text-white" href="{{ url('?category',$item->slug) }}">{{ $item->name }}</a>
        </li>
        @endforeach
      </ul>
      {{-- <!-- Left links --> --}}
    </div>
    <!-- Collapsible wrapper -->

    {{-- <!-- Right elements --> --}}
    <div class="flex items-center relative justify-end ml-auto">
      {{-- <!-- Icon --> --}}
      <div class="dropdown relative">
        <a
          class="text-white opacity-60 hover:opacity-80 focus:opacity-80 mr-4 dropdown-toggle hidden-arrow flex items-center"
          href="#"
          id="dropdownMenuButton1"
          role="button"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          <svg
            aria-hidden="true"
            focusable="false"
            data-prefix="fas"
            data-icon="bell"
            class="w-4"
            role="img"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 448 512"
          >
            <path
              fill="currentColor"
              d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z"
            ></path>
          </svg>
          <span
            class="text-white bg-red-700 absolute rounded-full text-xs -mt-2.5 ml-2 py-0 px-1.5"
            >1</span
          >
        </a>
        <div
          class="dropdown-menu min-w-max absolute bg-white text-base z-50 float-left p-3 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none left-auto right-0"
          aria-labelledby="dropdownMenuButton1">
          <div class="input-group relative flex flex-wrap items-stretch w-full">
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
      {{-- <div class="dropdown relative">
          <div class="input-group relative flex flex-wrap items-stretch w-full">
            <input type="search" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon3">
            <button class="btn inline-block px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" type="button" id="button-addon3">Search</button>
          </div>
      </div> --}}
    </div>
    {{-- <!-- Right elements --> --}}
  </div>
</nav>