<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get(); //doing variable that gets all categories from DB is in category.index
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//          dd($request->all());
        $this->validate($request, [
            'name'=>'required',
            'description' =>'required',
            'image'=> 'required|mimes:png,jpeg,jpg'
        ]);

        $image = $request->file('image');  /*nombre de la variable en controler.create*/
        $name = time().'.'.$image->getClientOriginalExtension(
            );
        $destinationPath = public_path('/images');
        $image->move($destinationPath,$name);

        Category::create([
            'name'=>$request->get('name'),
            'description'=>$request->get('description'),
            'image'=>$name
            ]);


        return redirect()->route('category.index')->with('message','new category');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required',
            'description' => 'required',
            'image' => 'mimes:png,jpg,jpeg',
        ]);

        $category = Category::find($id);
        $name = $category->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        }

        $category = Category::find($id);
        $category->name = $request->get('name'); //key name is from the form and category->name is db
        $category->description = $request->get('description');
        $category->image = $name;
        $category->save();
        return redirect()->route('category.index')->with('message', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('message','deleted');
    }
}
