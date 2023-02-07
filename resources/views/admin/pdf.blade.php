<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user details</title>
</head>
<body>
   Customer name:<h5>{{ $order->name }}</h5>
   Customer email:<h5>{{ $order->email }}</h5>
   Customer address:<h5>{{ $order->address}}</h5>
   Customer phone no:<h5>{{ $order->phone }}</h5>
   Customer order quantity:<h5>{{ $order->quantity }}</h5>
   Customer total amount:<h5>{{ $order->Price }}</h5>
   Customer ID:<h5>{{ $order->user_id }}</h5>
   Customer Product:<h5>{{ $order->product_title }}</h5>
   Customer payment status:<h5>{{ $order->payment_status }}</h5>
   Customer Delivery status:<h5>{{ $order->delivery_status}}</h5>
    <img style="height: 250px;width:250px" src="product/{{ $order->image  }}" alt="image" />

</body>
</html>
