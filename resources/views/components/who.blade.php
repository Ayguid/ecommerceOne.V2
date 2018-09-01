<div class="">


@if (Auth::guard('web')->check())
<p class="text-success">
You are Logged In as a <strong>USER</strong>
</p>

<a href="{{route('showOrders')}}">My Orders</a>
{{-- {{DD(Auth::guard('web')->user())}} --}}
{{-- @foreach (Auth::guard('web')->user()->orders as $key => $order)
{{$order}}
@endforeach
--}}

@else


  <p class="text-danger">
    You are Logged Out as a <strong>USER</strong>
  </p>

@endif



@if (Auth::guard('admin')->check())
<p class="text-success">
You are Logged In as a <strong>ADMIN</strong><a href="{{route('admin.logout')}}">&nbsp &nbsp Log Out</a>&nbsp
<a href="{{route('admin.addProducts')}}">Add Product</a>&nbsp
<a href="{{route('admin.addCategories')}}">Add Category</a>&nbsp
<a href="{{route('admin.addBrands')}}">Add Brand</a>&nbsp
{{-- <a href="{{route('admin.showProducts')}}">Show Products</a> --}}
</p>
{{-- @else
  <p class="text-danger">
    You are Logged Out as a <strong>ADMIN</strong>
  </p> --}}


@endif
</div>
