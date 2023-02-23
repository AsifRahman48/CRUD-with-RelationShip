@extends('ecommerce.master')
@section('title','Cart Show')

@section('content')



    <div class="card">
        <div class="card-header text-center">
            Product Details
        </div>
    </div>

        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    x
                </button>
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="card-body">
            <div class="form-group">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            Image
                        </th>
                        <td>
                            @foreach($product->images as $image)
                                <img src="{{ asset($image->image_url) }}" width="300px" height="200px"/>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{ $product->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Price
                        </th>
                        <td>
                            {{ $product->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Quantity
                        </th>
                        <td>
                            {{ $product->qty }}
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="form-group">
                <form action="{{ route('addCart',$product->id) }}" method="POST">
                    @csrf
                   {{-- <input type="hidden" name="product_id" value="{{ $product->id }}">--}}
                    <button type="submit" class="btn btn-success">
                        Add To Cart
                    </button>
                </form>
                </div>

                <div class="form-group">
                    <a class="btn btn-info" href="{{ route('dashboard') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
