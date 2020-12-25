<x-admin.admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Brands list') }}
            </h2>
            <a class="text-white bg-red-300 px-2" href="{{ route('admin.brands.trashed') }}">Trashed Brands</a>
            <a class="text-white bg-blue-600 px-2" href="{{ route('admin.brands.create') }}">Add New</a>
        </div>
    </x-slot>
    <div class="main-card">
        <div class="body">
            <div class="w-full">
                @livewire('brands-list')
            </div>
        </div>
    </div>
</x-admin.admin-layout>
