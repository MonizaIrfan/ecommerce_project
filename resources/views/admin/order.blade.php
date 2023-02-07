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
        <div class="main-panel">
            <div class="content-wrapper">
                <form method="get" action="{{ url('search_order') }}">

                    @csrf

                <div style="width: 30%; margin:auto;margin-bottom:20px;" class="input-group rounded">
                    <input style="color:white" type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <input type="submit" value="search" class="btn btn-outline-primary">
                  </div>
                </form>
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.script')
      <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Order Status</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>
                        <div class="form-check form-check-muted m-0">

                        </div>
                      </th>
                      <th>image</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>qunatity</th>
                      <th>Price</th>
                      <th>product title</th>
                      <th>payment status</th>
                      <th>Delivery status</th>
                      <th></th>
                      <th>Print PDF</th>
                      <th>Send Email</th>


                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="form-check form-check-muted m-0">

                        </div>
                      </td>
                      @forelse($order as $order )
                      <td>
                        <img src="/product/{{ $order->image  }}" alt="image" />
                      </td>
                      <td>{{ $order->name }}</td>
                      <td>{{ $order->email }}</td>
                      <td>{{ $order->address}}</td>
                      <td>{{ $order->phone }}</td>
                      <td>{{ $order->quantity }}</td>
                      <td>{{ $order->Price }}</td>
                      <td>{{ $order->product_title }}</td>
                      <td>{{$order->payment_status }}</td>
                      <td>{{ $order->delivery_status}}</td>

                      <td>

                        @if($order->delivery_status=='Processsing')

                        <a href="{{ url('delivered',$order->id) }}" onclick="return confirm('Are you sure this product is delivered')" class="badge badge-outline-danger">Delivered</a>

                        @else

                        <p>Delivered</p>


                        @endif

                      </td>
                      <td>
                        <a href="{{ url('Print_pdf',$order->id)}}" class="btn btn-danger" >Print PDF</a>
                      </td>
                      <td>
                        <a href="{{ url('send_email',$order->id)}}" class="btn btn-danger" >send email</a>
                      </td>

                    </tr>
                    <tr>
                      <td>
                        @empty
                     <tr>
                        <td colspan="16">
                        No data found
                    </td>
                </tr>
                        @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

  </body>
</html>
