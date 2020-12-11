<x-admin.admin-layout>
    <div class="main-card">
        <div class="header">
            Products List
            <a class="btn-sm btn-blue" href="{{route('admin.products.create')}}">Add New</a>
        </div>
        <div class="body">
            <div class="w-full">
                {{ $products ->links() }}
                <table class="border border-black shadow-2xl">
                    <thead class="border border-black">
                    <tr>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"></th>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Name</th>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Price</th>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Status</th>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <th class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$product->id}}</th>
                            <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$product->name}}</td>
                            <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$product->price}}</td>
                            <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$product->status}}</td>
                            <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">
                                <a href="{{route('admin.products.show',$product->id)}}"
                                   class="btn-sm btn-indigo">View</a>
                                <a href="{{route('admin.products.edit',$product->id)}}"
                                   class="btn-sm btn-green">Edit</a>
                                <form action="{{route('admin.products.destroy', $product->id)}}" method="POST"
                                      style="display: inline-block">
                                    @csrf @method('delete')
                                    <input type="submit" class="btn-sm btn-red uppercase" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @empty
                        <h2>No Products Yet</h2>
                    @endforelse
                    </tbody>
                </table>
                {{ $products ->links() }}
            </div>
        </div>
    </div>
</x-admin.admin-layout>

