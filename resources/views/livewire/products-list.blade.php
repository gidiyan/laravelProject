<div>
    <div class="w-full flex pb-10">
        <div class="w-3/6 mx-1">
            <input placeholder="Search Product" wire:model.debounce.300ms="search">
        </div>
        <div class="w-1/6 mx-1  relative">
            <select wire:model="sortField">
                <option value="name">Name</option>
                <option value="price">Price</option>
                <option value="details">Details</option>
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
    @if ($products->isNotEmpty())
        <table class="border border-black shadow-2xl">
            <thead class="border border-black">
            <tr>
                <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Name</th>
                <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Price</th>
                <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Details</th>
                <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Status</th>
                <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Date</th>
                <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($products as $product)
                <tr>
                    <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$product->name}}</td>
                    <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$product->price}}</td>
                    <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$product->details}}</td>
                    <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$product->status}}</td>
                    <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$product->created_at}}</td>
                    <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">
                        <a href="{{route('admin.products.show',$product->id)}}"
                           class="btn-sm border border-black rounded bg-green-300">View</a>
                        <a href="{{route('admin.products.edit',$product->id)}}"
                           class="btn-sm border border-black rounded bg-blue-300">Edit</a>
                        <form action="{{route('admin.products.destroy', $product->id)}}" method="POST"
                              style="display: inline-block">
                            @csrf @method('delete')
                            <input type="submit" class="btn-sm border border-black rounded bg-red-300 uppercase"
                                   value="Delete">
                        </form>
                    </td>
                </tr>
            @empty
                <h2>No Products Yet</h2>
            @endforelse
            </tbody>
        </table>
        {{ $products ->links() }}
    @endif
</div>

