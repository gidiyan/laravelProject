<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<div class="row">
    <div class="col-lg-12">
        <strong>Categories Management</strong>
        <a class="btn btn-success float-right" href="{{route("admin.categories.index")}}">Go Back</a>

    </div>
</div>
<div class="card">
    <div class="card-header">
        Create Category
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form method="POST" action="{{route("admin.categories.update",$category->id)}}">
                @csrf @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{$category->description}}">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="status" id="status" {{$category->status ? "checked": ""}}>
                    <label class="form-check-label" for="status">Check if active</label>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

