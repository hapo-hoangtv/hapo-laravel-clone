@extends('admin.admin_lte')
@section('title','listuser')
@section('contents')
@if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif         
    <center><h2>Danh sách User</h2></center>
    <div class="col-md-4 mb-3">
        <form action="{{ Route('admin.user.search') }}" method="GET">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" name="search" class="form-control">
                <span class="form-group-prepend ml-1">
                    <input type="submit" class="btn btn-primary" value="Search">
                </span>
            </div>
        </form>
    </div>
    <table class="table table-striped" border="1">
    <thead>
        <tr>
            <th>STT</th>
            <th>Name </th>
            <th>Email</th>
            <th>Phone</th>
            <th>Avatar</th>
            <th>Role</th>
            <th>Action</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php $stt=0; foreach ($users as $user): $stt++ ?>
    <tr>
        <td>{{ $stt }}</td>
        <td>{{ $user['name'] }}</td>
        <td>{{ $user['email'] }}</td>
        <td>{{ $user['phone'] }}</td>
        <td>{{ $user['avatar'] }}</td>
        <td>{{ $user['role_id'] }}</td>
        <td></td>
        <td><a href="{{ Route('admin.users.edit', $user['id']) }}" class="btn btn-primary">Sửa</a></td>
        <td>
            <form action="{{ Route('admin.users.destroy', $user['id']) }}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">Xóa</button>
            </form>
        </td>     
    </tr>
    <?php endforeach ?>
    </tbody>
    </table> 
    {{ $users->appends($_GET)->links() }}
@endsection
