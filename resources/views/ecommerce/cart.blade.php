@extends('ecommerce.master')
@section('title', 'Cart')

@section('content')
    <div class="container">
        <a class="btn btn-success" href="{{ route('dashboard') }}"> Back</a>
    </div>

    <div class="card">
        <div class="card-header text-center">
            Cart Page
        </div>
    </div>

    <!-- Cart view section -->
    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-view-area">
                        <div class="cart-view-table">
                            <form action="">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($product as $list)
                                            <tr>
                                                <td>
                                                    <form action="{{ route('cartDelete',$list->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">
                                                            <a class="remove" >
                                                                <fa class="fa fa-close"></fa>
                                                            </a>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td><img src="{{ asset($list->image) }}"/></td>
                                                <td>{{ $list->product_name }}</td>
                                                <td>{{ $list->price }}TK</td>
                                                <td> {{ $list->qty }}{{--<input class="aa-cart-quantity" type="number" name="qty" id="qty"  value="{{ $list->qty }}"
                                   onchange="updateqty({{ $list->price }})">--}}</td>
                                                <td id="total_price">{{$list->price * $list->qty}}TK</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </form>

@endsection

{{--@section('script')
    <script>
        function updateqty(price){
            var qty=jQuery('#qty').val();
            jQuery('#qty').val(qty);
            jQuery('#total_price').html(qty*price+'TK');
        }
    </script>
@endsection--}}
