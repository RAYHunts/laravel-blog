<x-main>
    <x-dash-nav/>
    <main class="overflow-hidden">
        <section class="lg:ml-64 lg:p-6 p-3 min-h-full transition-all duration-300 ease-in-out mt-16">
            <div class="p-3 flex justify-between">
              <h1 class="text-2xl font-bold text-slate-800 dark:text-slate-400">Categories</h1>
                
                <button type="button"
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">
                New Category
              </button>
            </div>
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
                      
        </section>
        <!-- Modal -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
id="exampleModalScrollable" tabindex="-1" aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable relative w-auto pointer-events-none">
  <div
    class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
    <div
      class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
      <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
        New Category
      </h5>
      <button type="button"
        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
        data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body relative p-4">
        <form action="{{ route('category.store') }}" method="post">
            @csrf
              <div class="form-group mb-6">
                <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700">Category Name</label>
                <input type="text" class="form-control
                  block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="name">
              </div>
              
    </div>
    <div
      class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md gap-3">
      <button type="button"
        class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
        data-bs-dismiss="modal">
        Close
      </button>
      <button type="submit" class="
                px-6
                py-2.5
                bg-blue-600
                text-white
                font-medium
                text-xs
                leading-tight
                uppercase
                rounded
                shadow-md
                hover:bg-blue-700 hover:shadow-lg
                focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                active:bg-blue-800 active:shadow-lg
                transition
                duration-150
                ease-in-out">Submit</button>
            </form>
    </div>
  </div>
</div>
</div>
        </main>
</x-main>