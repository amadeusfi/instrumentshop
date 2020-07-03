<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = customer::latest()->paginate(5);
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            'last_name'=>'required',
            'first_name'=>'required',
            'birth_date' => 'required|date',
            'registration_date' => 'required|date',
            'address'=>'required',
            'city'=>'required',
            'plz'=>'required',
            'country'=>'required',
            'email'=>'required',
            'password'=>'required',
            'image'=> 'required|mimes:png,jpeg,jpg'
        ]);

        $image = $request->file('image');  /*nombre de la variable en controler.create*/
        $name = time().'.'.$image->getClientOriginalExtension(
            );
        $destinationPath = public_path('/images');
        $image->move($destinationPath,$name);

        customer::create([
            'last_name'=>$request->get('last_name'),
            'first_name'=>$request->get('first_name'),
            'birth_date'=>$request->get('birth_date'),
            'registration_date'=>$request->get('registration_date'),
            'address'=>$request->get('address'),
            'city'=>$request->get('city'),
            'plz'=>$request->get('plz'),
            'country'=>$request->get('country'),
            'phone'=>$request->get('phone'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),
            'image'=>$name


        ]);
        return redirect()->back()->with('message','customer created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $customer = customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $id)
    {
        $customer = customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'last_name'=>'required',
            'first_name'=>'required',
            'birth_date' => 'required|date',
            'registration_date' => 'required|date',
            'address'=>'required',
            'city'=>'required',
            'plz'=>'required',
            'country'=>'required',
            'email'=>'required',
            'password'=>'required',
            'image'=> 'required|mimes:png,jpeg,jpg'
        ]);

        $customer = customer::find($id);
        $name = $customer->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        }
        //$customer->update(['name'=>$request->get('name') ]);
        $customer->last_name = $request->get('last_name');
        $customer->first_name = $request->get('first_name');
        $customer->birth_date = $request->get('birth_date');
        $customer->registration_date = $request->get('registration_date');
        $customer->address= $request->get('address');
        $customer->city = $request->get('city');
        $customer->plz = $request->get('plz');
        $customer->country = $request->get('country');
        $customer->country = $request->get('country');
        $customer->image = $name;
        $customer->save();
        return redirect()->route('customer.index')->with('message', ' customer information updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer = customer::find($id);
        $customer->delete();
        return redirect()->route('customer.index')->with('message','customer deleted');
    }
}
