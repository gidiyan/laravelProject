<x-admin.admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>
    <div class="main-card">
        <div class="header">
            Create Category
            <a class="btn-sm btn-green" href="{{route("admin.categories.index")}}">Go Back</a>
        </div>
        <div class="body">
            <div class="w-full">
                <form class="w-full max-w-lg" method="POST"
                      action="{{route("admin.categories.store")}}">
                    @csrf
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold
                               mb-2">Name</label>
                        <input type="text"
                               class="{{ $errors->has('name')?'is-invalid':'' }} appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               placeholder="Name" id="name" name="name" value="{{old('name')}}" required>
                        <p class="text-red-500 text-xs italic my-2">Please fill out this field.</p>
                    </div>
                    @if($errors->has('name'))
                        <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                    @endif
                    <div class="w-full px-3">
                        <label for="description"
                               class="block uppercase tracking-wide text-gray-700 text-xs font-bold
                               mb-2">Description</label>
                        <input type="text"
                               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               placeholder="Description" id="description" name="description"
                               value="{{old('description')}}">
                    </div>
                    @if($errors->has('description'))
                        <p class="invalid-feedback">{{ $errors->first('description') }}</p>
                    @endif
                    <div class="w-full md:w-1/2 px-3 my-4">
                        <input type="checkbox" class="form-checkbox border-black" name="status" id="status">
                        <label class="appearance-none checked:bg-blue-600 checked:border-transparent" for="status">Check
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
</x-admin.admin-layout>
