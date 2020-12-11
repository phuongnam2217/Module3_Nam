@extends('admin.master')
@section('tittle','Thêm mới người dùng')
@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Customers</a></li>
        <li class="breadcrumb-item active">Add Customer</li>
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
                        <div class="col-md-12">
                            <form action="{{route('customers.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="col-form-label" for="username">Name</label>
                                    <input value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" id="username" type="text" name="name"
                                           placeholder="name">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="username">Username</label>
                                    <input value="{{old('username')}}" class="form-control @error('username') is-invalid @enderror " id="username" type="text" name="username"
                                           placeholder="Username">
                                    @error('username')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="email">Email</label>
                                    <input value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" id="email" type="text" name="email" placeholder="Email">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="images">Images</label>
                                    <input class="form-control @error('images') is-invalid @enderror" id="images" type="file" name="images" placeholder="Images">
                                    @error('images')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="birthday">BirthDay</label>
                                    <input value="{{old('birthday')}}" class="form-control @error('birthday') is-invalid @enderror" id="birthday" type="date" name="birthday" placeholder="Email">
                                    @error('birthday')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="address">Address</label>
                                    <input value="{{old('address')}}" class="form-control @error('address') is-invalid @enderror" id="address" type="text" name="address"
                                           placeholder="Address">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Role</label>
                                    @foreach($roles as $role)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="roles[{{$role->id}}]" value="{{$role->id}}" class="custom-control-input" id="customCheck{{$role->id}}">
                                            <label class="custom-control-label" for="customCheck{{$role->id}}">{{$role->name}}</label>
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
