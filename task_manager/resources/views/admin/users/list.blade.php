@extends('admin.master')
@section('tittle','Quản lí người dùng')
@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Users</a></li>
        <li class="breadcrumb-item active">Danh sách người dùng</li>
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
                    <th>Username</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->phone}}</td>
                    <td><span class="badge {{$user->status == 1 ? 'badge-success' : 'badge-secondary' }}">{{$user->status == 1 ? 'ACTIVE' : 'DISABLE' }}</span></td>
                    <td><a class="btn btn-success" href="{{route('users.show',$user->id)}}">
                            <svg class="c-icon">
                                <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass')}}"></use>
                            </svg></a><a class="btn btn-info" href="{{route('users.edit',$user->id)}}">
                            <svg class="c-icon">
                                <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-description')}}"></use>
                            </svg></a>
                        <a class="btn btn-danger" href="{{route('users.destroy',$user->id)}}"  onclick="return confirm('Bạn chắc chắn muốn xóa?')">
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
