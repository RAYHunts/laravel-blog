@if(!request()->has('page'))
    @if($trending->count() > 0)
        
<div class="flex gap-3 flex-col bg-black/30 rounded-md justify-start backdrop-blur-sm p-6 col-span-5 lg:col-span-2 lg:order-3 container h-max">
    <div>
        <div
  id="carouselExampleCrossfade"
  class="carousel slide carousel-fade relative"
  data-bs-ride="carousel"
>
  <div class="carousel-inner relative w-full overflow-hidden">
    <div class="carousel-item active float-left w-full">
      <img
        src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp"
        class="block w-full"
        alt="Wild Landscape"
      />
    </div>
    <div class="carousel-item float-left w-full">
      <img
        src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp"
        class="block w-full"
        alt="Camera"
      />
    </div>
    <div class="carousel-item float-left w-full">
      <img
        src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp"
        class="block w-full"
        alt="Exotic Fruits"
      />
    </div>
  </div>
  
    
</div>
    </div>
    <div class=" py-4 font-bold text-3xl text-slate-700 dark:text-slate-400">
        <h1>Trendings <i class="fa-solid fa-arrow-trend-up"></i></h1>
    </div>
        @foreach ($trending as $article)
            <div class="px-8 py-4 bg-white rounded-lg shadow-md dark:bg-gray-800 ">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-light text-gray-600 dark:text-gray-400">{{ $article->published_at->format('D, j M Y') }}</span>
                    <a  href="{{ url('?category='.$article->category->slug) }}" class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform bg-gray-600 rounded cursor-pointer hover:bg-gray-500 uppercase">{{ $article->category->name }}</a>
                </div>
                <div class="mt-2">
                    <a href="{{ route('article',$article->slug) }}" class="text-2xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 hover:underline line-clamp-1">{{ $article->title }}</a>
                </div>
                <div class="flex items-center justify-between mt-4">
                    <a href="{{ route('article',$article->slug) }}" class="text-blue-600 dark:text-blue-400 hover:underline">Read more</a>
                    <div class="flex items-center">
                    <img class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block" src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=40&q=80" alt="avatar">
                    <a class="font-bold text-gray-700 cursor-pointer dark:text-gray-200">{{ $article->author->name }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif
@endif