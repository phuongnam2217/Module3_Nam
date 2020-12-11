@extends('admin.master')
@section('tittle','Quản lí người dùng')
@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
        <li class="breadcrumb-item active">Danh sách danh mục</li>
        <!-- Breadcrumb Menu-->
    </ol>
@endsection
@section('content')
    <form action="{{route('users.search')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>
                <input type="text" name="search" class="form-control" value="{{$search ?? ""}}" placeholder="Search">
            </label>
        </div>
    </form>
    <div class="card">
        <div class="card-header"> DataTables
            <div class="card-header-actions">
            </div>
        </div>
        <div class="card-body">
            <div class="col-12">

            </div>
            <table class="table table-striped table-bordered datatable">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Desciption</th>
                    <th>Total Post</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $key => $category)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>{{$category->posts->count()}}</td>
                        <td><a class="btn btn-success" href="">
                                <svg class="c-icon">
                                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass')}}"></use>
                                </svg></a><a class="btn btn-info" href="">
                                <svg class="c-icon">
                                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-description')}}"></use>
                                </svg></a>
                            <a class="btn btn-danger" href=""  onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                                <svg class="c-icon">
                                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-trash')}}"></use>
                                </svg></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
