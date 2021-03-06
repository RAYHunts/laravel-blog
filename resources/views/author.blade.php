@extends('layouts.main')

@section('content')
@include('partials.navbar')
<main>
  {{-- articles --}}
  <section class="flex gap-3 justify-center px-3 lg:mx-32 flex-col lg:flex-row">
    <div class="inline-flex flex-wrap justify-center flex-row gap-3 w-full lg:w-3/4 h-full">
      @foreach ($articles as $article)
        <div class="inline-flex relative grow-0 max-h-max justify-center">
          <div class="rounded-lg shadow-lg overflow-clip bg-white max-w-sm max-h-max">
            <div class="overflow-clip bg-white max-w-sm max-h-max">
              <div class="relative overflow-hidden bg-no-repeat bg-cover ripple" style="background-position: 50%" data-mdb-ripple="true" data-mdb-ripple-color="light">
                <a href="{{ url('article/'.$article->slug) }}">
                  <img src="{{-- $article->image --}}https://mdbootstrap.com/img/new/standard/city/079.jpg" class="w-full hover:scale-110 transition duration-200 ease-in" alt="Louvre">
                </a>
              </div>
            </div>
            <div class="p-6">
              <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $article->title }}</h5>
              <a class="text-red-600 text-base font-semibold mb-4 flex items-center uppercase" href="{{ url('category/'.$article->category->slug) }}">
                {{-- <i class="fa-brands fa-{{ $article->category->slug }} mr-1"></i> --}}
                  {{ $article->category->name ?? 'No category' }}
              </a>
              <p class="text-gray-700 text-base mb-4 line-clamp-4">
                {{ $article['excerpt'] }}
              </p>
              <span>
                <i class="fa-solid fa-clock mr-1"></i>
                {{ $article->updated_at->diffForHumans() }}
                by 
                <a href="{{ url('author/'.$article->author->username) }}" class="font-semibold text-gray-800">
                    {{ $article->author->name }}
                </a>
              </span>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="w-full lg:w-1/4 inline-flex  gap-3 flex-col">
      @foreach ($articles_all as $article)
        <div class="flex justify-center flex-col gap-3">
          <div class="rounded-lg shadow-lg overflow-clip bg-white max-w-sm">
            <a href="{{ url('article/'. $article->slug)  }}" data-mdb-ripple="true" data-mdb-ripple-color="light">
              <img class="w-full hover:scale-110 transition duration-300 ease-in-out" src="{{ $article->image }}" alt=""/>
            </a>
            <div class="p-6">
              <h5 class="text-gray-900 text-xl font-medium mb-2">{{ $article->title }}</h5>
              <div class="text-red-600 text-sm mb-4 flex items-center font-medium">
                <i class="fa-brands fa-{{ $article->category->slug }} mr-1"></i>
                {{ $article->category->name ?? 'No category' }}
              </div>
              <span>
                {{ $article->author->name }}
              </span>
              <p class="text-gray-700 text-base mb-4">
                {{ $article->excerpt }}
              </p>
              <div class="flex space-x-2 justify-center">
                {{-- <span>{{ $article->published_at->format('Y-m-d') }}</span> --}}
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </section>
</main>
@endsection
