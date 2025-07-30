@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="page-content px-0">
        <div class="container-fluid">
            <div class="row">
                <!-- Left Column -->
                <div class="col-lg-4 mt-2 mb-2">
                    @include('order.partials.product-card')
                    @include('order.partials.info-card')
                    @include('order.partials.related-products')
                </div>

                <!-- Right Column -->
                <div class="col-lg-8 mt-2 mb-2">
                    <form id="orderForm" action="{{ route('order.process') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        
                        @include('order.partials.account-data')
                        @include('order.partials.nominal-selection')
                        @include('order.partials.payment-methods')
                        @include('order.partials.whatsapp-number')
                        
                        <button type="button" id="submitOrderBtn" class="btn btn-warning btn-block py-2 font-weight-bold">
                            <i class="fas fa-shopping-cart mr-2"></i> ORDER NOW
                        </button>

                        <!-- Modal Confirmation -->
                        @include('order.partials.confirmation-modal')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@include('order.partials.scripts')