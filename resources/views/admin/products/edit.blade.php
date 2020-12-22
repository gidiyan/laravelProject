<x-admin.admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-lg-12">
            <strong>Products Management</strong>
            <a class="btn btn-success float-right" href="{{route("admin.products.index")}}">Go Back</a>
            <div class="main-card">
                <div class="header">
                    Edit Product
                    <a class="btn-sm btn-green" href="{{route("admin.products.index")}}">Go Back</a>
                </div>
                <div class="body">
                    <div class="w-full">
                        <form method="POST" action="{{route("admin.products.update",$product->id)}}"
                              class="w-full max-w-lg">
                            @csrf @method('PUT')
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label for="name"
                                           class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Name</label>
                                    <input type="text"
                                           class="{{ $errors->has('name')?'is-invalid':'' }} appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                           placeholder="Name" id="name" name="name" value="{{$product->name}}" required>
                                </div>
                                @if($errors->has('name'))
                                    <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                                @endif
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label for="details"
                                           class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Details</label>
                                    <input type="text"
                                           class="{{ $errors->has('details')?'is-invalid':'' }} appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                           placeholder="Details" id="details" name="details"
                                           value="{{$product->details}}">
                                </div>
                                @if($errors->has('details'))
                                    <p class="invalid-feedback">{{ $errors->first('details') }}</p>
                                @endif
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                           for="description">
                                        Description
                                    </label>
                                    <input
                                        class="{{ $errors->has('description')?'is-invalid':'' }} appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        name="description" placeholder="Description" value="{{$product->description}}">
                                    <p class="text-gray-600 text-xs italic">Product description</p>
                                </div>
                                @if($errors->has('description'))
                                    <p class="invalid-feedback">{{ $errors->first('description') }}</p>
                                @endif
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label for="price"
                                           class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Price</label>
                                    <input type="number" step="0.01"
                                           class="{{ $errors->has('price')?'is-invalid':'' }} appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                           placeholder="99,99" id="price" name="price" value="{{$product->price}}"
                                           required>
                                </div>
                                @if($errors->has('price'))
                                    <p class="invalid-feedback">{{ $errors->first('price') }}</p>
                                @endif
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label for="image"
                                           class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Load
                                        Image</label>
                                    <input type="file"
                                           class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                           id="image" name="image">
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label for="brand" class="block uppercase tracking-wide text-gray-700 text-xs font-bold
                               mb-2">Select Brand</label>
                                <select name="brand_id" id="brand_id"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" {{ ($brand->id === $product->brand_id)? 'selected':'' }}
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label for="category" class="block uppercase tracking-wide text-gray-700 text-xs font-bold
                               mb-2">Select Category</label>
                                    <select name="categories[]" id="categories" multiple
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{ ($category->id === $product->category_id)? 'selected':'' }}
                                                    class="border border-gray-700 rounded">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="w-full md:w-1/2 px-3 my-4">
                                <input type="checkbox" class="form-checkbox border-black" name="status" id="status">
                                <label class="appearance-none checked:bg-blue-600 checked:border-transparent"
                                       for="status" {{$product->status == 1?'checked':''}}>Check
                                    if active</label>
                            </div>
                            <div class="flex justify-center w-full my-2">
                                <button type="submit"
                                        class="content-center bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin.admin-layout>
