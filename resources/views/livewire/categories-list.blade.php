<div>
    <div class="w-full flex pb-10">
        <div class="w-3/6 mx-1">
            <input placeholder="Search Category" wire:model.debounce.300ms="search">
        </div>
        <div class="w-1/6 mx-1  relative">
            <select wire:model="sortField">
                <option value="name">Name</option>
                <option value="created_at">Date</option>
            </select>
        </div>
        <div class="w-1/6 mx-1 relative">
            <select wire:model="sortAsc">
                <option value="1">Asc</option>
                <option value="0">Desc</option>
            </select>
        </div>
    </div>
    @if ($categories->isNotEmpty())
        <table class="border border-black shadow-2xl">
            <thead class="border border-black">
            <tr>
                <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Name</th>
                <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">date</th>
                <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$category->name}}</td>
                    <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$category->created_at}}</td>
                    <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">
                        <a href="{{route('admin.categories.show',$category->id)}}"
                           class="btn-sm border border-black rounded bg-green-300">View</a>
                        <a href="{{route('admin.categories.edit',$category->id)}}"
                           class="btn-sm border border-black rounded bg-blue-300">Edit</a>
                        <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST"
                              style="display: inline-block">
                            @csrf @method('delete')
                            <input type="submit" class="btn-sm border border-black rounded bg-red-300 uppercase"
                                   value="Delete">
                        </form>
                    </td>
                </tr>
            @empty
                <h2>No Categories Yet</h2>
            @endforelse
            </tbody>
        </table>
        {{ $categories ->links() }}
    @endif
</div>
