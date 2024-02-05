<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
// use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $total = 0;
        $productsInCart = [];
        $productsInSession = $request->session()->get("products");
        if($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPriceByQuantities($productsInCart,$productsInSession);
        }

        $viewData['title'] = 'Cart Online store';
        $viewData['subtitle'] = "Shopping cart";
        $viewData["total"] = $total;
        $viewData["products"] = $productsInCart;

        return view("cart.index")->with('viewData',$viewData);
    }

    public function add(Request $request, $id){
        $products = $request->session()->get('products');
        $products[$id] = $request->input('quantity');
        $request->session()->put('products',$products);
        notify()->success('Item added to your cart','Cart Item Added');
        return redirect()->route('cart.index');
    }

    public function deleteMe2(){
        dd('Deleting,....');
    }

    public function deleteme(){
        // dd($request);
        // $request->session()->forget('products');
        Session::forget("products");
        notify()->success("Cart Items Removed","Cart Items Removed");
        return redirect()->route('products.index');
    }

    public function purchase(Request $request)
    {
        $productsInSession = $request->session()->get("products");
        if ($productsInSession) {
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->total = 0;
            $order->save();
            $total = 0;
            $productsInCart = Product::findMany(array_keys($productsInSession));
            foreach ($productsInCart as $product) {
                $quantity = $productsInSession[$product->id];
                $item = new Item();
                $item->quantity = $quantity;
                $item->price = $product->price;
                $item->product_id = $product->id;
                $item->order_id = $order->id;
                $item->save();
                $total += ($product->price * $quantity);
            }

            $order->total = $total;
            $order->save();
            $user = \App\Models\User::find(Auth::user()->id);
            if($user->balance < $order->total) {
                notify()->warning("Your balance is insufficient for purchase",'Insufficient Balance');
                return redirect()->route('cart.index');
            }
            $newBalance = $user->balance - $order->total;
            $user->balance = $newBalance;
            $user->save();

            $request->session()->forget("products");
            $viewData = [];
            $viewData["title"] = 'Purchase - Online Store';
            $viewData['subtitle'] = 'Purchase Status';
            $viewData['order'] = $order;
            return view('cart.create')->with('viewData', $viewData);
        } else {
            return redirect()->route('cart.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
