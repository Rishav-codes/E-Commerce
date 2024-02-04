<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
    public function payment(Request $req){
        $data = $req->validate([
            'address_id' => 'required'
        ]);
        
        // order fetching
        $order = Order::where([["status",false],["user_id",Auth::id()]])->first();
        $order->address_id = $req->address_id;
        $order->save();
        return view('home.payment',$data);
    }
    
    
    public function orderDone(){
        $order = Order::where([["status",false],["user_id",Auth::id()]])->first();
        $order->status = true;
        $order->save();
        return view('home.orderDone');
    }
    
    public function myOrder(){
        $data['orders'] =  Order::where([["status",true],["user_id",Auth::id()]])->get();
        return view('home.myOrder', $data);
    }
    
  
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $user = Auth::user();
    
        if ($product) {
            $order = Order::where([
                ["status", false],
                ["user_id", $user->id]
            ])->first();
    
            if ($order) {
                $orderItem = OrderItem::where("status", false)
                    ->where('product_id', $id)
                    ->where("order_id", $order->id)
                    ->first();
    
                if ($orderItem) {
                    // If orderItem already in cart
                    $orderItem->qty += 1;
                    $orderItem->save();
                } else {
                    $oi = new OrderItem();
                    $oi->status = false;
                    $oi->product_id = $id;
                    $oi->order_id = $order->id;
                    $oi->save();
                }
            } else {
                // If order does not exist in cart
                $o = new Order();
                $o->user_id = $user->id;
                $o->status = false;
                $o->save();
    
                // Refresh the order to get the updated id
                $order = $o->fresh();
    
                $oi = new OrderItem();
                $oi->status = false;
                $oi->product_id = $id;
                $oi->order_id = $order->id;
                $oi->save();
            }
    
            return redirect()->route("cart")->with("success", "Product added or updated successfully");
        } else {
            return redirect()->route("home")->with("error", "Product not found");
        }
    }
    
   
   
    public function cart(){
        $data['order'] = Order::where([["user_id" , Auth::id()],["status",false]])->first();
        return view("home.cart",$data);     
    }
    
    public function removeFromCart(Request $request , $id){
        $product = Product::find($id);
        
        $user = Auth::user();

        if($product){
            $order = Order::where([["status",false],["user_id",$user->id]])->first();

            if($order){
                $orderItem = OrderItem::where("status",false)->where('product_id',$id)->where("order_id" , $order->id)->first();
                if($orderItem){
                    // if orderItem alredy in cart
                    if($orderItem->qty > 1){
                        $orderItem->qty -= 1;
                        $orderItem->save();
                    }
                    else{
                        $orderItem->delete();

                    }
                }
               
            }
            
            return redirect()->route("cart")->with("success","product updated sucesfully");
        }
        else{
            return redirect()->route("home")->with("error" , "Product not found");
        }
        
    }

    
    public function checkout(Request $req){
        $data['addresses'] = Address::where('user_id',Auth::id())->get();
        if($req->isMethod("post")){
            $data = $req->validate([
                'street_name' => 'required',
                'landmark' => 'required',
                'area' => 'required',
                'city' => 'required',
                'state' => 'required',
                'type' => 'required',
                'pincode' => 'required',
            ]);
            $data['user_id'] = Auth::id();

            Address::create($data);
            return redirect()->back()->with("success","Address inserted successfylly");
        }
        return view("home.checkout",$data);     
    }




    public function manageCarts(){
        $data['totalCarts'] = Order::where("status",false)->get();
        $data['carts'] = Order::where('status',false)->orderBy('id','desc')->paginate(2);

        return view('admin.manageCart',$data);
    }


    


}
