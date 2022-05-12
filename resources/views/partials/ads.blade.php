
<div class="w-full lg:w-1/5 flex justify-center gap-3 flex-col">
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
  </div>