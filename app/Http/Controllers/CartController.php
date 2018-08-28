<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use Cart;




class CartController extends Controller
{



    // public static function cart(Request $request) {
    //   //variables
    //   $getRequestId = $request->get('product_id');
    //   $foundCartItems = Cart::search(function($cartItem, $rowId) use ($request, $getRequest){
    //     return $cartItem->id === $getRequest;
    //   });
    //   if ($items = $foundCartItems->count() > 0) {
    //     $row_id = $foundCartItems->first()->rowId;
    //     $item = Cart::get($row_id);
    //   }
    //
    //
    //   //update/add new item to cart
    //   if ($request->isMethod('post')) {
    //     $getRequestId = $getRequest;
    //     $product = Product::find($getRequestId);
    //     $price=$product->price;
    //     if ($product->discountPrice() !== $product->price) {
    //       $price=$product->discountPrice();
    //     }
    //
    //     Cart::add(array('id' => $getRequestId, 'name' => $product->product_name, 'qty' => 1, 'price' => $price));
    //   }
    //
    //
    //   //increment the quantity
    //   if ($items && ($request->get('increment')) == 1)
    //   {
    //     Cart::update($row_id, $item->qty + 1);
    //   }
    //
    //
    //   //decrease the quantity
    //   if ($items && ($request->get('decrease')) == 1 && $items ){
    //     Cart::update($row_id, $item->qty - 1);
    //   }
    //
    //
    //   //remove item from cart
    //   if (($items && ($request->get('remove')) == 1) && ($items) ) {
    //     Cart::remove($row_id);
    //   }
    //
    //   return $cart = Cart::content();
    // }





    public  function cart(Request $request) {

      //variables
      $getRequestId = $request->get('product_id');
      $foundCartItems = Cart::search(function($cartItem, $rowId) use ($request, $getRequestId){
        return $cartItem->id === $getRequestId;
      });
      if ($items = $foundCartItems->count() > 0) {
        $row_id = $foundCartItems->first()->rowId;
        $item = Cart::get($row_id);
      }


      //update/add new item to cart
      if ($request->isMethod('post')) {
        $product = Product::find($getRequestId);
        $price=$product->price;
        if ($product->discountPrice() !== $product->price) {
          $price=$product->discountPrice();
        }

        Cart::add(array('id' => $getRequestId, 'name' => $product->product_name, 'qty' => 1, 'price' => $price));
        // $response['code'] = 200;
        // return Response::json($response);
      }


      //increment the quantity
      if ($items && ($request->get('increment')) == 1)
      {
        Cart::update($row_id, $item->qty + 1);
      }


      //decrease the quantity
      if ($items && ($request->get('decrease')) == 1 && $items ){
        Cart::update($row_id, $item->qty - 1);
      }


      //remove item from cart
      if (($items && ($request->get('remove')) == 1) && ($items) ) {
        Cart::remove($row_id);
      }

      return $cart = Cart::content();
    }






  public function showCart(Request $request )
  {
    $cart=self::cart($request);
    return view('cart')->with('cart', $cart);
  }




}
