<x-admin.admin-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Brand Show') }} </h2>
            <a class="content-center bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent float-right"
               href="{{route("admin.brands.index")}}">Go Back</a>
        </div>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <fieldset disabled>
                    <form>
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold
                               mb-2">Name</label>
                            <input type="text"
                                   class="{{ $errors->has('name')?'is-invalid':'' }} appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   placeholder="Name" id="name" name="name" value="{{$brand->name}}" disabled>
                        </div>
                        <div class="w-full px-3">
                            <label for="image"
                                   class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Load
                                Image</label>
                            <input type="file"
                                   class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                   id="image" name="image">
                        </div>
                        <div class="w-full md:w-1/2 px-3 my-4">
                            <input type="checkbox" class="form-checkbox border-black" name="status"
                                   id="status" {{$brand->status  == 1? 'checked':''}}>
                            <label class="appearance-none checked:bg-blue-600 checked:border-transparent" for="status">Active</label>
                        </div>
                        <div class="flex justify-center w-full my-2">
                            <a class="content-center bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                               href="{{route("admin.brands.index")}}">Go Back</a>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
</x-admin.admin-layout>
