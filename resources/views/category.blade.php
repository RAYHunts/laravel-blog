@extends('layouts.main')

@section('content')
@include('partials.navbar')
<main>
  {{-- articles --}}
  <section class="flex gap-3 mt-32 justify-center px-3 lg:mx-32 flex-col lg:flex-row">
    <div class="inline-flex flex-wrap justify-center flex-row gap-3 w-full lg:w-3/4 h-full">
      @foreach ($articles as $article)
        <div class="inline-flex relative grow-0 max-h-max justify-center">
          <div class="rounded-lg shadow-lg overflow-clip bg-white max-w-sm max-h-max">
            <div class="overflow-clip bg-white max-w-sm max-h-max">
              <div class="relative overflow-hidden bg-no-repeat bg-cover ripple" style="background-position: 50%" data-mdb-ripple="true" data-mdb-ripple-color="light">
                <a href="{{ url('article/'.$article->slug) }}">
                  <img src="{{ $article->image }}" class="w-full hover:scale-110 transition duration-200 ease-in" alt="Louvre">
                </a>
              </div>
            </div>
            <div class="p-6">
              <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $article->title }}</h5>
              <div class="text-red-600 text-sm mb-4 flex items-center font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-4 h-4 mr-2">
                  <path fill="currentColor" d="M608 64H32C14.33 64 0 78.33 0 96v320c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V96c0-17.67-14.33-32-32-32zM48 400v-64c35.35 0 64 28.65 64 64H48zm0-224v-64h64c0 35.35-28.65 64-64 64zm272 176c-44.19 0-80-42.99-80-96 0-53.02 35.82-96 80-96s80 42.98 80 96c0 53.03-35.83 96-80 96zm272 48h-64c0-35.35 28.65-64 64-64v64zm0-224c-35.35 0-64-28.65-64-64h64v64z"></path>
                </svg>
                {{ $article->category->name ?? 'No category' }}
              </div>
              <p class="text-gray-700 text-base mb-4 line-clamp-4">
                {{ $article->excerpt }}
              </p>
              <div class="flex space-x-2 justify-center">
                <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-600 hover:shadow-lg focus:bg-blue-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out items-center">
                  {{ $article->category->name ?? 'Business' }}
                  <span class="inline-block py-1 px-1.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded ml-2">7</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="w-full lg:w-1/4 inline-flex  gap-3 flex-col">
      @foreach ($articles as $article)
        <div class="flex justify-center">
          <div class="rounded-lg shadow-lg overflow-clip bg-white max-w-sm">
            <a href="{{ url('article/'. $article->slug)  }}" data-mdb-ripple="true" data-mdb-ripple-color="light">
              <img class="w-full hover:scale-110 transition duration-300 ease-in-out" src="{{ $article->image }}" alt=""/>
            </a>
            <div class="p-6">
              <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $article['title'] }}</h5>
              <div class="text-red-600 text-sm mb-4 flex items-center font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-4 h-4 mr-2">
                  <path fill="currentColor" d="M608 64H32C14.33 64 0 78.33 0 96v320c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V96c0-17.67-14.33-32-32-32zM48 400v-64c35.35 0 64 28.65 64 64H48zm0-224v-64h64c0 35.35-28.65 64-64 64zm272 176c-44.19 0-80-42.99-80-96 0-53.02 35.82-96 80-96s80 42.98 80 96c0 53.03-35.83 96-80 96zm272 48h-64c0-35.35 28.65-64 64-64v64zm0-224c-35.35 0-64-28.65-64-64h64v64z"></path>
                </svg>
                Business
              </div>
              <p class="text-gray-700 text-base mb-4">
                {{ $article->excerpt }}
              </p>
              <div class="flex space-x-2 justify-center">
                <button type="button" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-600 hover:shadow-lg focus:bg-blue-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out items-center">
                  {{ $article->category->name ?? 'Business' }}
                  <span class="inline-block py-1 px-1.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-red-600 text-white rounded ml-2">7</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </section>
</main>
@endsection
