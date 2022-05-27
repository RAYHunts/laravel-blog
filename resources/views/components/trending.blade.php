@if(!request()->has('page'))
    @if($trending->count() > 0)
        
<div class="flex gap-3 flex-col bg-black/30 rounded-md justify-start backdrop-blur-sm p-6 col-span-5 lg:col-span-2 lg:order-3 container h-max">
    <div>
        <div
  id="carouselExampleCrossfade"
  class="carousel slide carousel-fade relative"
  data-bs-ride="carousel"
>
  <div class="carousel-inner relative w-full overflow-hidden rounded">
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
    <ul>
      @foreach ($trending as $article)
      <li class="px-2 border-b">
        <a href="{{ route('article.show', $article->slug) }}" class="text-lg text-slate-700 dark:text-slate-400 line-clamp-2">
          {{ $article->title }}
        </a>
      </li>
      @endforeach
    </ul>
  </div>
    @endif
@endif