<x-main>
    <x-dash-nav/>
    <main class="overflow-hidden">
    <section class="lg:ml-64 lg:p-6 p-3 min-h-full transition-all duration-300 ease-in-out mt-16">
        <div class="flex flex-col justify-start w-full h-full col-span-3 lg:w-4/5">
                            
            <h1 class="p-3 dark:text-slate-400 text-slate-100 text-2xl font-monts font-black leading-relaxed">
                {{ $article->title }}
            </h1>
            <div class="rounded h-96" style="background-image: url(https://images.unsplash.com/photo-1616763355603-9755a640a287?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80)">
                <div class="flex items-end h-full p-6 bg-gray-900 bg-opacity-40">
                    <div>
                        <p class="max-w-xl mt-3 text-gray-300">{{ $article->caption }}</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 rounded-b p-6 flex flex-col gap-3">
                <div class="inline-flex" role="group">
                    <a class="rounded-l inline-block px-6 py-2.5 bg-indigo-600 text-white font-medium text-xs leading-tight uppercase hover:bg-indigo-700 focus:bg-indigo-700 focus:outline-none focus:ring-0 active:bg-indigo-800 transition duration-150 ease-in-out" href="{{ url()->previous() }}"><i class="fa-solid fa-angles-left"></i> Back to All Posts</a>
                    <a href="{{ url('dashboard/post/'. $article->slug) }}">
                        <button type="button" class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase hover:bg-green-700 focus:bg-green-700 focus:outline-none focus:ring-0 active:bg-green-800 transition duration-150 ease-in-out"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                    </a>
                    <button type="button" class="rounded-r inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase hover:bg-red-700 focus:bg-red-700 focus:outline-none focus:ring-0 active:bg-red-800 transition duration-150 ease-in-out"><i class="fa-solid fa-trash"></i> Delete</button>
                </div>
                <div>
                    <a class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform bg-gray-600 rounded cursor-pointer hover:bg-gray-500 uppercase">{{ $article->category->name }}</a>
                </div>
            <article class="whitespace-pre-line text-justify leading-relaxed">
                {{ $article->content }}
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
    </section>
    </main>
</x-main>
