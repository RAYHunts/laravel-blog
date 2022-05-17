<x-main>
    <x-dash-nav/>
    <main class="overflow-hidden">
        <section class="lg:ml-64 lg:p-6 p-3 min-h-full transition-all duration-300 ease-in-out mt-16">
            <div class="p-3 flex justify-between">
              <h1 class="text-2xl font-bold text-slate-800 dark:text-slate-400">Categories</h1>
                
                {{-- <button type="button"
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">
                New Category
              </button> --}}
              <form action="{{ route('category.store') }}" method="post">
              <div class="input-group relative flex flex-wrap items-stretch w-64">
                  @csrf
                  <input type="text" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="New Category" name="name">
                  <button class="btn px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="submit">
                    {{-- font awesome plus icon --}}
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </form>
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
            @if(count($categories) > 0)
                      <table class="flex flex-col w-full rounded-md overflow-hidden text-center shadow-sm shadow-slate-900/50">
                        <thead class="border-b bg-gray-800 border-gray-900 text-slate-300 relative pr-2">
                          <tr class="flex justify-between">
                            <th scope="col" class="text-sm font-medium px-6 py-4 w-12">
                              No.
                            </th>
                            <th scope="col" class="text-sm font-medium px-6 py-4 w-48">
                              Name
                            </th>
                            <th scope="col" class="text-sm font-medium px-6 py-4 w-48">
                              Articles
                            </th>
                            <th scope="col" class="text-sm font-medium px-6 py-4 w-48">
                              Action
                            </th>
                          </tr>
                        </thead>
                        <tbody class="overflow-y-scroll w-full h-[70vh] scroll-y-beautify">
                            @foreach ($categories as $category)
                          <tr class="odd:bg-gray-50 bg-slate-400 w-full flex justify-between items-center">
                            <td class="text-sm text-gray-900 font-medium px-6 py-4 w-12">
                              {{ $loop->iteration }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap uppercase w-48">
                              {{ $category->name }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap uppercase w-48">
                                {{ $category->articles->count() }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center w-48">
                                <div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg rounded overflow-clip" role="group">
                                    <button type="button" class="inline-block px-6 py-2.5 bg-indigo-600 text-white font-medium text-xs leading-tight uppercase hover:bg-indigo-700 focus:bg-indigo-700 focus:outline-none focus:ring-0 active:bg-indigo-800 transition duration-150 ease-in-out"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <form action="{{ route('category.destroy',$category->slug) }}" method="post">
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
            @else
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                    No Categories Found
                </div>
            @endif
                      
        </section>
        </main>
</x-main>