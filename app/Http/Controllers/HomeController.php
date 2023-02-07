<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\User;
use App\models\product;
use App\models\Cart;
use App\models\order;

use Session;
use Stripe;


class HomeController extends Controller
{
      public function index(){
        $product=product::paginate(10);

        return view('home.userpage',compact('product'));
      }


    public function redirect(){
        $usertype=Auth::User()->usertype;

        if($usertype=='1')
        {
            $total_order='';
            $total_product=product::all()->count();
            $total_order=order::all()->count();
            $total_user=user::all()->count();
            $order=order::all();
            $revenue=0;
            foreach($order as $order)
            {
                $revenue=  $revenue + $order->Price;
            }

            $total_deliever=order::where('delivery_status','=','delivered')->get()->count();
            $total_processing=order::where('delivery_status','=','Processsing')->get()->count();


            return view('admin.home',compact('total_product','total_order','total_user','revenue','total_deliever','total_processing'));
        }
        else{
            $product=product::paginate(10);

            return view('home.userpage',compact('product'));
        }

    }
    public function product_details($id){
        $product=product::find($id);
        return view('home.product_details',compact('product'));

    }
    public function add_cart(Request $request, $id){
      //print_r($request->all());
        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $product=product::find($id);
            $product_exist_id=Cart::where(['product_id'=>$id,'user_id'=> $userid])->get();

            if(count($product_exist_id)>0){
               $quantity=$product_exist_id[0]->quantity+$request->quantity;
               Cart::where('product_id',$id)->update(['quantity'=>$quantity]);
               return redirect('/show_cart');
            }
            else{
                $cart=new Cart;
                $cart->name=$user->name;
                $cart->email=$user->email;
                $cart->phone=$user->phone;
                $cart->address=$user->address;
                $cart->user_id=$user->id;
                $cart->product_title=$product->title;
                if($product->discount_price!=null){
                    $cart->price=$product->discount_price * $request->quantity;

                }else{
                $cart->price=$product->price * $request->quantity;
                }
                $cart->image=$product->image;
                $cart->product_id=$product->product_id;
                $cart->quantity=$request->quantity->withDefault();


                $cart->save();
                return redirect('/show_cart')->with('message','Product added successfully');

            }



        }
        else{
            return redirect('login');
        }
    }
    public function show_cart(){
        if(auth::id()){

        $id=Auth::user()->id;
        $cart=Cart::where('user_id','=',$id)->get();
        return view('home.showcart',compact('cart'));
        }
        else{
            return redirect('login');
        }
    }
    public function remove_cart($id){
    $cart=Cart::find($id);
    $cart->delete();
    return redirect()->back();

    }
    public function cash_order(){
        $user=Auth::user();
        $userid=$user->id;
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

              $order->payment_status='Cash on delivery';
              $order->delivery_status='Processsing';
              $order->save();

              $cart_id=$data->id;
              $cart=Cart::find($cart_id);
              $cart->delete();



        }

        return redirect()->back()->with('message','we have received your order will connect you soon');
    }

    public function stripe($totalprice)
    {
        return view('home.stripe',compact('totalprice'));

    }

    public function stripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([

                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment"

        ]);


        $user=Auth::user();
        $userid=$user->id;
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

              $cart_id=$data->id;
              $cart=Cart::find($cart_id);
              $cart->delete();
    }


        Session::flash('success', 'Payment successful!');

        return back();
    }
    public function show_order(){
        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $order=order::where('user_id','=',$userid)->get();
            return view('home.order',compact('order'));

        }
        else{
            return redirect('login');
        }
    }
    public function order_cancel($id){
        $order=order::find($id);
        $order->delivery_status='you cancel the order';
        $order->save();
        return redirect()->back();


    }
    public function product_search(Request $request){
        $search_text=$request->search;
        $product=product::where('title','LIKE',"%$search_text%")->orwhere('category','LIKE',"%$search_text%")->orwhere('price','LIKE',"%$search_text%")->orwhere('Description','LIKE',"%$search_text%")->paginate(10);

        return view ('home.all_products',compact('product'));
    }
    public function products(){
        $product=product::paginate(10);
        return view ('home.all_products',compact('product'));
    }


}

