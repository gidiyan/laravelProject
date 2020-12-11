<x-admin.admin-layout>
    <div class="main-card">
        <div class="header">
            Categories List
            <a class="btn-sm btn-blue" href="{{route('admin.categories.create')}}">Add New</a>
        </div>
        <div class="body">
            <div class="w-full">
                <table class="border border-black shadow-2xl">
                    <thead class="border border-black">
                    <tr>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"></th>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Name</th>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Status</th>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <th class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$category->id}}</th>
                            <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$category->name}}</td>
                            <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$category->status}}</td>
                            <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">
                                <a href="{{route('admin.categories.show',$category->id)}}" class="btn-sm btn-indigo">View</a>
                                <a href="{{route('admin.categories.edit',$category->id)}}"
                                   class="btn-sm btn-green">Edit</a>
                                <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST"
                                      style="display: inline-block">
                                    @csrf @method('delete')
                                    <input type="submit" class="btn-sm btn-red uppercase" value="Delete">
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

