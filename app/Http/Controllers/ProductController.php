<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'price'=>'required|integer',
            'brand' => 'required',
            'category'=>'required',
            'description'=>'required',
            'image'=> 'required|mimes:png,jpeg,jpg'
        ]);

        $image = $request->file('image');  /*nombre de la variable en controler.create*/
        $name = time().'.'.$image->getClientOriginalExtension(
            );
        $destinationPath = public_path('/images');
        $image->move($destinationPath,$name);

        Product::create([
            'name'=>$request->get('name'),
            'price'=>$request->get('price'),
            'brand'=>$request->get('brand'),
            'category_id'=>$request->get('category'),
            'brand_id'=>$request->get('brand'),
            'description'=>$request->get('description'),
            'image'=>$name


        ]);
        return redirect()->back()->with('message', trans('product created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $this->validate($request, [
            'name'=>'required',
            'description' => 'required',
            'price' => 'required|integer',
            'category' => 'required',
            'image' => 'mimes:png,jpg,jpeg'
        ]);


        $name = $product->image;
      /*take a look in storage*/

        $product->update($data);

        return redirect()->route('product.index')->with('message', trans('app.test') );
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index')->with('message', trasn('app.test'));

    }
     /*for the public, should get it in Vue.js*/
    public function listProduct(){
         $categories = Category::with('product')->get(); /*product is the function in the category model*/
         return view('product.list', compact('categories')); /*is for the costumer*/



    }

    public function view($id) {
        $product = Product::find($id);
        return view('product.detail', compact('product'));
        $category = Category::find($id);
        return $category->name;
    }

}
