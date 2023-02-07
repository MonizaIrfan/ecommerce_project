<!DOCTYPE html>
<html lang="en">
  <head>
    <style>

.div_center{
   text-align: center;
   padding-top: 40px;
}
.h1_fontsize{
   font-size: 40px;
   padding-bottom: 40px;
}
.input_color{
    color: black;

}
.center{
    margin: auto;
    width: 50%;
    text-align: center;
    border: 3px solid white;
    margin-top: 30px;


}
    </style>
     <!-- required meta tags -->
  @include('admin.css')
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

                 <h1 class="h1_fontsize">Add category</h1>
                 <form method="POST" action="{{ url('/add_category') }}">
                    @csrf
                    <input class="input_color" name="category" type="text" placeholder="Add category">
                    <input name="submit" type="submit" class="btn btn-danger" value="Add category">

                 </form>
                 <table class="center">
                    <tr>
                        <td>Category Name </td>
                        <td>Action</td>
                    </tr>
                    @foreach ($data as $data)

                    <tr>
                        <td>{{$data->category_name }} </td>
                        <td><a onclick="return confirm('Are you sure you want to delete this')" class="btn btn-danger" href="{{url('/delete_category',$data->id)}}">Delete</a></td>
                    </tr>

                    @endforeach
                 </table>

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
