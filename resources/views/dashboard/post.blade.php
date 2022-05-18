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
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @if(count($articles) > 0)
        <table class="flex flex-col rounded-md overflow-x-scroll text-center shadow-sm shadow-slate-900/50 scroll-beautify">
          <thead class="border-b bg-gray-800 border-gray-900 text-slate-300 relative w-full min-w-max">
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
                Status
              </th>
              <th scope="col" class="text-sm font-medium px-6 py-4 w-48">
                Action
              </th>
            </tr>
          </thead>
          <tbody class="w-full min-w-max h-[70vh] overflow-y-scroll scroll-y-beautify ">
              @foreach ($articles as $article)
            <tr class="odd:bg-gray-50 bg-slate-400 w-full flex justify-between items-center py-2">
              <td class="text-gray-900 font-medium px-6 w-12">
                {{ $loop->iteration }}
              </td>
              <td class="text-gray-900 font-light px-6 w-48">
                {{ $article->title }}
              </td>
              <td class="text-gray-900 font-light px-6uppercase w-48">
                {{ $article->category->name }}
              </td>
              <td class="text-gray-900 font-light px-6 w-48">
                  {{ $article->views }}
              </td>
              <td class="text-gray-900 font-light px-6 w-48">
                @if($article->status == 'published')
                <form method="POST" action="{{ route('article.takedown',$article->slug) }}">
                  @csrf
                <a href="{{ route('article.takedown',$article->slug) }}" onclick="event.preventDefault();
                this.closest('form').submit();" class="inline-block rounded-sm px-6 py-2.5 bg-indigo-600 text-white font-medium text-xs leading-tight uppercase hover:bg-indigo-700 focus:bg-indigo-700 focus:outline-none focus:ring-0 active:bg-indigo-800 transition duration-150 ease-in-out">Published</a>
            </form>
                @else
                <form method="POST" action="{{ route('article.publish',$article->slug) }}">
                    @csrf
                    <a href="{{ route('article.publish',$article->slug) }}" onclick="event.preventDefault();
                  this.closest('form').submit();" class="inline-block rounded-sm px-6 py-2.5 bg-yellow-600 text-white font-medium text-xs leading-tight uppercase hover:bg-yellow-700 focus:bg-yellow-700 focus:outline-none focus:ring-0 active:bg-yellow-800 transition duration-150 ease-in-out">Draft</a>
              </form>
                @endif
              </td>
              <td class="text-sm text-gray-900 font-light px-6 whitespace-nowrap text-center w-48">
                  <div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg rounded overflow-clip" role="group">
                      <a href="{{ route('article.edit',$article->slug) }}" type="button" class="inline-block px-6 py-2.5 bg-indigo-600 text-white font-medium text-xs leading-tight uppercase hover:bg-indigo-700 focus:bg-indigo-700 focus:outline-none focus:ring-0 active:bg-indigo-800 transition duration-150 ease-in-out"><i class="fa-solid fa-pen-to-square"></i></a>
                      <form action="{{ route('article.destroy',$article->slug) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('article.destroy',$article->slug) }}" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase hover:bg-red-700 focus:bg-red-700 focus:outline-none focus:ring-0 active:bg-red-800 transition duration-150 ease-in-out" onclick="event.preventDefault();
                          this.closest('form').submit();"><i class="fa-solid fa-trash"></i></a>
                      </form>
                  </div>
              </td>
            </tr>
              @endforeach
          </tbody>
        </table>
        @else
        <div class="flex flex-col w-full rounded-md overflow-hidden shadow-sm shadow-slate-900/50">
            <div class="flex justify-center items-center h-[80vh]">
                <div class="text-center dark:text-gray-400 text-red-700  px-6 py-4 whitespace-nowrap uppercase w-48 font-bold">
                    No Articles
                </div>
            </div>
        </div>
        @endif
    </section>
    </main>
</x-main>
