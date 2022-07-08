<x-admin-layout>
    <div>
        Edit Permission
        <form action="{{ route('admin.permissions.update', $permission) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-row d-flex">
              <div class="col mb-4">
                <input name="name" type="text" class="form-control rounded mr-3" placeholder="First name" value="{{ $permission->name }}"> <br>
                @error('name')<p class="text-danger">{{ $message }}</p>@enderror
              </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-success text-success">Update</button>
            </div>
          </form>

          <div class="my-4">
            <h3>Assigned Permission</h3>
            {{-- {{ dd($role->permissions) }} --}}
            @if ($permission->roles)
            @foreach ($permission->roles as $permission_role)
            <form action="{{ route('admin.permissions.roles.revoke', [$permission->id, $permission_role->id]) }}" method="POST" onsubmit="return confirm('are your sure?');">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger bg-danger" type="submit" >{{ $permission_role->name }}</button>

            </form>
            @endforeach
            @endif

          </div>
{{-- {{ dd($roles) }} --}}
          <div class="mt-4">
            <h3>assign Permissions</h3>
              </div>
              <form action="{{ route('admin.permissions.roles', $permission->id) }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Options</label>
                    </div>
                    <select class="custom-select" id="role" name="role">

                        @foreach ($roles as $role)

                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                  </div>
                <div class="">
                    <button type="submit" class="btn btn-success text-success">Assign</button>
                </div>
              </form>
    </div>
</x-admin-layout>
