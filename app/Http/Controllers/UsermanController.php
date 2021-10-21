<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use DB;

class UsermanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* Authentication Middleware */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $product = DB::table('products')->simplePaginate(1);
        //$products = Products::orderBy('created_at','desc')->paginate(10);
        return view('products.index')->with('product', $product);
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
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'description' => 'required',
        //     'price' => 'required'
        // ]);
        // $product = new Products();
        // $product->name = $request->input('name');
        // $product->description = $request->input('description');
        // $product->price = $request->input('price');
        // $product->save();

        $product = DB::table('products')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);
        return redirect('/products')->with('success', 'Product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        //$product = Products::find($id);
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        //$product = Products::find($id);
        return view('products.edit')->with('product', $product);
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
        // $this->validate($request, [
        //     'name' => 'required',
        //     'description' => 'required',
        //     'price' => 'required',
        // ]);
        // $product = Products::find($id);
        // $product->name = $request->input('name');
        // $product->description = $request->input('description');
        // $product->price = $request->input('price');
        // $product->save();

        $product = DB::table('products')->where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);
        return redirect('/products')->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $product = Products::find($id);
        // $product->delete();
        $product = DB::table('products')->where('id',$id)->delete();
        return redirect('/products')->with('success', 'Product Removed');
    }
}