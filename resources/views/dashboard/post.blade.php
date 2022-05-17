<x-main>
    <x-dash-nav/>
    <main class="overflow-hidden">
    <section class="lg:ml-64 lg:p-6 p-3 min-h-full transition-all duration-300 ease-in-out mt-16">
        <div class="p-3 flex justify-between">
            <h1 class="text-2xl font-bold text-slate-800 dark:text-slate-400">Your Articles</h1>
            
                <a href="{{ route('article.create') }}" 
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    <i class="fa-solid fa-plus mr-2"></i>
                    New Article
                </a>
        </div>
        <table class="flex flex-col w-full rounded-md overflow-hidden text-center shadow-sm shadow-slate-900/50">
          <thead class="border-b bg-gray-800 border-gray-900 text-slate-300 relative pr-2">
            <tr class="flex justify-between">
              <th scope="col" class="text-sm font-medium px-6 py-4 w-12">
                No.
              </th>
              <th scope="col" class="text-sm font-medium px-6 py-4 w-48">
                Title
              </th>
              <th scope="col" class="text-sm font-medium px-6 py-4 w-48">
                Category
              </th>
              <th scope="col" class="text-sm font-medium px-6 py-4 w-48">
                Views
              </th>
              <th scope="col" class="text-sm font-medium px-6 py-4 w-48">
                Action
              </th>
            </tr>
          </thead>
          <tbody class="overflow-y-scroll w-full h-[70vh] scroll-y-beautify">
              @foreach ($articles as $article)
            <tr class="odd:bg-gray-50 bg-slate-400 w-full flex justify-between items-center">
              <td class="text-sm text-gray-900 font-medium px-6 py-4 w-12">
                {{ $loop->iteration }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap uppercase w-48">
                {{ $article->title }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap uppercase w-48">
                {{ $article->category->name }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap uppercase w-48">
                  {{ $article->views }}
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center w-48">
                  <div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg rounded overflow-clip" role="group">
                      <button type="button" class="inline-block px-6 py-2.5 bg-indigo-600 text-white font-medium text-xs leading-tight uppercase hover:bg-indigo-700 focus:bg-indigo-700 focus:outline-none focus:ring-0 active:bg-indigo-800 transition duration-150 ease-in-out"><i class="fa-solid fa-pen-to-square"></i></button>
                      <form action="{{ route('category.destroy',$article->slug) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase hover:bg-red-700 focus:bg-red-700 focus:outline-none focus:ring-0 active:bg-red-800 transition duration-150 ease-in-out" data-bs-toggle="tooltip" data-bs-placement="right" title="Delete"><i class="fa-solid fa-trash"></i></button>
                      </form>
                  </div>
              </td>
            </tr>
              @endforeach
          </tbody>
        </table>
    </section>
    </main>
</x-main>
