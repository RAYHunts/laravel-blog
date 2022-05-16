<x-main>
    <x-navbar />
    <div class="mt-40">
        <div id="carouselExampleCaptionsFull" class="carousel slide carousel-fade relative h-screen" data-bs-ride="carousel">
            <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4">
                @foreach ($articles as $article)
                <button
                    type="button"
                    data-bs-target="#carouselExampleCaptionsFull"
                    data-bs-slide-to="{{ $loop->index }}"
                    class="{{ $loop->first ? 'active' : '' }}"
                    aria-current="true"
                    aria-label=" Slide {{ $loop->index }}"
                ></button>
                @endforeach
            </div>
            <div class="carousel-inner relative w-full overflow-hidden h-96">
                @foreach ($articles as $article)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="w-full h-80">
                        <img class="w-full h-full object-cover" src="{{ $article->image }}" alt="{{ $article->title }}">
                    </div>
                    <div class="carousel-caption absolute bottom-0 left-0 right-0 p-4 text-white text-center">
                        <h1 class="text-4xl font-bold">{{ $article->title }}</h1>
                    </div>
                </div>
                @endforeach
            </div>
            <button
              class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
              type="button"
              data-bs-target="#carouselExampleCaptionsFull"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon inline-block bg-no-repeat"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
              type="button"
              data-bs-target="#carouselExampleCaptionsFull"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon inline-block bg-no-repeat"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>

</x-main>