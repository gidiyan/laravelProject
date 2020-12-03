<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<div class="row">
    <div class="col-lg-12">
        <strong>Categories Management</strong>
        <a class="btn btn-success float-right" href="{{route('admin.categories.create')}}">Add New</a>
    </div>
</div>
<div class="card">
    <div class="card-header">
        Categories List
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-dark table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $category):?>
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->status}}</td>
                    <td>

                        <a href="{{route('admin.categories.show',$category->id)}}" class="btn btn-info btn-xs">View</a>
                        <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-primary btn-xs">Edit</a>
                        <form action="{{route('admin.categories.destroy', $category->id)}}" method="POST" style="display: inline-block">
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

