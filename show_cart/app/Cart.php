<?php


namespace App;


class Cart
{
    public $items = [];
    public $totalPrice = 0;
    public $totalQty = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQty = $oldCart->totalQty;
        }
    }

    public function add($product)
    {
        $storeItem = [
            'product'=>$product,
            'totalPrice'=>0,
            'totalQty'=>0
        ];
        if(array_key_exists($product->id,$this->items)){
            $storeItem = $this->items[$product->id];
        }
        $storeItem['totalQty']++;
        $storeItem['totalPrice'] += $product->price;

        $this->items[$product->id] = $storeItem;
        $this->totalQty++;
        $this->totalPrice += $product->price;
    }
    public function delete($product)
    {
        if(array_key_exists($product,$this->items)){
            $storeItem = $this->items[$product];
            $this->totalQty -= $storeItem['totalQty'];
            $this->totalPrice -= $storeItem['totalPrice'];
            unset($this->items[$product]);
        }
    }
    public function decrease($product){
        if(array_key_exists($product,$this->items)){
            $storeItem = $this->items[$product];
            $storeItem['totalQty']--;
            $storeItem['totalPrice']-= $this->items[$product]['product']->price;
            $this->items[$product] = $storeItem;
            $this->totalQty --;
            $this->totalPrice -= $this->items[$product]['product']->price;
            if($storeItem['totalQty'] == 0){
                unset($this->items[$product]);
            }
        }
    }
}
