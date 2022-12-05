@extends("master")
@section('context')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                  

                    <div class="shipping text-center"><!--shipping-->
                        <img src="user/images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="user/images/product-details/1.jpg" alt="" />
                       
                        </div>
                       
                    </div>
                   
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                           
                            <h2>Anne Klein Sleeveless Colorblock Scuba</h2>
                          
                            <img src="user/images/product-details/rating.png" alt="" />
                            <span>
                                <span>US $59</span>
                                <label>Quantity:</label>
                                <input type="text" value="3" />
                                <button type="button" class="btn btn-fefault cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </button>
                            </span>
                           
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->


            </div>
        </div>
    </div>
</section>
@endsection
