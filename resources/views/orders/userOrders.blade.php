@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">Home</div>

                <div class="card-body">
                  @if(Session::has('alert-success'))
                    <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
                  @endif
                  @if(Session::has('alert-danger'))
                    <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! session('alert-danger') !!}</strong></div>
                  @endif
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}


                    <div class="showcase">
                      @component('components.who')
                      @endcomponent
                    </div>

                    <div class="showcase">


                      @isset($user_orders)
                        {{-- {{dd($user_orders)}} --}}
                        @foreach ($user_orders as $order)
                          Order ID: {{$order->id}} <br>
                          Order Total: {{$order->totalBill()}} $ <br>
                          Products: <ul>@foreach ($order->products as $product)

                            <li>  {{$product->product_name}}</li>


                          @endforeach
                          </ul>
                          <br>
                          {{-- {{App\User_Order::totalBill()}} --}}
                          {{-- {{App\User_Order::totalBill()}} --}}
                          @endforeach
                          <br>



                      @endisset
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
