<x-admin.admin-layout>
    <div class="main-card">
        <div class="header">
            Users List
            <a class="btn-sm btn-blue" href="{{route('admin.users.create')}}">Add New</a>
        </div>
        <div class="body">
            <div class="w-full">
                {{ $users ->links() }}
                <table class="border border-black shadow-2xl">
                    <thead class="border border-black">
                    <tr>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"></th>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Name</th>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Email</th>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <th class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$user->id}}</th>
                            <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$user->name}}</td>
                            <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$user->email}}</td>
                            <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">
                                <a href="{{route('admin.users.show',$user->id)}}" class="btn-sm btn-indigo">View</a>
                                <a href="{{route('admin.users.edit',$user->id)}}"
                                   class="btn-sm btn-green">Edit</a>
                                <form action="{{route('admin.users.destroy', $user->id)}}" method="POST"
                                      style="display: inline-block">
                                    @csrf @method('delete')
                                    <input type="submit" class="btn-sm btn-red uppercase" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @empty
                        <h2>No Users Yet</h2>
                    @endforelse
                    </tbody>
                </table>
                {{ $users ->links() }}
            </div>
        </div>
    </div>
</x-admin.admin-layout>

