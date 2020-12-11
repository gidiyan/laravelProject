<x-admin.admin-layout>
    <div class="row">
        <div class="col-lg-12">
            <strong>Posts Management</strong>
            <a class="content-center bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent float-right"
               href="{{route("admin.posts.index")}}">Go Back</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Create Post
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="{{route("admin.posts.store")}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" id="category_id">
                            <?php foreach ($categories as $category): ?>
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user">User</label>
                        <select name="user_id" id="user_id">
                            <?php foreach ($users as $user): ?>
                            <option value="{{$user->id}}" name="user_id">{{$user->name}}</option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea rows="10" cols="50" class="form-control" id="content" name="content"></textarea>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="status" id="status">
                        <label class="form-check-label" for="status">Check if active</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-admin.admin-layout>
