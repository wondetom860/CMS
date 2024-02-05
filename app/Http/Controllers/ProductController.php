<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // public static $products = [
    //     [
    //         'id' => 1,
    //         'name' => 'Apple Phone',
    //         'price' => 12,
    //         'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, quae modi. Quisquam, ab laudantium! Magnam repudiandae sequi sit at ipsa, omnis cumque vero doloremque iure quibusdam, fuga, molestiae totam alias.|', 'image' => 'game.png'
    //     ],
    //     [
    //         'id' => 2,
    //         'name' => 'Mac Air',
    //         'price' => 33,
    //         'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, quae modi. Quisquam, ab laudantium! Magnam repudiandae sequi sit at ipsa, omnis cumque vero doloremque iure quibusdam, fuga, molestiae totam alias.|',
    //         'image' => 'submarine.png'
    //     ],
    //     [
    //         'id' => 3,
    //         'name' => 'RealMe Phone',
    //         'price' => 41,
    //         'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, quae modi. Quisquam, ab laudantium! Magnam repudiandae sequi sit at ipsa, omnis cumque vero doloremque iure quibusdam, fuga, molestiae totam alias.|',
    //         'image' => 'safe.png'
    //     ],
    //     [
    //         'id' => 4,
    //         'name' => 'Alcatel AC',
    //         'price' => 90,
    //         'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, quae modi. Quisquam, ab laudantium! Magnam repudiandae sequi sit at ipsa, omnis cumque vero doloremque iure quibusdam, fuga, molestiae totam alias.|',
    //         'image' => 'column-2.jpg'
    //     ],
    // ];

    

    public function insert()
    {
        $model = new Product();
    }
    // public static function find($id)
    // { // this function should throw NotFoundException
    //     $item = NULL;
    //     foreach (self::$products as $product) {
    //         if ($product['id'] == $id) {
    //             $item = $product;
    //         }
    //     }

    //     return $item;
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index')->with('products', Product::all());
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
     * @return \Illuminate\Http\Response | \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $product = Product::find($id); //findOrFail
        if (is_null($product)) {
            return view('error')
                ->with('title', 'Item not found')
                ->with('message', 'Such item does NOT exist');
        }
        return view('product.detail')->with('product', $product);
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
