@extends('frontend.layouts.master')

@section('content')
    <div class="container margin-top-20 mb-5">

        <div class="card card-body">
            <h2>Confirm Item</h2>
            <hr/>
            <div class="row">
                <div class="col-md-7 border-right">

                    @foreach(App\Models\Cart::totalCarts() as $cart)
                        <p>{{ $cart->product->title }} -
                            <strong>{{ $cart->product->price }} Taka</strong>
                            - {{ $cart->product_quantity }} item
                        </p>
                    @endforeach
                    <p>
                        <a href="{{ route('carts') }}">
                            Change cart ittem
                        </a>
                    </p>
                </div>
                <div class="col-md-5">
                    @php $total_price = 0; @endphp
                    @foreach(App\Models\Cart::totalCarts() as $cart)
                        @php
                            $total_price += $cart->product->price * $cart->product_quantity;
                        @endphp
                    @endforeach
                    <p>
                        Total price : <strong> {{ $total_price }}</strong> Taka
                    </p>
                    <p>Total price With Shipping cost : <strong> {{ $total_price + App\Models\Setting::first()->shipping_cost}}</strong> Taka</p>
                </div>
            </div>

        </div>


        <div class="card card-body mt-2" >
            <h2>Shipping address</h2>

            <form method="POST" action="{{ route('checkouts.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Reciever Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::check() ? Auth::user()->first_name. ' ' . Auth::user()->last_name : ''}}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone No') }}</label>

                    <div class="col-md-6">
                        <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no : '' }}" required autocomplete="phone_no">

                        @error('phone_no')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                    <label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address') }}</label>

                    <div class="col-md-6">
                        <textarea id="shipping_address" class="form-control @error('shipping_address') is-invalid @enderror" name="shipping_address" rows="4" required autocomplete="shipping_address"> {{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>

                        @error('shipping_address')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Additional Message(optional)') }}</label>

                    <div class="col-md-6">
                        <textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" rows="4" required autocomplete="message"> </textarea>

                        @error('message')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Select a payment method') }}</label>

                    <div class="col-md-6">
                        <select class="form-control" name="payment_method_id" required id="payments">
                            <option value="">Select a payment method please</option>
                            @foreach($payments as $payment)
                                <option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
                            @endforeach
                        </select>

                        @foreach($payments as $payment)
                                @if($payment->short_name == 'cash_in')
                                    <div id="payment_{{ $payment->short_name }}" class="hidden alert alert-success text-center mt-2">
                                        <h3>For Cash in there is nothing necessary.. Just click Finish Order. </h3>
                                        <br>
                                        <small>
                                            You will get your Product in two or three business days..
                                        </small>
                                    </div>
                                    @else
                                    <div id="payment_{{ $payment->short_name }}" class="hidden alert alert-success text-center mt-2">
                                        <h3>{{ $payment->name }} Payment</h3>
                                        <p>
                                            <strong>
                                                {{ $payment->name }} No {{ $payment->no }}
                                            </strong>
                                            <br>
                                            <strong>
                                                Account Typa:  {{ $payment->type }}
                                            </strong>
                                        </p>
                                        <div class="alert alert-success">
                                            Please send the avobe money to this Bkash Number amd write your transaction code below there
                                        </div>

                                    </div>
                                @endif

                        @endforeach
                        <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Enter transaction code">




                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Order now') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>


    </div>
@endsection

@section('scripts')


    <script type="text/javascript">
        $("#payments").change(function () {
            $payment_method = $("#payments").val();
           if($payment_method == 'cash_in'){
               $("#payment_cash_in").removeClass('hidden');
               $("#payment_bkash").addClass('hidden');
               $("#payment_rocket").addClass('hidden');
           }
           else if($payment_method == 'bkash'){
               $("#payment_bkash").removeClass('hidden');
               $("#transaction_id").removeClass('hidden');
               $("#payment_cash_in").addClass('hidden');
               $("#payment_rocket").addClass('hidden');

           }else if($payment_method == 'rocket'){
               $("#payment_rocket").removeClass('hidden');
               $("#transaction_id").removeClass('hidden');
               $("#payment_bkash").addClass('hidden');
               $("#payment_cash_in").addClass('hidden');
            }


        })
    </script>

@endsection

