<x-admin.admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Trashed posts') }}
            </h2>
            <a class="content-center bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent float-right"
               href="{{route("admin.posts.index")}}">Go Back</a>
        </div>
    </x-slot>
    <div class="main-card">
        <div class="body">
            <div class="w-full">
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
                            <td>
                                <form action="{{route('admin.posts.force', $post->id)}}" method="POST"
                                      style="display: inline-block">
                                    @csrf @method('delete')
                                    <input type="submit" class="btn-sm btn-red" value="Force Delete">
                                </form>
                                <form action="{{route('admin.posts.restore', $post->id)}}" method="POST"
                                      style="display: inline-block">
                                    @csrf
                                    <input type="submit" class="btn-sm btn-green" value="Restore Post">
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

