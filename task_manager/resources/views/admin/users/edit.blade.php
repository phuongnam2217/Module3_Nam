@extends('admin.master')
@section('tittle','Thêm mới người dùng')
@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
        <li class="breadcrumb-item active">Chỉnh sửa thông tin người dùng</li>
        <!-- Breadcrumb Menu-->
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <hr>
                    <div class="col-12">
                        @if (Session::has('success'))
                            <p class="text-success">
                                <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                            </p>
                        @endif
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="{{route('users.update',$user->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="col-form-label" for="username">Username</label>
                                    <input class="form-control" disabled value="{{$user->username}}" type="text" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="email">Email</label>
                                    <input class="form-control" value="{{$user->email}}" id="email" type="text" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="email">Phone</label>
                                    <input class="form-control" value="{{$user->phone}}" id="email" type="text" name="phone" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="email">Address</label>
                                    <input class="form-control" value="{{$user->address}}" id="email" type="text" name="address" placeholder="Email">
                                </div>
                                <div class="form-group d-flex justify-content-around">
                                    <a href="{{route('users.index')}}" class="btn btn-secondary">Back</a>
                                    <button class="btn btn-primary" type="submit" value="Edit">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
@endsection
