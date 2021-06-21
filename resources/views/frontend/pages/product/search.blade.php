@extends('frontend.layouts.master')

@section('content')
    <div class="container margin-top-20">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.layouts.partials.productSidbar');
            </div>
            <div class="col-md-8">
                <div class="widget">
                    <h3>Search Products for - <span class="badge badge-primary">{{ $search }}</span></h3>
                   @include('frontend.pages.product.partials.all_products')

                </div>
            </div>
        </div>
    </div>
@endsection