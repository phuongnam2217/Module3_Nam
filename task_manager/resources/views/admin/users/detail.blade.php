@extends('admin.master')
@section('tittle','Chi tiết khách hàng')
@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
        <li class="breadcrumb-item active">Chi tiết người dùng</li>
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
                            <h3>Mã khách hàng: {{$user->id}}</h3>
                            <h4>Tên khách hàng: {{$user->username}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
@endsection
