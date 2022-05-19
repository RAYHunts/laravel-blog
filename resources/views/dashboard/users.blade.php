<x-main>
    <x-dash-nav/>
    <main class="overflow-hidden">
    <section class="lg:ml-64 lg:p-6 p-3 min-h-[95vh] transition-all duration-300 ease-in-out mt-16">
        <div class="p-3 flex justify-between">
          <h1 class="text-2xl font-bold text-slate-800 dark:text-slate-400">All users</h1>
            
                <a href="" 
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    <i class="fa-solid fa-plus mr-2"></i>
                    New user
                </a>
        </div>
        <x-alert/>
        <table class="flex flex-col rounded-md overflow-x-scroll text-center shadow-sm shadow-slate-900/50 scroll-beautify">
          <thead class="border-b bg-gray-800 border-gray-900 text-slate-300 relative w-full min-w-max pr-2">
            <tr class="flex justify-between">
              <th scope="col" class="text-sm font-medium px-6 py-4 w-12">
                No.
              </th>
              <th scope="col" class="text-sm font-medium px-6 py-4 w-48">
                Name
              </th>
              <th scope="col" class="text-sm font-medium px-6 py-4 w-48">
                Email
              </th>
              <th scope="col" class="text-sm font-medium px-6 py-4 w-48">
                Articles
              </th>
              <th scope="col" class="text-sm font-medium px-6 py-4 w-48">
                Status
              </th>
            </tr>
          </thead>
          <tbody class="w-full min-w-max h-[70vh] overflow-y-scroll scroll-y-beautify ">
              @foreach ($users as $user)
            <tr class="odd:bg-gray-50 bg-slate-400 w-full flex justify-between items-center py-2">
              <td class="text-gray-900 font-medium px-6 w-12">
                {{ $loop->iteration }}
              </td>
              <td class="text-gray-900 font-light px-6 w-48">
                {{ $user->name }}
              </td>
              <td class="text-gray-900 font-light px-6uppercase w-48">
                {{ $user->email }}
              </td>
              <td class="text-gray-900 font-light px-6 w-48">
                  {{ $user->articles->count() }}
              </td>
              <td class="text-gray-900 font-semibold px-6 w-48">
                  @if($user->email_verified_at != null)
                  <span class="text-green-500 p-2 bg-green-200 dark:bg-indigo-900 dark:text-sky-200">Verified</span>
                  @else
                  <span class="text-red-500 p-2 bg-red-300 dark:bg-slate-700 dark:text-slate-200">Not verified</span>
                  @endif
              </td>
              
            </tr>
              @endforeach
          </tbody>
        </table>
    </section>
    </main>
</x-main>
