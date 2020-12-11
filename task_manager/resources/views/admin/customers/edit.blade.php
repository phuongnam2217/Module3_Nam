@extends('admin.master')
@section('tittle','Thêm mới người dùng')
@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Customers</a></li>
        <li class="breadcrumb-item active">Edit Customer</li>
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
                            <form action="{{route('customers.update',$customer->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-form-label" for="name">Name</label>
                                    <input class="form-control" value="{{$customer->name}}" id="name" type="text"
                                           name="name"
                                           placeholder="name">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="username">Username</label>
                                    <input class="form-control" value="{{$customer->username}}" disabled id="username"
                                           type="text" name="username"
                                           placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="email">Email</label>
                                    <input class="form-control" id="email" value="{{$customer->email}}" type="text"
                                           name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="address">Address</label>
                                    <input class="form-control" id="address" value="{{$customer->address}}" type="text"
                                           name="address"
                                           placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="">Image Current</label>
                                    <div class="">
                                        <img width="100px" src="{{asset('storage/'.substr($customer->images,7))}}"
                                             alt="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="birthday">BirthDay</label>
                                    <input value="{{$customer->birthday}}"
                                           class="form-control @error('birthday') is-invalid @enderror" id="birthday"
                                           type="date" name="birthday" placeholder="Email">
                                    @error('birthday')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Role</label>
                                    @foreach($roles as $role)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="roles[{{$role->id}}]"
                                                   @foreach($customer->roles as $value)
                                                   @if($value->name == $role->name)
                                                   checked
                                                   @endif
                                                   @endforeach
                                                   value="{{$role->id}}" class="custom-control-input"
                                                   id="customCheck{{$role->id}}">
                                            <label class="custom-control-label"
                                                   for="customCheck{{$role->id}}">{{$role->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit" value="Sign up">Sign
                                        up
                                    </button>
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
