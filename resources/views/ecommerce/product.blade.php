@extends('ecommerce.master')
@section('title','Product')
@section('content')
  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->
                @foreach($product as $list)
                  <li>
                  <figure>
                      @foreach($list->images as $image)
                          <a class="aa-product-img" href="{{ route('cart_show',$list->id) }}">
                            <img src="{{ asset($image->image_url) }}" width='250px' height='300px' />
                          </a>
                        @endforeach

                          <div class="form-group">
                              <form action="{{ route('addCart',$list->id) }}" method="POST">
                                  @csrf
                                  <input type="submit" class=" aa-add-card-btn" value="Add to Cart">
                              </form>
                          </div>

                    <figcaption>
                      <h4 class="aa-product-title"><a href="{{ route('cart_show',$list->id) }}">{{ $list->name }}</a></h4>
                      <span class="aa-product-price">{{$list->price}}TK</span>
                       </figcaption>
                  </figure>
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                  </div>
                  <!-- product badge -->
                      <span class="aa-badge aa-hot" href="#">HOT!</span>
                </li>
                  @endforeach

              </ul>

            </div>
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
  <!-- footer -->


@endsection
