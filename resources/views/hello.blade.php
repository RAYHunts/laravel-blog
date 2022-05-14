<x-main-layout :title="__('Hello')">
    {{-- @dd($categories) --}}
    <x-navbar>
        <x-slot :name="__('leftlinks')">
        @foreach ($categories as $category)
        <li class="nav-item p-2">
            <a class="nav-link text-white" href="{{ url('?category=', $category->slug) }}">{{ $category->name }}</a>
        </li>
        @endforeach
        </x-slot>
    </x-navbar>
    <x-slot name="title">
        {{ $title ?? 'Welcome' }}
    </x-slot>
    <x-slot name="image">
        {{ $image ?? 'https://via.placeholder.com/640x480.png/001155?text=' }}
    </x-slot>
    <x-slot name="content">
        {{-- {{ $slot }} --}}
    </x-slot>
    <div class="h-screen w-screen flex justify-center items-center">
        <x-button :text="__('Hello')" :type="__('button')" :class="__('button-reset')"/>
        <x-button :text="__($name)" class="bg-red-500" :url="url('/')" :linkText="__('Link')" type="submit"/>
    </div>
    <div class="h-screen w-screen flex justify-center items-center">
        <x-button :text="__('Hello')" type="submit"/>
        <x-button :text="__($name)" class="bg-red-500" :url="url('/')" :linkText="__('Link')" type="submit"/>
    </div>
</x-main-layout>
