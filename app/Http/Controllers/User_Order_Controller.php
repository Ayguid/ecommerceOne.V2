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







  public function showOrderData()
  {
    $data=[

    'cart'=>$cart = Cart::content(),
    'user'=>$user= Auth::user()
];
    return view('data-order')->with('data', $data);
  }




  //show user Orders
    public static function showOrders()
    {
      $user_orders=Auth::user()->orders;
      return view('orders.userOrders')->with('user_orders', $user_orders);
    }





  public function deleteOrder(Request $request)
  {

    $user_order= User_Order::find($request->order_id);
    $statusCode=$user_order->order_status_code;


    if ($user_order->user_id === Auth::user()->id && $user_order->fixed_user_id === Auth::user()->id )
    {

      if ($statusCode==1)
      {
        foreach ($user_order->items as $key => $item) {
          $item->delete();
        }
        $user_order->delete();
      }


      else
      {
        $user_order->user_id=0;
        $user_order->update();
      }



      return self::showOrders();
    }
  }






  public static function cartToOrder(Request $request)
  {
    $cart = Cart::content();
    if ($cart->count() > 0)
    {
      $user_order=new User_Order();
      $user_order->user_id=Auth::user()->id;
      $user_order->fixed_user_id=Auth::user()->id;
      $user_order->billing_premise_id=$request->billing_premise_id;
      $user_order->shipping_premise_id=$request->shipping_premise_id;
      $user_order->order_placed_datetime= new Carbon();;
      $saveCart=$user_order->save();

      foreach ($cart as $key => $cartItem)
      {
        $order_item= new Order_Item();
        $order_item->product_id=$cartItem->id;
        $order_item->item_order_quantity=$cartItem->qty;
        $order_item->item_price=$cartItem->price;
        $user_order->items()->save($order_item);
      }
      Cart::destroy();

      if ($saveCart)
      {

        if($request->billing_premise_id ==null)
        {
          return self::showOrders();
        }
        return view('payment-options');
      }
    }
    else
    { //redirigir bien si hay errores
      return view('payment-options');
    }

  }










}
