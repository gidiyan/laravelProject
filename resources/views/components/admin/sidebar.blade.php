<div class="sidebar-menu transform -translate-x-full ease-in">
    <div class="flex items-center justify-center mt-4">
        <div class="flex items-center">
            <span class="text-white text-2xl mx-2 font-semibold">Admin</span>
        </div>
    </div>
    <nav class="mt-4">
        <a class="nav-link" href="{{ route('admin.home') }}"><span class="mx-4">Dashboard</span></a>
        <a class="nav-link" href="{{ route('admin.categories.index') }}"><span class="mx-4">Categories</span></a>
        <a class="nav-link" href="{{ route('admin.posts.index') }}"><span class="mx-4">Posts</span></a>
        <a class="nav-link" href="{{ route('admin.products.index') }}"><span class="mx-4">Products</span></a>
        <a class="nav-link" href="{{ route('admin.users.index') }}"><span class="mx-4">Users</span></a>
    </nav>
</div>
