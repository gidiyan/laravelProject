<div>
    <div class="w-full flex pb-10">
        <div class="w-3/6 mx-1">
            <input placeholder="Search User" wire:model.debounce.300ms="search">
        </div>
        <div class="w-1/6 mx-1  relative">
            <select wire:model="sortField">
                <option value="id">ID</option>
                <option value="name">Name</option>
                <option value="email">Email</option>
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
    @if ($users->isNotEmpty())
        <table class="border border-black shadow-2xl">
            <thead class="border border-black">
            <tr>
                <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Name</th>
                <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Email</th>
                <th class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">date</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($users as $user)
                <tr>
                    <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$user->name}}</td>
                    <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$user->email}}</td>
                    <td class="uppercase tracking-wide text-gray-700 text-xs mb-2">{{$user->created_at}}</td>
                </tr>
            @empty
                <h2>No Users Yet</h2>
            @endforelse
            </tbody>
        </table>
        {{ $users ->links() }}
    @endif
</div>
