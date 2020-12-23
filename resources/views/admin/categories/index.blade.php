<x-admin.admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categories list') }}
            </h2>
            <a class="text-white bg-red-300 px-2" href="{{ route('admin.categories.trashed') }}">Trashed Categories</a>
            <a class="text-white bg-blue-600 px-2" href="{{ route('admin.categories.create') }}">Add New</a>
        </div>
    </x-slot>
    <div class="main-card">
        <div class="body">
            <div class="w-full">
                @livewire('categories-list')
            </div>
        </div>
    </div>
</x-admin.admin-layout>
