<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Suppliers;
use App\Models\Order_info;
use App\Models\Order_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();     // get all category from database
        $supplys = Suppliers::all();     // get all Suppliers from database
        return view('add_product',compact('category','supplys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  upload image
        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/image'), $imageName);
        }

        $product = Product::create([
        'name'=>$request->name,               //add  product name
        'price'=>$request->price,             //add  product price
        'sales'=>$request->sales,             //....
        'offer'=>$request->offer?1:0,        //....
        'origin'=>$request->origin,
        'cat_id'=>$request->cat_id,
        'supply_id'=>$request->supply_id,
        'image'=>$imageName,
        ]);


        return redirect('/dashboard');  // return to dashboard page
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $product = Product::find($id);    // find product in database by id
       $category = Category::all();     // get all category from database
       $supplys = Suppliers::all();     // get all Suppliers from database
       return view('edit_product',compact('product','category','supplys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $product = Product::find($id);
        $product->name=$request->name;               //update  product name
        $product->price=$request->price;             //update  product price
        $product->sales=$request->sales;             //....
        $product->offer= $request->offer?1:0;        //....
        $product->origin=$request->origin;
        $product->cat_id=$request->cat_id;
        $product->supply_id=$request->supply_id;            //....
        $product->save();

        // if user update image

        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/image'), $imageName);
            $product->image=$imageName;           //update product image name
            $product->save();
        }



        return redirect('/dashboard');  // return to dashboard page

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

       $product = Product::find($id);    // find product in database by id
       $product->delete();               // delete product from database
       return back();                    // return back to the last page

    }





    public function cart()
    {

        return view('cart');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id"  =>$product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('danger', 'Product removed successfully');
        }
    }



    function purchase(){

        if(session('cart')) {

            return view('purchase');
        } else {
            return redirect()->back()->with('danger', 'your cart is empty');
        }

    }


    function checkout(Request $request){

        $total=0;

        //get cart
        $carts = session()->get('cart', []);


        // create order
        $order=Order::create([
         'user_id'=>Auth::user()->id,      // function to get user id
        ]);


        //store product cart in database
        foreach($carts as $cart){

        $total += $cart['price'] * $cart['quantity'];

        Order_product::create([
            'order_id' =>$order->id,
            'product_id'=>$cart['id'],
            'quantity'=>$cart['quantity'],
        ]);
    }

        //stor total price in order table
        $order->total= $total;
        $order->save();


        // store phone and adress order in order info
        Order_info::create([
            'order_id'=>$order->id,
            'address'=>$request->adress,
            'phone'=>$request->phone,
        ]);

        // destroy session cart
        Session::forget('cart');

        return redirect('/')->with('success', 'Your Order Sent successfully!');

    }


}
