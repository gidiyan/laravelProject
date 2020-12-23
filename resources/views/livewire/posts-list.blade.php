<div>
    <div class="w-full flex pb-10">
        <div class="w-3/6 mx-1">
            <input placeholder="Search Category" wire:model.debounce.300ms="search">
        </div>
        <div class="w-1/6 mx-1  relative">
            <select wire:model="sortField">
                <option value="name">Name</option>
                <option value="content">Content</option>
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
    @if ($posts->isNotEmpty())
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
                <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Date</th>
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
                    <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$post->post_id}}</td>
                    <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$post->user_id}}</td>
                    <td class="uppercase tracking-wide text-gray-700 text-xs mb-2"><p class="text-truncate"
                                                                                      style="width: 100px">{{$post->content}}</p>
                    </td>
                    <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$post->created_at}}</td>
                    <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">
                        <a href="{{route('admin.posts.show',$post->id)}}"
                           class="btn-sm border border-black rounded bg-green-300">View</a>
                        <a href="{{route('admin.posts.edit',$post->id)}}"
                           class="btn-sm border border-black rounded bg-blue-300">Edit</a>
                        <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST"
                              style="display: inline-block">
                            @csrf @method('delete')
                            <input type="submit" class="btn-sm border border-black rounded bg-red-300 uppercase"
                                   value="Delete">
                        </form>
                    </td>
                </tr>
            @empty
                <h2>No Posts Yet</h2>
            @endforelse
            @endif
            </tbody>
        </table>
        {{ $posts ->links() }}
</div>
