@extends("master")
@section("context")
{{--  <section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free E-Commerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="user/images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                <img src="user/images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>100% Responsive Design</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="user/images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                <img src="user/images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free Ecommerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="user/images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                <img src="user/images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->  --}}

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        @foreach ($productType as $value)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">{{ $value->Name ?? '' }}</a></h4>
                                </div>
                            </div>
                        @endforeach
                    </div><!--/category-products-->
                    <div class="shipping text-center"><!--shipping-->
                        <img src="user/images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>

                    @foreach ($product as $value )
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="Avatar/{{$value->Image}}" width="300" height="300"/>
                                            <h2>{{$value->Price ??''}} VNĐ</h2>
                                            <p>{{$value->Name ??''}}</p>
                                            <a href="{{url('detail')}}" class="btn btn-default add-to-cart"><i class=""></i>View Detail</a>
                                        </div>
                                        {{-- <div class="product-overlay">    
                                            <div class="overlay-content">
                                                <h2>{{$value->Price ??''}}</h2>
                                                <p>{{$value->Name ??''}}</p>
                                                <a href="{{url("product/$value->id ")}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Detail</a>
                                            </div>
                                        </div> --}}
                                </div>
                                {{-- <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>

                    @endforeach


                </div><!--features_items-->
                <div>
                    {{ $product->links() }}
                </div>

                <div class="category-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            @php
                                $check =1;
                            @endphp
                            @foreach ($productType as  $value)
                                @if ($check ==1 )
                                    <li class="active"><a href="#{{$value->id}}" data-toggle="tab">{{$value->Name ??''}}</a></li>
                                    @php
                                       $check ++;
                                    @endphp
                                @else
                                <li><a href="#{{ $value->id ?? '' }}" data-toggle="tab">{{$value->Name ??''}}</a></li>
                                @endif
                            @endforeach

                        </ul>
                    </div>
                    <div class="tab-content">
                        @php
                            $check =1;
                        @endphp
                        @foreach ($productType as  $value)

                            @if ($check ==1 )
                                <div class="tab-pane fade active in" id="{{$value->id}}" >
                                    @foreach ($value->product as $pd )
                                        <div class="col-sm-3">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="Avatar/{{$pd->Image}}" width="200" height="200" alt="" />
                                                        <h2>{{ $pd->Price??''}} VNĐ</h2>
                                                        <p>{{ $pd->Name??''}}</p>
                                                        <a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @php
                                    $check ++;
                                @endphp
                            @else
                                <div class="tab-pane fade" id="{{$value->id}}" >
                                    @foreach ($value->product as $pd )
                                        <div class="col-sm-3">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="Avatar/{{$pd->Image}}" alt="" />
                                                        <h2>{{ $pd->Price??''}} VNĐ</h2>
                                                        <p>{{ $pd->Name??''}}</p>
                                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div><!--/category-tab-->


            </div>
        </div>
    </div>
</section>
@endsection
