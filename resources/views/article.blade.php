@extends('layouts.main')

@section('content')
@include('partials.navbar')
  <main>
  <section class="mb-32 mt-32 text-gray-800 px-32">
    <h2 class="text-2xl font-bold mb-12 text-center">Latest articles</h2>
    <div class="flex flex-wrap odd:lg:flex-row-reverse mb-12">
      <div class="grow-0 shrink-0 basis-auto w-full lg:w-6/12 lg:pr-6 mb-6 lg:mb-0">
          <div class="relative overflow-hidden bg-no-repeat bg-cover ripple shadow-lg rounded-lg" style="background-position: 50%" data-mdb-ripple="true" data-mdb-ripple-color="light">
            <img src="https://mdbootstrap.com/img/new/standard/city/079.jpg" class="w-full hover:scale-110 transition duration-300 ease-in-out" alt="Louvre">
            <a href="#!">
              <div class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed opacity-0 hover:opacity-100 transition duration-300 ease-in-out" style="background-color: rgba(251, 251, 251, 0.2)"></div>
            </a>
          </div>
        </div>
        <div class="grow-0 shrink-0 basis-auto w-full lg:w-6/12 lg:pl-6">
          <h3 class="text-2xl font-bold mb-4">{{ $article->title }}</h3>
          
          <div class="text-red-600 text-sm mb-4 flex items-center font-medium">
            <i class="fa-brands fa-{{ $article->category->slug }} mr-2"></i>
            <span class="mr-2">{{ $article->category->name }}</span>
          </div>
          <article class="text-gray-500">
            {{ $article->content }}
          </article>
          {{-- <span>{{ $article->published_at->format('d/m/Y') }}</span> --}}
        </div>
      </div>
      
    </section>
  </main> 
@endsection
