<x-admin.admin-layout>
    <div class="main-card">
        <div class="header">
            Trashed Products List
            <a class="btn-sm btn-blue" href="{{route('admin.products.index')}}">Go Back</a>
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
                    @forelse ($products as $product)
                        <tr>
                            <th class="border border-black">{{$product->id}}</th>
                            <td class="border border-black">{{$product->name}}</td>
                            <td class="border border-black">{{$product->deleted_at}}</td>
                            <td class="border border-black">{{$product->status}}</td>
                            <td class="border border-black">
                                <form action="{{route('admin.products.force', $product->id)}}" method="POST"
                                      style="display: inline-block">
                                    @csrf @method('delete')
                                    <input type="submit" class="btn-sm btn-red" value="Force Delete">
                                </form>
                                <form action="{{route('admin.products.restore', $product->id)}}" method="POST"
                                      style="display: inline-block">
                                    @csrf
                                    <input type="submit" class="btn-sm btn-green" value="Restore Product">
                                </form>
                            </td>
                        </tr>
                    @empty
                        <h2>No Products Yet</h2>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin.admin-layout>

