<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function showToCard()
    {
        $cart = session('cart');
        return view('cart.index',compact('cart'));
    }

    public function checkOut()
    {
        $cart = session('cart');
        return view('cart.checkout',compact('cart'));
    }

    public function addtoCart($idProduct)
    {
        $product = Product::findOrFail($idProduct);
        $oldCart = session('cart');
        $cart = new Cart($oldCart);
        $cart->add($product);
        session()->put('cart',$cart);
        $newCart = session('cart')->items;
        Session::flash('success',"Add Product To Card Successfully");
        $success = "Add Product To Card Successfully";
        $qty = session('cart')->totalQty;
        $totalPrice = session('cart')->totalPrice;
        return response()->json(['qty'=>$qty,'total'=>$totalPrice,'success'=>$success,'cart'=>$newCart]);
    }
    public function delete($idProduct)
    {
        $oldCart = session('cart');
        $cart = new Cart($oldCart);
        $cart->delete($idProduct);
        if(count($cart->items) > 0){
            session()->put('cart',$cart);
        }else{
            session()->forget('cart');
        }
        Session::flash('success',"Delete Product Successfully");
        return back();
    }
    public function decrease($idProduct)
    {
        $oldCart = session('cart');
        $cart = new Cart($oldCart);
        $cart->decrease($idProduct);
        if(count($cart->items) > 0){
            session()->put('cart',$cart);
        }else{
            session()->forget('cart');
        }
        Session::flash('success',"Decrease success");
        $newCart = session('cart')->items;
        $success = "Add Product To Card Successfully";
        $qty = session('cart')->totalQty;
        $totalPrice = session('cart')->totalPrice;
        return response()->json(['qty'=>$qty,'total'=>$totalPrice,'success'=>$success,'cart'=>$newCart]);
    }
    public function createOrder(Request $request)
    {
//        dd($order_details);
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->save();
        $order = new Order();
        $order->customer_id = $customer->id;
        $order->save();
        $orderId = $order->id;
        $cart = session('cart');
        foreach ($cart->items  as $item)
        {
            $product_id = $item['product']->id;
            $quantity = $item['totalQty'];
            $priceEach = $item['totalPrice'];
            DB::table('order_details')->insert([
                'order_id'=>$orderId,
                'product_id'=>$product_id,
                'quantity'=>$quantity,
                'priceEach'=>$priceEach
            ]);
            session()->forget('cart');
        };
    }
    public function removeAll()
    {
        session()->forget('cart');
        return back();
    }
}
