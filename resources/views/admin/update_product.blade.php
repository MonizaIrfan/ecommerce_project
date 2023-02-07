<!DOCTYPE html>
<html lang="en">
  <head>
     <!-- required meta tags -->
     <base href="/public">
  @include('admin.css')
  <style type="text/css">
  .div_center{
    text-align: center;
    padding-top: 40px;
  }
  .font_size{
    font-size: 40px;
    padding: 40px;
  }
  .text_color{
   color:black;
   padding-bottom: 20px;
  }
  label{
    display: inline-block;
    width: 200px;
  }
  .div_design{
    padding-bottom: 15px;
  }
  </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
         @include('admin.sidebar')
      <!-- partial -->

        <!-- partial:partials/_navbar.html -->
        @include('admin.header')

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>
                    {{ session()->get('message') }}

                </div>

                @endif
                <div class="div_center">

                    <h1 class="font_size">Update Product</h1>
                    <form action="{{ url('/update_product_confirm',$product->id) }}" method="POST" enctype="multipart/form-data">


                      @csrf


                    <div class="div_design">
                    <label>Product title:</label>
                    <input class="text_color" type="text" name="title" placeholder="write a title" required="" value="{{$product->title}}">
                    </div>

               <div class="div_design">
                  <label>Product description:</label>
                  <input class="text_color" type="text" name="description" placeholder="write a description" required="" value="{{$product->Description}}">
                  </div>


              <div class="div_design">
                <label>Product price:</label>
                <input class="text_color" type="number" name="price" placeholder="write price" required="" value="{{$product->price}}">
                </div>

          <div class="div_design">
            <label>discount price:</label>
            <input class="text_color" type="number" name="dis_price" placeholder="write dis_price"  value="{{$product->discount_price}}">
            </div>



            <div class="div_design">
              <label>Product qunatity:</label>
              <input class="text_color" type="number" min="0" name="quantity" placeholder="write quantity" required="" value="{{$product->quantity}}">
              </div>

              <div class="div_design">
                <label>Product category</label>
                <select class="text_color" name="category" required="" >

                  <option value="{{$product->category}}" selected="" >{{$product->category}}</option>
                  @foreach ( $category as $category)


                  <option value="{{$category->category_name }}">{{$category->category_name }}</option>
                  @endforeach
                </select>
                </div>

                <div class="div_design">
                    <label>current product image:</label>
                    <img height="100" width="100" style="margin:auto;" src="/product/{{$product->image  }}">
                </div>

        <div class="div_design">
          <label>change Product image:</label>
          <input type="file" name="image"value="{{$product->image}}">
          </div>
          <div class="div_design">
            <input type="submit"  value="update product" class="btn btn-primary" >
          </div>
                    </form>

      </div>
            </div>
    </div>
        </div>
      <!-- page-body-wrapper ends -->

    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.script')
        </div>

  </body>
</html>
