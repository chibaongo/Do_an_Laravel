@extends('master')
@section('context')
    <div class="controller">
        <div class="row">
            <div class="col-sm-12 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">Danh sách tìm kiếm</h2>

                    @if (count($product) > 0)
                        @foreach ($product as $value)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="Avatar/{{ $value->Image }}" alt="" />
                                            <h2>{{ $value->Price ?? '' }}</h2>
                                            <p>{{ $value->Name ?? '' }}</p>
                                            <a href="{{ url("product/$value->id ") }}"
                                                class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View
                                                Detail</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                {{-- <h2>{{ $value->Price ?? '' }}</h2>
                                                <p>{{ $value->Name ?? '' }}</p> --}}
                                                <a href="{{ url("product/$value->id ") }}"
                                                    class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>View Detail</a>
                                            </div>
                                        </div>
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
                    @else
                        <div class="alert alert-primary" style="text-align: center;" role="alert">
                            Không có sản phẩm bạn tìm !!!
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
