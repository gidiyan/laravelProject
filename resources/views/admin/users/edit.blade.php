<x-admin.admin-layout>
    <div class="row">
        <div class="col-lg-12">
            <strong>Users Management</strong>
            <a class="content-center bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent float-right"
               href="{{route("admin.users.index")}}">Go Back</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Edit User
        </div>
        <div class="body">
            <div class="w-full">
                <form method="POST" action="{{route("admin.users.update",$user->id)}}" class="w-full max-w-lg">
                    @csrf @method('PUT')
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold
                               mb-2">Name</label>
                        <input type="text"
                               class="{{ $errors->has('name')?'is-invalid':'' }} appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               placeholder="Name" id="name" name="name" value="{{$user->name}}" required>
                    </div>
                    @if($errors->has('name'))
                        <p class="invalid-feedback">{{ $errors->first('name') }}</p>
                    @endif
                    <div class="w-full px-3">
                        <label for="email"
                               class="block uppercase tracking-wide text-gray-700 text-xs font-bold
                               mb-2">Email</label>
                        <input type="text"
                               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               placeholder="Email" id="email" name="email"
                               value="{{$user->email}}">
                    </div>
                    @if($errors->has('emails'))
                        <p class="invalid-feedback">{{ $errors->first('emails') }}</p>
                    @endif
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
