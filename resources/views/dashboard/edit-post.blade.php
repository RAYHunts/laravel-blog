
<x-main>
    <x-dash-nav/>
        <section class="w-full max-w-2xl px-6 py-4 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 lg:ml-72 mt-20 h-full mb-12">
            <div>
                <h2 class="text-3xl font-semibold text-center text-gray-800 dark:text-white">Edit Article</h2>
        <div class="mt-6">
            <form action="{{ route('article.update',$article->slug) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="items-center -mx-2 md:flex">
                    <div class="w-full mx-2">
                        <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Title</label>
                        <input class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" type="text" name="title" value="{{ old('title') ?? $article->title }}">
                        @error('title')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full mx-2 mt-4 md:mt-0">
                        <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Category</label>
                        <select class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" aria-label="Default select example" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $article->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="w-full mt-4">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Content</label>
                    <div class="p-3 dark:bg-slate-200 rounded">
                        <input id="x" type="hidden" name="content" value="{{ old('content') ?? $article->content }}">
                        <trix-editor input="x" class="scroll-hidden p-3"></trix-editor>
                    </div>
                    @error('content')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="items-center -mx-2 md:flex mt-4 text-sm font-medium text-gray-600 dark:text-gray-200">
                    <div class="w-full mx-2">
                        <label class="block mb-2" for="image">Image</label>
                        <div class="w-full p-3">
                            <img class="w-1/3 rounded-sm" id="imageView" src="{{ asset('public/'.$article->image) }}">
                        </div>
                        <input type="file" name="image" id="image">
                        @error('image')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full mx-2 mt-4 md:mt-0">
                        <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200">Caption</label>
                        <input class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" type="text" name="caption" id="caption" value="{{ old('caption') ?? $article->caption }}">
                        @error('caption')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-center mt-6">
                    <button class="px-4 py-2 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600" type="submit">Send Message</button>
                </div>
            </form>
        </div>
            </div>
        
    </section>
    <script>
        // display image after select
        const image = document.getElementById('imageView');
        const imageInput = document.getElementById('image');
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            const reader = new FileReader();
            reader.onload = function() {
                image.src = reader.result;
            }
            reader.readAsDataURL(file);
        });
    </script>
</x-main>