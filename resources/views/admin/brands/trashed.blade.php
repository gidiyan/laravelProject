<x-admin.admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Trashed Brands') }}</h2>
            <a class="content-center bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent float-right"
               href="{{route("admin.brands.index")}}">Go Back</a>
        </div>
    </x-slot>
    <div class="main-card">
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
                    @forelse ($brands as $brand)
                        <tr>
                            <th class="border border-black">{{$brand->id}}</th>
                            <td class="border border-black">{{$brand->name}}</td>
                            <td class="border border-black">{{$brand->deleted_at}}</td>
                            <td class="border border-black">{{$brand->status}}</td>
                            <td class="border border-black">
                                <form action="{{route('admin.brands.force', $brand->id)}}" method="POST"
                                      style="display: inline-block">
                                    @csrf @method('delete')
                                    <input type="submit" class="btn-sm border border-black rounded bg-red-300"
                                           value="Force Delete">
                                </form>
                                <form action="{{route('admin.brands.restore', $brand->id)}}" method="POST"
                                      style="display: inline-block">
                                    @csrf
                                    <input type="submit" class="btn-sm border border-black rounded bg-green-300"
                                           value="Restore Brand">
                                </form>
                            </td>
                        </tr>
                    @empty
                        <h2>No Brands Yet</h2>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin.admin-layout>

