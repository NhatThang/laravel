<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('products.index', array('products' => $product));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // $validator =  Validator::make($request->all(), [
        //     'name' => 'required|min:10|max:200',
        //     'price' => 'required'
        // ],
        // [
        //     'name.required' => 'Tên là bắt buộc',
        //     'name.min' => 'Tên tối thiểu là 10 ký tự',
        //     'name.max' => 'Tên tối đâ là 200 ký tự',
        //     'price.required' =>'Nhập giá vô'
        // ]);
        // if ($validator->fails()) {
        //     return redirect( 'products/create' )
        //     ->withErrors($validator)
        //     ->withInput();
        //     }
        $product = Product::create($request->all());
        if ($product) {
            return redirect()->route('products.index');
            // dd($request->all());
        }
        return redirect()->route('products.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', array('product' => $product));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', array('product' => $product));
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
        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->desc = $request['desc'];
        $product->save();
        if($product){
            return redirect()->route('products.index');
        }
        return redirect()->route('products.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
