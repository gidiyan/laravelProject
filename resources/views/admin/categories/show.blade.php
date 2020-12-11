<x-admin.admin-layout>
    <div class="row">
        <div class="col-lg-12">
            <strong>Categories Management</strong>
            <a class="content-center bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent float-right"
               href="{{route("admin.categories.index")}}">Go Back</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Show Category
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <fieldset disabled>
                    <form>
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold
                               mb-2">Name</label>
                            <input type="text"
                                   class="{{ $errors->has('name')?'is-invalid':'' }} appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   placeholder="Name" id="name" name="name" value="{{$category->name}}" disabled>
                        </div>
                        <div class="w-full px-3">
                            <label for="description"
                                   class="block uppercase tracking-wide text-gray-700 text-xs font-bold
                               mb-2">Description</label>
                            <input type="text"
                                   class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   placeholder="Description" id="description" name="description"
                                   value="{{$category->description}}" disabled>
                        </div>
                        <div class="w-full md:w-1/2 px-3 my-4">
                            <input type="checkbox" class="form-checkbox border-black" name="status"
                                   id="status" {{$category->status  == 1? 'checked':''}}>
                            <label class="appearance-none checked:bg-blue-600 checked:border-transparent" for="status">Active</label>
                        </div>
                        <div class="flex justify-center w-full my-2">
                            <a class="content-center bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                               href="{{route("admin.categories.index")}}">Go Back</a>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
</x-admin.admin-layout>
