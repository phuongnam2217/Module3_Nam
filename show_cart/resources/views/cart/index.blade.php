@extends('master')
@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">E-COMMERCE CART</h1>
        </div>
    </section>
    @if(session('cart'))
    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th scope="col" class="text-right">Total Price</th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart->items as $item)
                        <tr>
                            <td><img width="100px" src="{{$item['product']->image}}" alt=""></td>
                            <td>{{$item['product']->name}}</td>
                            <td id="checkout">
                                <form>
                                    <div class="row d-flex justify-content-around">
                                        <div class="">
                                            <a href="javascript:void(0)" data-id="{{$item['product']->id}}" class="btn btn-primary descrease"> < </a>
                                        </div>
                                        <div class="">
                                            <input type="text" disabled value="{{$item['totalQty']}}" class="form-control qtyProduct{{$item['product']->id}}">
                                        </div>
                                        <div class="">
                                            <a href="javascript:void(0)" data-id="{{$item['product']->id}}" class="btn btn-primary addCart"> > </a>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <td class="text-right">{{$item['product']->price}}$</td>
                            <td  class="text-right priceProduct{{$item['product']->id}}">{{$item['totalPrice']}}$</td>
                            <td class="text-right"><a href="{{route('cart.delete',$item['product']->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a> </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>
                                <a href="{{route('cart.remove')}}"> Remove ALL</a>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class=""><strong style="font-size: 26px">Total</strong></td>
                            <td id="total" style="font-size: 26px" class="text-right">{{$cart->totalPrice}}$</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a href="{{route('home.index')}}" class="btn btn-block btn-light">Continue Shopping</a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <a href="{{route('cart.checkout')}}" class="btn btn-lg btn-block btn-success text-uppercase">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <h2 class="text-center text-danger">Vui long them san pham vao gio hang</h2>
    @endif
@endsection
