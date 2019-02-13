<table id="" class="table table-striped">
    <thead>
    <tr>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td><a href="{{ route('users.index', ['id' =>$user->id]) }}" class="btn btn-info waves-effect btn-xs">Edit</a></td>
            <td><a href="{{ route('users.delete', ['id' => $user->id]) }}" class="btn btn-danger waves-effect btn-xs">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>