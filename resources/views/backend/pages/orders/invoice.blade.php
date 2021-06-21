<html>
<head>
    <title>$order->id</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @include('frontend.layouts.partials.styles')

    <style>
        .content-wrapper{
            background-color: #ffffff;
        }
        .invoice-header{
            background: #f7f7f7;
            padding: 10px 20px 10px 20px;
            border-bottom: 1px solid grey;
        }
        .invoice-right-top h3{
            padding-right: 20px;
            margin-top: 20px;
            color: #ec5d01;
            font-size: 55px !important;
            font-family: serif;
        }
        .invoice-left-top{
            border-left: 4px solid #ec5d01;
            padding-left: 20px;
            padding-top: 20px;
        }
        thead{
            background: #ec5d01;
            color: #FFF;
        }
        .authority h5{
            margin-top: -10px;
            color: #ec5d01;
        }

        .thanks h4{
            color: #ec5d01;
            font-size: 25px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }
        .side-address p{
            line-height: 6px;
            font-weight: 300;
        }
    </style>
</head>
<body>
<div class="content-wrapper">
    <!-- Page Title Header Starts-->

  <div class="invoice-header">
      <div class="float-left side-logo">
          <img src="{{ asset('images/icon.png') }}">
      </div>
      <div class="float-right side-address">
          <h4>LaraEcommerce</h4>
          <p>31/2, muradpur,Chattogram</p>
          <p>Phone: 0912093237</p>
          <p>Email: toahacse@gmail.com</p>
      </div>
      <div class="clearfix"></div>
  </div>

    <div class="invoice-descrition">
        <div class="invoice-left-top float-left">
            <h6>Invoice to</h6>
            <h3>{{ $order->name }}</h3>
            <div class="address">
                <p>
                    <strong>Address: </strong>
                    {{ $order->shipping_address }}
                </p>
                <p>Phone: {{ $order->phone_no }}</p>
                <p>Email: {{ $order->email }}</p>
            </div>
        </div>
        <div class="invoice-right-top float-right">
            <h3>Invoice #{{ $order->id}}</h3>
            <p>
                {{ $order->created_at }}
            </p>
        </div>
        <div class="clearfix"></div>
    </div>

        <div class="">

            <h3>Products</h3>

            @if($order->carts->count() > 0)
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Product Title</th>
                        <th>Product quantity</th>
                        <th>Unit Price</th>
                        <th>Sub total Price</th>
                    </tr>
                    </thead>
                    <tbody>

                    @php $total_price = 0; @endphp
                    @foreach($order->carts as $cart)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>
                                <a href="{{ route('products.show',$cart->product->slug) }}">{{ $cart->product->title }}</a>
                            </td>
                            <td>
                                {{ $cart->product_quantity }}
                            </td>
                            <td>
                                {{ $cart->product->price }} Taka
                            </td>
                            <td>
                                @php
                                    $total_price += $cart->product->price * $cart->product_quantity;
                                @endphp

                                {{ $cart->product->price * $cart->product_quantity }} Taka
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"></td>
                        <td>
                            Discount:
                        </td>
                        <td colspan="2">
                            <strong>{{ $order->custom_discount }} Taka</strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td>
                            Shipping cost:
                        </td>
                        <td colspan="2">
                            <strong>{{ $order->shipping_charge }} Taka</strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td>
                            Total:
                        </td>
                        <td colspan="2">
                            <strong>{{ $total_price + $order->shipping_charge - $order->custom_discount  }} Taka</strong>
                        </td>
                    </tr>

                    </tbody>
                </table>

            @endif

            <div class="thanks mt-3">
                <h4>Thank you for your business !!</h4>
            </div>

            <div class="authority float-right mt-5">
                <p>--------------------------------------</p>
                <h5>Authority Signature</h5>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>

</body>
</html>


