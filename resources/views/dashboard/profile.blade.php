<x-main>
    <x-dash-nav/>
    <section class="mt-20 lg:ml-64 px-6 h-[90vh]">
        <div class="flex p-3 bg-white/10 h-full rounded">
            <label for="img" class="group rounded-full overflow-hidden" >
                <div class="group-hover:bg-black rounded-full absolute inset-0">
                </div>
                <img src="{{ asset('storage/'.$user->image) }}" alt="{{ $user->title }}" class="w-full h-full rounded-md shadow-md">
                <input type="file" name="image" id="img" class="hidden">
            </label>
        </div>
    </section>
</x-main>