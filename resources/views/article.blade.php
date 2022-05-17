<x-main :title="__($article->title)" :description="__($article->excerpt)" :thumb="__($article->image)" :keywords="__($article->excerpt)">
    <x-navbar/>
    <main>
        <section class="mt-40 grid grid-cols-5 gap-3 px-3 lg:px-32 mb-12 place-items-center lg:place-items-start">
            <div class="flex flex-col container transition-all rounded bg-slate-200/5 backdrop-blur ease-in w-full h-max col-span-5 lg:col-span-3">
                <h1 class="p-3 dark:text-slate-400  text-slate-800 text-2xl font-monts font-black leading-relaxed">
                    {{ $article->title }}
                </h1>
                <div class="overflow-hidden w-full h-80">
                    <img class="object-cover w-full h-full hover:scale-110 transition-all duration-200 ease-linear" src="{{ asset('public/'.$article->image) }}" alt="{{ $article->caption }}">
                </div>
                <div class="bg-white dark:bg-gray-800 text-gray-600 h-full dark:text-gray-300 rounded-b p-6 flex flex-col gap-3">
                    <div>
                        <a class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform bg-gray-600 rounded cursor-pointer hover:bg-gray-500 uppercase">{{ $article->category->name }}</a>
                    </div>
                <article class="whitespace-pre-line text-justify leading-relaxed">{!! $article->content !!}
                </article>
                    <div class="flex items-center justify-end">
                    <a href="{{ url('?author='.$article->author->username) }}" class="font-semibold text-gray-700 dark:text-gray-200 flex gap-2 items-center">
                    <img class="object-cover h-10 rounded-full" src="https://images.unsplash.com/photo-1586287011575-a23134f797f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=48&q=60" alt="Avatar">
                        {{ $article->author->name }}
                    </a>
                    <span class="mx-1 text-xs text-gray-600 dark:text-gray-300 whitespace-nowrap">{{ $article->published_at->format('D, j M Y') }}</span>
                    </div>
                </div>
            </div>
            <x-trending/>
        </section>
    </main>
    <x-footer/>
</x-main>