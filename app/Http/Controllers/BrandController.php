<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->get(); //doing variable that gets all categories from DB is in brand.index
        return view('brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('brand.create');
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
            'description' => 'required',
            'image'=> 'required|mimes:png,jpeg,jpg'
        ]);
        $image = $request->file('image');  /*nombre de la variable en controler.create*/
        $name = time().'.'.$image->getClientOriginalExtension(
            );
        $destinationPath = public_path('/images');
        $image->move($destinationPath,$name);

        Brand::create([
            'name'=>$request->get('name'),
            'description'=>$request->get('description'),
            'image'=>$name,
        ]);

        return redirect()->route('brand.index')->with('message','new brand');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required',
            'description' => 'required',
            'image' => 'mimes:png,jpg,jpeg'
        ]);

        $brand = Brand::find($id);
        $name = $brand->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        }

        $brand = Brand::find($id);
        $brand->name = $request->get('name'); //key name is from the form and category->name is db
        $brand->description = $request->get('description');
        $brand->image = $name;
        $brand->save();
        return redirect()->route('brand.index')->with('message', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('brand.index')->with('message','deleted');
    }
}
