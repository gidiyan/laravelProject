<x-admin.admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts list') }}
            </h2>
            <a class="text-white bg-red-300 px-2" href="{{ route('admin.posts.trashed') }}">Trashed Posts</a>
            <a class="btn-sm btn-blue" href="{{route('admin.posts.create')}}">Add New</a>
        </div>
    </x-slot>
    <div class="body">
        <div class="w-full">
            @livewire('posts-list')
        </div>
    </div>
</x-admin.admin-layout>
