
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">

          <h2>
             Our <span>products</span>
          </h2>
       </div>
      <!--- for searching products-->
       <form action="{{ url('product_search') }}" method="GET">

        @csrf

        <div>

            <input style="width: 30%;margin-left:35%;border-radius:20px;"  type="text" name="search" placeholder="Search">
        </div>

        <div>

    </form>
    @if (session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>
        {{ session()->get('message') }}

    </div>

    @endif

       <div class="row">

        @foreach ($product as $products )

          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{ url('product_details',$products->id) }}" class="option1">
                         View Product
                      </a>

                   </div>
                </div>
                <div class="img-box">
                   <img class="img_show" src="product/{{ $products->image }}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                    {{$products->title}}
                   </h5>
                   @if($products->discount_price!=null)
                   <h6 style="color:gray" >
                    sale price
                    <br>
                    {{$products->discount_price}}
                   </h6>


                   <h6 style="text-decoration: line-through; color:gray;">
                    price
                    <br>
                    Rs{{$products->price}}
                   </h6>

                   @else
                   <h6>
                    price
                    <br>
                    Rs{{$products->price}}
                   </h6>

                   @endif

                </div>
             </div>
          </div>

          @endforeach
          <span style="padding-top:20px;">
          {!! $product->appends(Request::all())->links() !!}
          </span>

    </div>
 </section>
