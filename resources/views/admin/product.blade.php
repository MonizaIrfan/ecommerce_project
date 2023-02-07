<!DOCTYPE html>
<html lang="en">
  <head>
     <!-- required meta tags -->
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
                <div class="div_center">
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >x</button>
                        {{ session()->get('message') }}

                    </div>

                    @endif
                    <h1 class="font_size">Add Product</h1>
                    <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">


                      @csrf


                    <div class="div_design">
                    <label>Product title:</label>
                    <input class="text_color" type="text" name="title" placeholder="write a title" required="">
                    </div>

               <div class="div_design">
                  <label>Product description:</label>
                  <input class="text_color" type="text" name="description" placeholder="write a description" required="">
                  </div>
                  <div class="div_design">
                    <label>Product id:</label>
                    <input class="text_color" type="number" name="product_id" placeholder="write product id" required="">
                    </div>


              <div class="div_design">
                <label>Product price:</label>
                <input class="text_color" type="number" name="price" placeholder="write price" required="">
                </div>

          <div class="div_design">
            <label>discount price:</label>
            <input class="text_color" type="number" name="dis_price" placeholder="write dis_price" >
            </div>



            <div class="div_design">
              <label>Product qunatity:</label>
              <input class="text_color" type="number" min="0" name="quantity" placeholder="write quantity" required="">
              </div>

              <div class="div_design">
                <label>Product category</label>
                <select class="text_color" name="category" required="">
                    @foreach ( $category as $category)


                  <option value="{{$category->category_name }}">{{$category->category_name }}</option>
                  @endforeach
                  <option value="" selected="">Add a category here</option>
                </select>
                </div>

        <div class="div_design">
          <label>Product image here:</label>
          <input type="file" name="image" required="">
          </div>
          <div class="div_design">
            <input type="submit"  value="Add product" class="btn btn-primary" >
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
