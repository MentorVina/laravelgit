<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all()->sortByDesc('id');
        return view('curd.index')->with('customers',$customers);
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

        //return $request->input();
        // var_dump($request->email);
        //    die();
        
        $request->validate([

            'name'=>'required',
            'email'=>'required |email |unique:customers',
            'mobile'=>'required | min:10 | max:10',
        ]);

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile = $request->mobile;
        $customer->address = $request->address;
        $query = $customer->save();

    
        if($query){
            
            return back()->with('success','Data inserted successfully');
        }else{
            
            return back()->with('fail','Something went wrong,
                please check');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('curd.update')->with('customer',$customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([

            'name'=>'required',
            'email'=>'required |email |',
            'mobile'=>'required | min:10 | max:10',
        ]);

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile = $request->mobile;
        $customer->address = $request->address;
        $query = $customer->save();

        if($query){
            
            return redirect()->route('customers.index')->with('success','Data Updated successfully');
        }else{
            
            return back()->with('fail','Something went wrong,
                please check');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $query = $customer->delete();
        if($query){
            return back()->with('success','Data Deleted Successfully');
        }else{
            return back()->with('fail','Something went wrong,
                please check');
        }  
    }
}
