<x-admin.admin-layout>
    <div class="main-card">
        <div class="header">
            Posts List
            <a class="btn-sm btn-blue" href="{{route('admin.posts.create')}}">Add New</a>
        </div>
        <div class="body">
            <div class="w-full">
                {{ $posts ->links() }}
                <table class="border border-black shadow-2xl">
                    <thead class="border border-black">
                    <tr>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"></th>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Name</th>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Status</th>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Votes</th>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Comments</th>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Category</th>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">User</th>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Content</th>
                        <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <th class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$post->id}}</th>
                            <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$post->name}}</td>
                            <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$post->status}}</td>
                            <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$post->votes}}</td>
                            <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$post->comments}}</td>
                            <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$post->category_id}}</td>
                            <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$post->user_id}}</td>
                            <td class="uppercase tracking-wide text-gray-700 text-xs mb-2"><p class="text-truncate"
                                                                                              style="width: 100px">{{$post->content}}</p>
                            </td>
                            <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">
                                <a href="{{route('admin.posts.show',$post->id)}}" class="btn-sm btn-indigo">View</a>
                                <a href="{{route('admin.posts.edit',$post->id)}}"
                                   class="btn-sm btn-green">Edit</a>
                                <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST"
                                      style="display: inline-block">
                                    @csrf @method('delete')
                                    <input type="submit" class="btn-sm btn-red uppercase" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @empty
                        <h2>No Posts Yet</h2>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin.admin-layout>
