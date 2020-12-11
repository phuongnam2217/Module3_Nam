@extends('admin.master')
@section('tittle','Thêm mới người dùng')
@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Users</a></li>
        <li class="breadcrumb-item active">Thêm mới người dùng</li>
        <!-- Breadcrumb Menu-->
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{route('users.create')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="col-form-label" for="username">Username</label>
                                    <input class="form-control" id="username" type="text" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="email">Email</label>
                                    <input class="form-control" id="email" type="text" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                        <label class="col-form-label" for="password">Password</label>
                                        <input class="form-control" id="password" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="address">Address</label>
                                    <input class="form-control" id="address" type="text" name="address" placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="phone">Phone Number</label>
                                    <input class="form-control" id="phone" type="text" name="phone" placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit" name="signup" value="Sign up">Sign up</button>
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
