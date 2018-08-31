<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User_Order;
use App\Order_Item;
use Cart;
use Carbon\Carbon;


class User_Order_Controller extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  // public static function cartToOrder(Request $request)
  // {
  //   $cart = Cart::content();
  //
  //
  //   if ($cart->count() > 0)
  //   {
  //
  //     $user_order=new User_Order();
  //     $user_order->user_id=Auth::user()->id;
  //     $user_order->order_status_code='1';
  //     $user_order->order_placed_datetime= new Carbon();;
  //     $saveCart=$user_order->save();
  //
  //     foreach ($cart as $key => $cartItem)
  //     {
  //       $order_item= new Order_Item();
  //       $order_item->product_id=$cartItem->id;
  //       $order_item->item_order_quantity=$cartItem->qty;
  //       $order_item->item_price=$cartItem->price;
  //       $user_order->items()->save($order_item);
  //     }
  //     Cart::destroy();
  //
  //     if ($saveCart)
  //     {
  //
  //       return redirect(route('shipping'));
  //     }
  //   }
  //
  //   else
  //   {
  //     return redirect(route('productListing'));
  //   }
  //
  // }


  public function showOrderData()
  {
    $data=[

    'cart'=>$cart = Cart::content(),
    'user'=>$user= Auth::user()
];



    return view('data-order')->with('data', $data);
  }




}
