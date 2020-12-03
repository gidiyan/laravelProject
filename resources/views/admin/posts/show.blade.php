<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<div class="row">
    <div class="col-lg-12">
        <strong>Posts Management</strong>
        <a class="btn btn-success float-right" href="{{route("admin.posts.index")}}">Go Back</a>

    </div>
</div>
<div class="card">
    <div class="card-header">
        Show Post
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <fieldset disabled>
                <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$post->name}}">
                </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select>
                            <?php foreach ($categories as $category): ?>
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="user">User</label>
                        <select>
                            <?php foreach ($users as $user): ?>
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            <?php endforeach;?>
                        </select>
                    </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea rows="10" cols="50"  class="form-control" id="content" name="content" >{{$post->content}}</textarea>
                </div>
                    <div class="form-group">
                        <label for="content">Votes</label>
                        <input type="text" class="form-control" id="votes" name="votes" value="{{$post->votes}}">
                    </div> <div class="form-group">
                        <label for="content">Comments</label>
                        <input type="text" class="form-control" id="comments" name="comments" value="{{$post->comments}}">
                    </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="status" id="status" {{$post->status ? "checked": ""}}>
                    <label class="form-check-label" for="status">Check if active</label>
                </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>

