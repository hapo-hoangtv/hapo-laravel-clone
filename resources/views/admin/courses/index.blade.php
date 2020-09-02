@extends('admin.admin_lte')
@section('title','listcourse')
@section('contents')
@if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif         
    <center><h2>Danh sách khoá học</h2></center>
    <div class="col-md-4 mb-3">
        <form action="{{ Route('admin.course.search') }}" method="GET">
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
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
            <th>Time</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php $stt=0; foreach ($courses as $course): $stt++ ?>
    <tr>
        <td>{{ $stt }}</td>
        <td>{{ $course['name'] }}</td>
        <td><img src="{{ asset('./storage/image/'.$course['image']) }}" width="100px"></td>
        <td>{{ $course['description'] }}</td>
        <td>{{ $course['price'] }}</td>
        <td>{{ $course['time'] }}</td>
        <td><a href="{{ Route('admin.courses.edit', $course['id']) }}">Sửa</a></td>
        <td>
            <form action="{{ Route('admin.courses.destroy', $course['id']) }}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">Xóa</button>
            </form>
        </td>     
    </tr>
    <?php endforeach ?>
    </tbody>
    </table> 
    {{ $courses->appends($_GET)->links() }}
@endsection
