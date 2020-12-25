<div class="bg-gray-800 dark:bg-gray-800 min-h-screen">
    <div class="flex items-center justify-center mt-4">
        <div class="flex items-center">
            <span class="text-white text-2xl mx-2 font-semibold">Admin</span>
        </div>
    </div>
    <nav class="mt-4 text-white">
        <a class="nav-link {{ request()->is('admin') }}?'active':''" href="{{ route('admin.home') }}"><i
                class="text-white fas fa-fw fa-tachometer-alt"></i><span class="mx-4">Dashboard</span></a>
        <div x-data="{open:false}" class="block w-11/12 mt-2 mx-auto">
            <button @click="open=true"
                    class="cursor-pointer px-5 py-3 text-white text-center inline-block hover:opacity-75 hover:shadow hover:-mb3 rounded-t">
                <i class="fa-fw fas fa-users"></i><span class="mx-4">User Management</span><i
                    class="fa fa-caret-down ml-auto" x-bind:class="{'fa-caret-up':open!==false}" area-hidden="true"></i>
            </button>
            <ul x-show="open" @click.away="open==false">
                <li class="border w-11/12"><a href="#"
                                              class="nav-link {{ request()->is('admin/permissions*') }}?'active':''"><i
                            class="fa-fw fas fa-unlock-alt"></i><span
                            class="mx-4">Permission</span></a></li>
                <li class="border w-11/12"><a href="#"
                                              class="nav-link {{ request()->is('admin/roles*') }}?'active':''"><i
                            class="fa-fw fas fa-briefcase"></i><span
                            class="mx-4">Roles</span></a></li>
                <li class="border w-11/12"><a href="#"
                                              class="nav-link {{ request()->is('admin/users*') }}?'active':''"><i
                            class="fa-fw fas fa-user"></i><span
                            class="mx-4">Users</span></a></li>
            </ul>
        </div>
        <a class="nav-link" href="{{ route('admin.categories.index') }}"><span class="mx-4">Categories</span></a>
        <a class="nav-link" href="{{ route('admin.brands.index') }}"><span class="mx-4">Brands</span></a>
        <a class="nav-link" href="{{ route('admin.products.index') }}"><span class="mx-4">Products</span></a>
        <a class="nav-link" href="{{ route('admin.posts.index') }}"><span class="mx-4">Posts</span></a>
        <a class="nav-link" href="{{ route('admin.users.index') }}"><span class="mx-4">Users</span></a>
    </nav>
</div>
