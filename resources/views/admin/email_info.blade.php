<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
                              <h1 class="font_size">Send Email {{ $order->email }}</h1>
                              <form action="{{ url('/send_user_email',$order->id) }}" method="POST" enctype="multipart/form-data">


                                @csrf


                              <div class="div_design">
                              <label>Email Greeting:</label>
                              <input class="text_color" type="text" name="greeting" placeholder="" required="">
                              </div>

                         <div class="div_design">
                            <label>Email Firstline:</label>
                            <input class="text_color" type="text" name="firstline" placeholder="" required="">
                            </div>


                        <div class="div_design">
                          <label>Email body:</label>
                          <input class="text_color" type="text" name="body" placeholder="" required="">
                          </div>

                    <div class="div_design">
                      <label>Email Button Name:</label>
                      <input class="text_color" type="text" name="button" >
                      </div>



                      <div class="div_design">
                        <label>Email Url:</label>
                        <input class="text_color" type="text"  name="url" placeholder="" required="">
                        </div>
                        <div class="div_design">
                            <label>Email lastline:</label>
                            <input class="text_color" type="text"  name="lastline" placeholder="" required="">
                            </div>

                     <div class="div_design">
                      <input type="submit"  value="Send Email" class="btn btn-primary" >
                    </div>
                              </form>

                </div>
                      </div>
              </div>
                  </div>

      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.script')

  </body>
</html>
