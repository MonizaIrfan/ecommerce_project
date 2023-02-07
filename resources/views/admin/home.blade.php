<!DOCTYPE html>
<html lang="en">
  <head>
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
      @include('admin.body')
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.script')

  </body>
</html>
