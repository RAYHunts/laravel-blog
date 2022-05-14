<nav class="navbar navbar-expand-lg shadow-md py-3 px-6 md:px-32 bg-white flex items-center w-full justify-between fixed-top">
    <div class="px-6 w-full flex flex-wrap items-center gap-3 justify-between">
      <div class="flex items-center">
        <button
          class="navbar-toggler border-0 py-3 lg:hidden leading-none text-xl bg-transparent text-gray-600 hover:text-gray-700 focus:text-gray-700 transition-shadow duration-150 ease-in-out mr-2"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContentY"
          aria-controls="navbarSupportedContentY"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <svg
            aria-hidden="true"
            focusable="false"
            data-prefix="fas"
            class="w-5"
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
        <a class="navbar-brand text-blue-600" href="{{ url('/') }}">
          <img src="https://www.beritakata.id/img/logoberita.jpeg" class="w-24" alt="">
        </a>
      </div>
      <div class="navbar-collapse collapse grow items-center" id="navbarSupportedContentY">
        <ul class="navbar-nav mr-auto lg:flex lg:flex-row gap-3">
          @if(isset($categories))
          @foreach($categories as $category)
          <li class="nav-item hover:bg-blue-700 text-blue-600 font-semibold uppercase hover:text-white p-3">
            <a class="nav-link " href="{{ url('?category='.$category->slug) }}">
              {{ $category->name }}
            </a>
          </li>
          @endforeach
          <li class="nav-item hover:bg-blue-700 text-blue-600 font-semibold hover:text-white p-3">
            <a class="nav-link " href="{{ url('?sort=popular') }}">
              <i class="fa-solid fa-arrow-trend-up"></i>
              Popular
            </a>
          </li>
          <li class="nav-item hover:bg-blue-700 text-blue-600 font-semibold hover:text-white p-3">
            <a class="nav-link " href="{{ url('?sort=oldest') }}">
              <i class="fa-solid fa-arrow-trend-down"></i>
              Oldest
            </a>
          </li>
          @endif
        </ul>
      </div>
      <div class="flex items-center justify-center">
        <div class="lg:w-96">
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
  </nav>