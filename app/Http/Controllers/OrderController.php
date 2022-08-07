<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Orderdetal;
use App\User;
use App\Order;
use Session;
use Auth;
use DB;

class OrderController extends Controller
{
   public function cart()
    {
        $cart = Cart::where('user_id',Auth::user()->id)->get();
        return view('front.cart',compact('cart'));
    }

    public function addToCart(Request $request)
    {
        if ($request->isMethod('post')) 
        {
             $data = $request->all();
             if(!auth()->check())
             {
                 setcookie("package_id", $data['package_id'], time() + 2 * 24 * 60 * 60);
                 setcookie("package_duration", $data['package_duration'], time() + 2 * 24 * 60 * 60);
                 setcookie("name", $data['name'], time() + 2 * 24 * 60 * 60);
                 setcookie("image", $data['image'], time() + 2 * 24 * 60 * 60);
                 setcookie("price", $data['price'], time() + 2 * 24 * 60 * 60);
                 return redirect()->route('login');
             }

           $count = Cart::where(['package_id'=>$data['package_id'],'user_id'=>Auth::user()->id])->count();
             if($count >0){
              return redirect()->back()->with('error_message', 'Packages Already Exists');
             }

            $cart = new Cart;
            $cart->user_id = auth()->user()->id;
            $cart->package_id = $data['package_id'];
            $cart->package_duration = $data['package_duration'];
            $cart->name = $data['name'];
            $cart->image = $data['image'];
            $cart->price = $data['price'];
            $cart->save();
         
            Session::flash('success_message',' Packages added to cart Successfully!');
            return redirect()->route('cart');
         }
    }

    public function deleteCart($id)
    {
      $id =Cart::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Cart has been deleted successfully!');
    }


    public function checkout(Request $request)

    {
      if ($request->isMethod('post')) {
      $data = $request->all();
      $checkout =  User::find(auth()->user()->id);
      $checkout->address = $data['address'];
      $checkout->city = $data['city'];
      $checkout->country = $data['country'];
      $checkout->number = $data['number'];
      $checkout->save(); 
      Session::flash('success_message', "Billing Details had been updated successfully!");
      return redirect()->route('order.review');
      }

      return view('front.checkout');
    }

    public function orderreview()
    {
      $cart = Cart::where('user_id',Auth::user()->id)->get();
      return view('front.orderreview', compact('cart'));
    }

    public function placeorder(Request $request)
    {
      if ($request->isMethod('post')) {

           //Size already exists check
           $attrCountCart = Cart::where('user_id',Auth::user()->id)->count();
           if($attrCountCart<1){
               $message = 'Item is not exist in Cart!';
               Session::flash('error_message',$message);
               return redirect()->back();
           }

         $data = $request->all();      
        $placeorder = new Order;
        $placeorder->user_id = auth()->user()->id;
        $placeorder->name = auth()->user()->name;
        $placeorder->email = auth()->user()->email;
        $placeorder->tex = 0.00;
        $placeorder->total = $data['total'];
        $placeorder->status = "New";
        $placeorder->payment_method = $data['payment_method'];
        $placeorder->checkbox =  $data['checkbox'];
        $placeorder->save(); 
        $order_id = DB::getPdo()->lastInsertId();

        $orderdetails =  Cart::where('user_id',Auth::user()->id)->get();
        foreach($orderdetails as $item) { 
          $items = new Orderdetal;
          $items->package_id = $item->package_id;
          $items->order_id = $order_id;
          $items->image = $item->image;
          $items->name = $item->name;
          $items->description = $item->description;
          $items->price = $item->price;
          $items->package_duration = $item->package_duration;
          $items->save(); 
          Cart::where('id', $item->id)->delete();
        }
      }
      return redirect()->route('orderdetail');
  
    }

    public function orderdetail()
    {
      $orderdeta = Order::where('user_id',Auth::user()->id)->get();
      return view('front.order_detail',compact('orderdeta'));
    }

    public function seeorderdetail($id)
    {
      $seeorderdetail = Orderdetal::where('order_id',$id)->get();
      return view('front.seeorderdetail',compact('seeorderdetail'));
    }

}
