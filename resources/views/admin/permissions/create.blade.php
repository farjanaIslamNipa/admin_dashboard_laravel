<x-admin-layout>
    <div>
        Create Permission
        <form action="{{ route('admin.permissions.store') }}" method="POST">
            @csrf
            <div class="form-row d-flex">
              <div class="col mb-4">
                <input name="name" type="text" class="form-control rounded mr-3" placeholder="First name"> <br>
                @error('name')<p class="text-danger">{{ $message }}</p>@enderror
              </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-success text-success">Create</button>
            </div>
          </form>
    </div>
</x-admin-layout>
