<x-main>
    <x-dash-nav/>
    <main class="overflow-hidden">
    <section class="lg:ml-64 lg:p-6 p-3 min-h-full transition-all duration-300 ease-in-out mt-16">
        <div class="p-3 flex justify-between">
            <h1>Your users</h1>
            
                <a href="" 
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    <i class="fa-solid fa-plus mr-2"></i>
                    New user
                </a>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden rounded-md">
                  <table class="min-w-full">
                    <thead class="border-b bg-gray-800 border-gray-900 text-slate-300">
                      <tr>
                        <th scope="col" class="text-sm font-medium px-6 py-4">
                          No.
                        </th>
                        <th scope="col" class="text-sm font-medium px-6 py-4">
                          Name
                        </th>
                        <th scope="col" class="text-sm font-medium px-6 py-4">
                          Username
                        </th>
                        <th scope="col" class="text-sm font-medium px-6 py-4">
                          Articles
                        </th>
                        <th scope="col" class="text-sm font-medium px-6 py-4">
                          Views
                        </th>
                        <th scope="col" class="text-sm font-medium px-6 py-4">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                      <tr class="border-b bg-gray-50 border-gray-200">
                        <td class="text-sm text-gray-900 font-medium px-6 py-4 text-center">
                          {{ $loop->iteration }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                          {{ $user->name }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center uppercase">
                            {{ $user->username }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center uppercase">
                            {{ $user->email }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center uppercase">
                            {{ $user->articles->count() }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                            <div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg rounded overflow-clip" role="group">
                                <button type="button" class="inline-block px-6 py-2.5 bg-indigo-600 text-white font-medium text-xs leading-tight uppercase hover:bg-indigo-700 focus:bg-indigo-700 focus:outline-none focus:ring-0 active:bg-indigo-800 transition duration-150 ease-in-out"><i class="fa-solid fa-pen-to-square"></i></button>
                                <a href="{{ $user->username }}">
                                  <button type="button" class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase hover:bg-green-700 focus:bg-green-700 focus:outline-none focus:ring-0 active:bg-green-800 transition duration-150 ease-in-out"><i class="fa-solid fa-eye"></i></button>
                                </a>
                                <form action="{{ $user->username }}" method="post">
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
                </div>
              </div>
            </div>
          </div>
    </section>
    </main>
</x-main>
