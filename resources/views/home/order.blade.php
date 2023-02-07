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
      <style>
        body {
    letter-spacing: 0.8px;
    background: linear-gradient(0deg , #fff , 50% , white);
    background-repeat: no-repeat;
}

.container-fluid {
    margin-top: 80px !important;
    margin-bottom: 80px !important;
}

p {
    font-size: 14px;
    margin-bottom: 7px;
}

.cursor-pointer {
    cursor: pointer;
}

.bold{
    font-weight: 600;
}

.small{
    font-size: 12px !important;
    letter-spacing: 0.5px !important;
}

.Today{
    color: rgb(83, 83, 83);
}

.btn-outline-primary{
    background-color: #fff !important;
    color:#E8314A !important;
    border:1.3px solid #E8314A ;
    font-size: 12px;
    border-radius: 0.4em !important;
}

.btn-outline-primary:hover{
    background-color:#E8314A  !important;
    color:#fff !important;
    border:1.3px solid #E8314A;
}

.btn-outline-primary:focus,
.btn-outline-primary:active {
    outline: none !important;
    box-shadow: none !important;
    border-color: #E8314A  !important;
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: #455A64;
    padding-left: 0px;
    margin-top: 30px
}

#progressbar li {
    list-style-type: none;
    font-size: 13px;
    width: 33.33%;
    float: left;
    position: relative;
    font-weight: 400;
    color: #455A64 !important;

}

#progressbar #step1:before {
    content: "1";
    color: #fff;
    width: 29px;
    margin-left: 15px !important;
    padding-left: 11px !important;
}


#progressbar #step2:before {
    content: "2";
    color: #fff;
    width: 29px;

}

#progressbar #step3:before {
    content: "3";
    color: #fff;
    width: 29px;
    margin-right: 15px !important;
    padding-right: 11px !important;
}

#progressbar li:before {
    line-height: 29px;
    display: block;
    font-size: 12px;
    background: #455A64 ;
    border-radius: 50%;
    margin: auto;
}

 #progressbar li:after {
    content: '';
    width: 121%;
    height: 2px;
    background: #455A64;
    position: absolute;
    left: 0%;
    right: 0%;
    top: 15px;
    z-index: -1;
}

#progressbar li:nth-child(2):after {
    left: 50%;
}

#progressbar li:nth-child(1):after {
    left: 25%;
    width: 121%;
}
#progressbar li:nth-child(3):after {
    left: 25% !important;
    width: 50% !important;
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #E8314A ;
}

.card {
    background-color: #fff ;
    box-shadow: 2px 4px 15px 0px gray ;
    z-index: 0;
}

small{
    font-size: 12px !important;
}

.a {
    justify-content: space-between !important;
}

.border-line {
    border-right: 1px solid rgb(226, 206, 226)
}

.card-footer img{
    opacity: 0.3;
}

.card-footer h5{
    font-size: 1.1em;
    color: #E8314A;
    cursor: pointer;
}
      </style>

   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         @foreach ($order as $order)
      <div class="container-fluid my-5 d-sm-flex justify-content-center">
        <div class="card px-2">
            <div class="card-header bg-white">
              <div class="row justify-content-between">
                <div class="col">
                    <p class="text-muted"> Order   <span class="font-weight-bold text-dark"></span></p>
                    <p class="text-muted"> Tracking  <span class="font-weight-bold text-dark"></span> </p></div>
                    <div class="flex-col my-auto">
                        <h6 class="ml-auto mr-3">
                            <a href="">Details</a>
                        </h6>
                    </div>
              </div>
            </div>
            <div class="card-body">
                <div class="media flex-column flex-sm-row">
                    <div class="media-body ">
                        <h5 class="bold"><br>{{ $order->product_title }}</h5>
                        <p class="text-muted"></p>
                        <h4 class="mt-3 mb-4 bold"> <span class="mt-5">Rs</span>{{ $order->Price }}<span class="small text-muted"> {{ $order->payment_status }}</span></h4>
                        <p class="text-muted">Quantity<br><span class="Today" style="margin-left:20px;">{{ $order->quantity }}</span></p>
                        <h5 class="bold"><br>{{ $order->email }}</h5><br>

                        <h3 style="width: 60%">{{$order->address }}</h3><br>

                    </div><img class="align-self-center img-fluid" src="product/{{ $order->image }}" width="180 " height="180">
                </div>
            </div>
            <div class="row px-3">
                <div class="col">
                    <ul id="progressbar" >
                        <li class="step0 active " id="step1">placed</li>
                        <li class="step0 active text-center" id="step2">shipped</li>
                        <li class="step0  text-muted text-right" id="step3">{{ $order->delivery_status }}</li>
                    </ul>
                </div>
            </div>
            <p>
            @if ($order->delivery_status!=='delivered' && $order->delivery_status!=='you cancel the order' )

             <div class="card-footer  bg-white px-sm-3 pt-sm-4 px-0">
                <div class="row text-center  ">
                    <a onclick="return confirm('are you sure you want to cancel the order')" class="col  my-auto  border-line "href="{{ url('order_cancel',$order->id)}}"><h5>Cancel order</h5></a>
                </div>
            </div>
        </p>
            @endif

        </div>
    </div>
    @endforeach




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
