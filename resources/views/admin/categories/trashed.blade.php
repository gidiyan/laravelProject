<x-admin.admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trashed Categories') }}
        </h2>
    </x-slot>
    <div class="main-card">
        <div class="header">
            Trashed Categories List
            <a class="content-center bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent float-right"
               href="{{route("admin.posts.index")}}">Go Back</a>
        </div>
        <div class="body">
            <div class="w-full">
                <table class="striped hover border-separate border border-black shadow-2xl">
                    <thead>
                    <tr>
                        <th class="border border-black"></th>
                        <th class="border border-black">Name</th>
                        <th class="border border-black">Deleted At</th>
                        <th class="border border-black">Status</th>
                        <th class="border border-black">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <th class="border border-black">{{$category->id}}</th>
                            <td class="border border-black">{{$category->name}}</td>
                            <td class="border border-black">{{$category->deleted_at}}</td>
                            <td class="border border-black">{{$category->status}}</td>
                            <td class="border border-black">
                                <form action="{{route('admin.categories.force', $category->id)}}" method="POST"
                                      style="display: inline-block">
                                    @csrf @method('delete')
                                    <input type="submit" class="btn-sm btn-red" value="Force Delete">
                                </form>
                                <form action="{{route('admin.categories.restore', $category->id)}}" method="POST"
                                      style="display: inline-block">
                                    @csrf
                                    <input type="submit" class="btn-sm btn-green" value="Restore Category">
                                </form>
                            </td>
                        </tr>
                    @empty
                        <h2>No Categories Yet</h2>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin.admin-layout>

