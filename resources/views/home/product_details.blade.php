<!DOCTYPE html>
<html>
   <head>
    <!-- use base while you are not geeting the css from public folder-->
      <base href="/public">
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Let's Buy</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

     <style> a{text-decoration: none !important}.card-product-list, .card-product-grid{margin-bottom: 0}.card{width: 500px;position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;margin-top: 50px}.card-product-grid:hover{-webkit-box-shadow: 0 4px 15px rgba(153, 153, 153, 0.3);box-shadow: 0 4px 15px rgba(153, 153, 153, 0.3);-webkit-transition: .3s;transition: .3s}.card-product-grid .img-wrap{border-radius: 0.2rem 0.2rem 0 0;height: 220px}.card .img-wrap{overflow: hidden}.card-lg .img-wrap{height: 280px}.card-product-grid .img-wrap{border-radius: 0.2rem 0.2rem 0 0;height: 275px;padding: 16px}[class*='card-product'] .img-wrap img{height: 100%;max-width: 100%;width: auto;display: inline-block;-o-object-fit: cover;object-fit: cover}.img-wrap{text-align: center;display: block}.card-product-grid .info-wrap{overflow: hidden;padding: 18px 20px}[class*='card-product'] a.title{color: #212529;display: block}.rating-stars{display: inline-block;vertical-align: middle;list-style: none;margin: 0;padding: 0;position: relative;white-space: nowrap;clear: both}.rating-stars li.stars-active{z-index: 2;position: absolute;top: 0;left: 0;overflow: hidden}.rating-stars li{display: block;text-overflow: clip;white-space: nowrap;z-index: 1}.card-product-grid .bottom-wrap{padding: 18px;border-top: 1px solid #e4e4e4}.bottom-wrap-payment{padding: 0px;border-top: 1px solid #e4e4e4}.rated{font-size: 10px;color: #b3b4b6}.btn{display: inline-block;font-weight: 600;color: #343a40;text-align: center;vertical-align: middle;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;background-color: transparent;border: 1px solid transparent;padding: 0.45rem 0.85rem;font-size: 1rem;line-height: 1.5;border-radius: 0.2rem}.btn-primary{color: #fff;background-color: #3167eb;border-color: #3167eb}.fa{color: #FF5722} </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')

         <div class="container d-flex justify-content-center" style="margin-bottom:50px;">
            <figure class="card card-product-grid card-lg"> <a href="#" class="img-wrap" data-abc="true"> <img src="product/{{$product->image }}"> </a>
                <figcaption class="info-wrap">
                    <div class="row">
                        <div class="col-md-9 col-xs-9"> <a  class="title" data-abc="true">{{ $product->title }}</a> <span class="rated">{{ $product->category }}</span> </div>
                        <div class="col-md-3 col-xs-3">
                            <div class="rating text-right"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <span class="rated">Rated 4.0/5</span> </div>
                        </div>
                    </div>
                </figcaption>
                <div class="bottom-wrap-payment">
                    <figcaption class="info-wrap">
                        <div class="row">
                            @if($product->discount_price!=null)

                            <div class="col-md-9 col-xs-9"> <a class="title" data-abc="true">Rs{{ $product->discount_price }}</a> <span class="rated">price</span> </div>

                             @else
                            <div class="col-md-9 col-xs-9"> <a class="title" data-abc="true">Rs{{ $product->price }}</a> <span class="rated">price</span> </div>
                            @endif
                            <div class="col-md-3 col-xs-3">
                                <div class="rating text-right"class="col-md-9 col-xs-9"> <a class="title" data-abc="true">{{ $product->quantity }}</a> <span class="rated">availability</span> </div>
                            </div>

                        </div>
                    </figcaption>
                </div>
                <div class="bottom-wrap-payment">
                    <figcaption class="info-wrap">
                        <div class="row">
                            <div > <a class="title" data-abc="true">{{ $product->Description }}</a> <span class="rated">Description</span> </div>
                            <div class="col-md-3 col-xs-3">
                            </div>
                        </div>
                    </figcaption>
                </div>
                    <form   action="{{ url('add_cart',$product->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf

                      <input type="submit" class="btn btn-danger float-left" value="Add to cart" style="margin-right: 5px;">

                      <input type="number" name="quantity" value="1" min="1" style="width: 15%; margin-top:5px;">

                    </form>
                </div>
            </figure>
        </div>
      <!-- footer start -->
         @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2022 All Rights Reserved By Moniza Irfan <br>



         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
