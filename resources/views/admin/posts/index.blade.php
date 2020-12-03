<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<div class="row">
    <div class="col-lg-12">
        <strong>Posts Management</strong>
        <a class="btn btn-success float-right" href="{{route('admin.posts.create')}}">Add New</a>
    </div>
</div>
<div class="card">
    <div class="card-header">
        Posts List
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-dark table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Votes</th>
                    <th scope="col">Comments</th>
                    <th scope="col">Category</th>
                    <th scope="col">User</th>
                    <th scope="col">Content</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($posts as $post):?>
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->name}}</td>
                    <td>{{$post->status}}</td>
                    <td>{{$post->votes}}</td>
                    <td>{{$post->comments}}</td>
                    <td>{{$post->category_id}}</td>
                    <td>{{$post->user_id}}</td>
                    <td><p class="text-truncate" style="width: 100px">{{$post->content}}</p></td>
                    <td>

                        <a href="{{route('admin.posts.show',$post->id)}}" class="btn btn-info btn-xs">View</a>
                        <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-primary btn-xs">Edit</a>
                        <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" style="display: inline-block">
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger btn-xs" value="Delete">
                        </form>

                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

