<x-admin.admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Products list') }}
            </h2>
            <a class="text-white bg-red-300 px-2" href="{{ route('admin.products.trashed') }}">Trashed Products</a>
            <a class="text-white bg-blue-600 px-2" href="{{ route('admin.products.create') }}">Add New</a>
        </div>
    </x-slot>
    <div class="main-card">
        <div class="body">
            <div class="w-full">
                @livewire('products-list')
            </div>
        </div>
    </div>
</x-admin.admin-layout>

