<?php

namespace App\Http\Controllers;
use App\models\category;
use App\models\product;
use App\models\order;
use App\models\Cart;
use PDF;
use Notification;
use App\Notifications\myfirstnotification;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category(){
        $data=category::all();
        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request){
        $data=new category;
        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('message','category added successfully');

    }
    public function delete_category($id)
    {

        $data=category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'category deleted successfull');
    }
    public function view_product()
{    $category=category::all();
    return view('admin.product',compact('category'));

}
   public function add_product(Request $request){
    $product=new product;
    $product->title=$request->title;
    $product->Description=$request->description;
    $image=$request->image;
    $imagename=time().'.'.$image->getClientOriginalExtension();
    $request->image->move('product',$imagename);
    $product->image=$imagename;
    $product->category=$request->category;
    $product->quantity=$request->quantity;
    $product->product_id=$request->product_id;
    $product->price=$request->price;
    $product->discount_price=$request->dis_price;
    $product->save();
    return redirect()->back()->with('message','Product Added Successfully');


   }
   public function show_product(){
    $product=product::all();
    return view('admin.show_product',compact('product'));
}
public function delete_product($id)
{

    $product=product::find($id);
    $product->delete();
    return redirect()->back()->with('message', 'product deleted successfully');
}
public function update_product($id)
{

    $product=product::find($id);
    $category=category::all();
    return view('admin.update_product',compact('product','category'));
}

public function update_product_confirm(Request $request,$id){
    $product=product::find($id);

    $product->title=$request->title;
    $product->Description=$request->description;
    $image=$request->image;
    if($image)
    {
    $imagename=time().'.'.$image->getClientOriginalExtension();
    $request->image->move('product',$imagename);
    $product->image=$imagename;
    }
    $product->category=$request->category;
    $product->quantity=$request->quantity;
    $product->price=$request->price;
    $product->discount_price=$request->dis_price;
    $product->save();
    return redirect()->back()->with('message','Product updated Successfully');


}
public function order(){
     $order=order::all();
     return view('admin.order',compact('order'));
    $data=Cart::where('user_id','=',$userid)->get();
    foreach($data as $data){
          $order=new order;
          $order->name=$data->name;
          $order->email=$data->email;
          $order->address=$data->address;
          $order->phone=$data->phone;
          $order->Price=$data->Price;
          $order->user_id=$data->user_id;
          $order->product_title=$data->product_title;
          $order->product_id=$data->product_id;
          $order->quantity=$data->quantity;
          $order->image=$data->image;

          $order->payment_status='paid';
          $order->delivery_status='Processsing';
          $order->save();
}

}

public function delivered($id){
    $order=order::find($id);
    $order->delivery_status="delivered";
    $order->payment_status='paid';
    $order->save();
    return redirect()->back();

}
public function Print_pdf($id){
    $order=order::find($id);
    $pdf=PDF::loadView('admin.pdf',compact('order'));
    return $pdf->download('user_details.pdf');

}
public function send_email($id){
    $order=order::find($id);
    return view('admin.email_info',compact('order'));

}
public function send_user_email(Request $request ,$id){
    $order=order::find($id);

    $details = [

        'greeting'=>$request->greeting,
        'firstline'=>$request->firstline,
        'body'=>$request->body,
        'button'=>$request->button,
        'url'=>$request->url,
        'lastline'=>$request->lastline,

    ];
    Notification::send($order,new myfirstnotification($details));
    return redirect()->back();

}
public function search_order(Request $request){
          $search_order=$request->search;
          $order=order::where('name','LIKE',"%$search_order%")->get();
          $order=order::where('phone','LIKE',"%$search_order%")->get();
          $order=order::where('product_title','LIKE',"%$search_order%")->get();
          $order=order::where('email','LIKE',"%$search_order%")->get();
          $order=order::where('address','LIKE',"%$search_order%")->get();
          return view ('admin.order',compact('order'));
}
}
