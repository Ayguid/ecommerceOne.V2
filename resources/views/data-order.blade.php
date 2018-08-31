@extends('layouts.app')

@section('content')





  @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
  @endif





  <div class="orderDataCart">









    <div class="">
      @if(count($data['cart']))
        <table class="order">
          <thead>
            <tr class="cart_menu">
              <td class="image">Item</td>
              <td class="description"></td>
              <td class="price">Price</td>
              <td class="quantity">Quantity</td>
              <td class="total">Total</td>
            </tr>
          </thead>
          <tbody>
            @foreach($data['cart'] as $item)
              <tr>

                {{-- {{dd($item)}} --}}
                <td class="cart_product">
                  <a href=""><img src="images/cart/one.png" alt=""></a>
                </td>
                <td class="cart_description">
                <a  href="{{route('showProduct', $item->id)}}">{{$item->name}}</a>
                  <p>Web ID: {{$item->id}}</p>
                </td>
                <td class="cart_price">
                  <p>${{$item->price}}</p>

                </td>
                <td class="cart_quantity">
                  <div class="cart_quantity_button">
                    {{-- <input class="cart_quantity_input" type="text" name="quantity" value="{{$item->qty}}" autocomplete="off" size="2"> --}}
                    <p>{{$item->qty}}</p>
                  </div>
                </td>
                <td class="cart_total">
                  <p class="cart_total_price">${{$item->subtotal}}</p>
                </td>

              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>



    </table>




  </div>



  <div class="userAddresses">
    {{-- {{$data['user']->addresses}} --}}




<form class="" action="index.html" method="post">


    <div class="billingAddress">

        <table class="">
          <thead>
            <tr class="">
              <td class="">  <p> Choose your Billing Address</p></td>
            </tr>
          </thead>
          <tbody>
            @foreach ($data['user']->addresses as $key => $address)

              @if ($address->addressType->address_type_code == 1)


              <tr>

                {{-- {{dd($item)}} --}}
                <td class="">
                  {{$address->premise->addressPretty()}}
                </td>
                <td class="">
                  <input class="" type="radio" name="exampleRadios"  value="exampleRadios" >
                </td>

              </tr>

              @endif

            @endforeach



        </tbody>
      </table>
    </div>


    <div class="shippingAddress">

        <table class="">
          <thead>
            <tr class="">
              <td class="">  <p> Choose your Shipping Address</p></td>
            </tr>
          </thead>
          <tbody>
            @foreach ($data['user']->addresses as $key => $address)

              @if ($address->addressType->address_type_code == 2)


              <tr>

                {{-- {{dd($item)}} --}}
                <td class="">
                  {{$address->premise->addressPretty()}}
                </td>
                <td class="">
                  <input class="" type="radio" name="exampleRadios1"  value="exampleRadios1" >
                </td>

              </tr>

              @endif

            @endforeach



        </tbody>
      </table>
    </div>
    <input type="submit" name="Submit" value="Submit">
</form>


</div>












@endsection
