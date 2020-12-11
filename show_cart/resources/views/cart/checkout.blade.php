@extends('master')
@section('content')
    <body>
    <div class="container">
        <div class="row flex-wrap-reverse">
            <div class="col">
                <div class="my-5">
                    <div class="header">
                        <img
                            src="https://cdn.shopify.com/s/files/1/1687/1083/files/logo_Mollyclo_2019-black_381741f7-4ec7-4159-a976-9fc1e43dfe9c.png?157"
                            alt="">
                    </div>
                    <div class="title">
                        Check Out
                    </div>
                    <div class="shipInfo mt-4">
                        <div class="label-shipInfo">
                            <label for="">Shipping Information</label>
                        </div>
                        <form action="" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="name" class="form-control float-right"
                                       placeholder="Full name"
                                       required>
                            </div>
                            <div class="input-group mt-2">
                                <input type="text" name="address" class="form-control" placeholder="Address"
                                       required>
                            </div>
                            <div class="input-group mt-2">
                                <input type="text" name="phone" class="form-control float-left mr-1"
                                       placeholder="Phone Number" required>
                                <input type="email" name="email" class="form-control float-right ml-1"
                                       placeholder="Email address" required>
                                <div class="clearfix"></div>
                            </div>
                            <div class="float-left mt-2">
                                <a href="{{route('card.show')}}" class="cart_return">
                                    < Return to cart</a></div>
                            <div class="float-right mt-2">
                                <input type="submit" class="btn btn-dark p-3" value="Continue Payment">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col payment-right my-4" style="background: #FAFAFA;">
                <div class="mr-3">
                    <div class="my-2 checkoutHeader">
                        Cart information
                    </div>
                    <div class="">
                        <table class="table">
                            <tbody>
                                @foreach($cart->items as $item)
                                    <tr>
                                        <td>
                                            <div class="img_wrapper">
                                                <img src="{{$item['product']->image}}" alt="" class="imgCheckout">
                                                <span class="qtyCheckout">
                                            {{$item['totalQty']}}
                                        </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkoutItemName">
                                                {{$item['product']->name}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkoutItemPrice">
                                                {{$item['totalPrice']}}$
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2 checkoutFooter">
                        <div class="float-left ml-3 left">
                            Total
                        </div>
                        <div class="float-right right">
                            {{$cart->totalPrice}}$
                        </div>
                        <div class="clearfix"></div>
                        <div class="float-left ml-3 left">
                            Shipping
                        </div>
                        <div class="float-right right">
                            Free
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
