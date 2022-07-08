<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>admin Permission</h3>
                    <div class="text-right">
                        <a href="{{ route('admin.permissions.create') }}" class="text-white p-2 bg-success rounded">Create</a>
                    </div>
                </div>
                <div class="">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td scope="row">{{ $loop->index + 1 }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td><a class="text-info" href="{{ route('admin.permissions.edit', $permission->id) }}">Edit</a></td>
                                    <td><a class="text-danger" href="{{ route('admin.permissions.destroy', $permission->id) }}">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
