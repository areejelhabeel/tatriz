<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customer::all();

        return view('admin.customer.index',['customers'=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'first_name'=>'required|string|min:3|max:15',
            'last_name'=>'required|string|min:3|max:15',
            'email'=>'required|unique:admins,email',
            'mobile'=>'required|numeric'
        ] );
        
      
       
        $customer = new Customer();
        $customer->first_name=$request->get('first_name');
        $customer->last_name=$request->get('last_name');
        $customer->email=$request->get('email');
        $customer->mobile=$request->get('mobile');
        $customer->password=Hash::make('pass123');
        $customer->user_name=$request->get('user_name');
        $customer->facebook_link=$request->get('facebook_link');
        $customer->instagram_link=$request->get('instagram_link');
      

        $isSaved=$customer->save();
        if($isSaved){
            return redirect()->route('customers.index');

        }
        else{
            return redirect()->back();
        }
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
        $customer=Customer::findOrFail($id);
        return view('admin.customer.edit',['customer'=>$customer]);
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
        $request->request->add(['id'=>$id]);
        $request->validate([
            'id'=>'required|integer|exists:customers,id',
            'first_name'=>'required|string|min:3|max:15',
            'last_name'=>'required|string|min:3|max:15',
            'mobile'=>'required|numeric'
        ] );
       
       
       $customer=Customer::find($id);
       $customer->first_name=$request->get('first_name');
       $customer->last_name=$request->get('last_name');
       $customer->email=$request->get('email');
       $customer->mobile=$request->get('mobile');
       $customer->password=Hash::make('pass123');
       $customer->user_name=$request->get('user_name');
       $customer->facebook_link=$request->get('facebook_link');
       $customer->instagram_link=$request->get('instagram_link');
        $isSaved=$customer->save();
        if($isSaved){
            return redirect()->route('customers.index');

        }
        else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDeleted= Customer::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'Customer Deleted Successfully',
                'icon'=>'success'


            ],200);

        }
        else{
            return response()->json([
                'title'=>'Faild',
                'text'=>'Faild To Delete Customer',
                'icon'=>'error'

            ],400);
        }
    }
    public function store2(Request $request)
    {
       
        $customer = new Customer();
        $customer->first_name=$request->get('first_name');
        $customer->last_name=$request->get('last_name');
        $customer->email=$request->get('email');
        $customer->mobile=$request->get('mobile');
        $customer->password=Hash::make('pass123');
        $customer->user_name=$request->get('user_name');
        $customer->facebook_link=$request->get('facebook_link');
        $customer->instagram_link=$request->get('instagram_link');
      

        $isSaved=$customer->save();
        if($isSaved){
            return redirect()->route('admin.login');

        }
        else{
            session()->flash('alert_type','alert-danger');
            session()->flash('message','Failed To Add Designer');
            return redirect()->back();
        }
       
       
          
        
    }
}
