<!DOCTYPE html>
<html>
   <head>
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
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         @if (session()->has('message'))
         <div class="alert alert-danger">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>
             {{ session()->get('message') }}

         </div>

         @endif

      <section class="h-100" style="background-color: #eee; ">
        <div class="container h-100 py-5">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">

              <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-normal mb-0 text-black" style=" font-size:30px;margin:auto">Shopping Cart</h3>

              </div>
              <?php $totalprice=0; $totalquantity=0;?>
              @foreach ($cart as $cart)
              <div class="card rounded-3 mb-4">
                <div class="card-body p-4">
                  <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img
                       src="product/{{$cart->image }}"
                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <p class="lead fw-normal mb-2">{{ $cart->product_title }}</p>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">

                      <h3 style="text-align: center"><p style="margin-bottom:5px; font-size:20px; ">Quantity</p><br>{{$cart->quantity  }}</h3>

                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h5 class="mb-0"><p style="margin-bottom:5px; font-size:20px; ">Price</p><br>Rs{{ $cart->Price }}</h5>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="{{ url('remove_cart',$cart->id) }}" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <?php $totalprice=$totalprice + $cart->Price?>
              <?php $totalquantity=  $totalquantity + $cart->quantity?>

              @endforeach

              <div class="card mb-4">
                <div class="card-body p-4 d-flex flex-row">
                  <div class="form-outline flex-fill">
                    <h2 style="font-size:30px;">Proceed to pay</h2>


                  </div>
                  <h2 style="margin:auto;margin-right:30px;font-size:20px;">Total amonut:{{ $totalprice }} <p>Quantity:{{ $totalquantity }}</p></h2>

                 <a href="{{ url('stripe',$totalprice) }}" class="btn btn-outline-danger btn-lg ms-3">pay using card</a>
                 <a href="{{ url('cash_order')}}"class="btn btn-outline-danger btn-lg ms-3" style="margin-left:3px;">Cash on delivery</a>

                </div>
              </div>

            </div>
          </div>
        </div>
      </section>

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
