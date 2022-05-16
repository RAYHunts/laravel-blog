<x-main>
    <x-dash-nav/>
    <section class="h-screen w-screen flex items-center justify-center">
        <div class="bg-slate-200 dark:bg-slate-700 p-3 m-auto">
            <h1>{{ $user->name }}</h1>
            <h1>{{ $user->username }}</h1>
            <h1>{{ $user->email }}</h1>
            <h1>{{ $user->image }}</h1>
            <h1>{{ $user->role }}</h1>
        </div>
    </section>
</x-main>