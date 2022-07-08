<x-admin-layout>
    <div>
        Edit Role
        <form action="{{ route('admin.roles.update', $role) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-row d-flex">
              <div class="col mb-4">
                <input name="name" type="text" class="form-control rounded mr-3" placeholder="First name" value="{{ $role->name }}"> <br>
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
            @if ($role->permissions)
            @foreach ($role->permissions as $role_permission)
            <form action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}" method="POST" onsubmit="return confirm('are your sure?');">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger bg-danger" type="submit" >{{ $role_permission->name }}</button>

            </form>
            @endforeach
            @endif

          </div>

          <div class="mt-4">
            <h3>assign permission</h3>
              </div>
              <form action="{{ route('admin.roles.permissions', $role->id) }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Options</label>
                    </div>
                    <select class="custom-select" id="permission" name="permission">
                        @foreach ($permissions as $permission)
                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                  </div>
                <div class="">
                    <button type="submit" class="btn btn-success text-success">Assign</button>
                </div>
              </form>
          </div>
    </div>
</x-admin-layout>
