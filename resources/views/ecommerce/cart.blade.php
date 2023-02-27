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
                            <div class="table-responsive">
                                <form id="update-cart-form">
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
                                                    <button class="delete-product-btn"
                                                            data-product-id="{{ $list->id }}">
                                                        <a class="remove">
                                                            <fa class="fa fa-close"></fa>
                                                        </a>
                                                    </button>
                                                </td>
                                                <td><img src="{{ asset($list->image) }}"/></td>
                                                <td>{{ $list->product_name }}</td>
                                                <td>{{ $list->price }}TK</td>
                                                <td>
                                                    <input class="aa-cart-quantity qty" type="number"
                                                           name="qty[{{$list->id}}]"
                                                           id="qty{{ $list->id }}" value="{{ $list->qty }}"
                                                           onchange="updatetotal({{ $list->id }},{{ $list->price }})">
                                                </td>
                                                <td id="total_price_{{ $list->id }}">{{$list->price * $list->qty}}TK
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <button class="btn btn-primary" type="submit" id="button" onclick="updateqty()">
                                        Update
                                    </button>
                                </form>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-danger"><a href="{{ route('payment') }}">Order now</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        function updatetotal(id, price) {
            var qty = $('#qty' + id).val();
            $('#qty').val(qty);
            $('#total_price_' + id).html(qty * price + 'TK');
        }

        function updateqty() {
            $('#update-cart-form').submit(function (e) {
                e.preventDefault();
                var qty = $(this).serialize();
                $.ajax({
                    url: "{{ route('cartUpdate') }}",
                    type: "POST",
                    data: qty,
                    dataType: "json",
                    success: function (response) {
                        alert(response.message);
                    },
                });
            });
        }

        $('.delete-product-btn').on('click', function (event) {
            event.preventDefault();

            var productId = $(this).data('product-id');

            $.ajax({
                url: '{{ route('cartDelete') }}',
                type: 'POST',
                data: {id: productId},
                success: function (response) {
                    alert(response.message);
                },
            });
        });


        {{--$(document).ready(function () {--}}
        {{--    $('#update-cart-form').on('submit', function (e) {--}}
        {{--        e.preventDefault();--}}
        {{--        var formData = $(this).serialize();--}}
        {{--        $.ajax({--}}
        {{--            url: "{{ route('cartUpdate') }}",--}}
        {{--            type: "POST",--}}
        {{--            data: formData,--}}
        {{--            dataType: "json",--}}
        {{--            success: function (response) {--}}
        {{--                alert(response.message);--}}
        {{--            },--}}
        {{--            error: function (xhr, status, error) {--}}
        {{--                console.log(xhr.responseText);--}}
        {{--            }--}}
        {{--        });--}}
        {{--    });--}}
        {{--});--}}


        /*function updateQuantity(id){
            var quantity=$('#qty'+id).val();
            $.ajax({
                url:'cart-update/'+id,
                type: 'PUT',
                data: {
                    qty:quantity,
                },
                success: function (response){
                    alert(response);
                }
            })
        }*/
    </script>
@endsection
