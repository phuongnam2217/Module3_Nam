@extends('admin.master')
@section('tittle','Quản lí người dùng')
@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="#">Customers</a></li>
        <li class="breadcrumb-item active">Customers List</li>
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
                <a href="{{route('customers.create')}}" class="btn btn-lg btn-success">Add Customers</a>
            </div>
        </div>
        <div class="card-body">
            <div class="col-12">

            </div>
            <table class="table table-striped table-bordered datatable">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Birthday</th>
                    <th>Image</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $key => $customer)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$customer->username}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->address}}</td>
                        <td>{{$customer->birthday}}</td>
                        <td><img width="100px" src="{{asset('storage/'.substr($customer->images,7))}}" alt=""></td>
                        <td>
                            @foreach($customer->roles as $role)
                                <span class="badge badge-success">{{$role->name}}</span>
                            @endforeach
                        </td>
                        <td><a class="btn btn-success" href="">
                                <svg class="c-icon">
                                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass')}}"></use>
                                </svg></a><a class="btn btn-info" href="{{route('customers.edit',$customer->id)}}">
                                <svg class="c-icon">
                                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-description')}}"></use>
                                </svg></a>
                            <a class="btn btn-danger" href="{{route('customers.delete',$customer->id)}}"  onclick="return confirm('Bạn chắc chắn muốn xóa?')">
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
