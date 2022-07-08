<x-admin-layout>
    <div>
        users
        <div class="my-4">
            <p>{{ $user->name }}</p>
            <p>{{ $user->email }}</p>
        </div>

          <div class="my-4">
            <h3>Assigned Permission</h3>
            {{-- {{ dd($user->permissions) }} --}}
            @if ($user->permissions)
            @foreach ($user->permissions as $user_permission)
            <form action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}" method="POST" onsubmit="return confirm('are your sure?');">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger bg-danger" type="submit" >{{ $user_permission->name }}</button>

            </form>
            @endforeach
            @endif

          </div>

          <div class="mt-4">
            <h3>assign permission</h3>
              </div>
              <form action="{{ route('admin.users.permissions', $user->id) }}" method="POST">
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

              <div class="my-4">
                <h3>Assigned roles</h3>
                {{-- {{ dd($role->permissions) }} --}}
                @if ($user->roles)
                @foreach ($user->roles as $user_role)
                <form action="{{ route('admin.users.roles.revoke', [$user->id, $user_role->id]) }}" method="POST" onsubmit="return confirm('are your sure?');">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger bg-danger" type="submit" >{{ $user_role->name }}</button>

                </form>
                @endforeach
                @endif

              </div>
    {{-- {{ dd($roles) }} --}}
              <div class="mt-4">
                <h3>assign Roles</h3>
                  </div>
                  <form action="{{ route('admin.users.roles', $user->id) }}" method="POST">
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
    </div>
</x-admin-layout>
