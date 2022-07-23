<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Design;
use App\Models\Designer;
use App\Models\DesignerAssistant;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::with(['designers','customers'])->get();
       

        return view('admin.order.index',['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {$designs=Design::all();
        $designers=Designer::all(); 
        $customers=Customer::all();
        return view('admin.order.create',['designers'=>$designers,'customers'=>$customers,'designs'=>$designs]);
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
            'designer_id'=>'required|integer|exists:designers,id',
            'description'=>'required|string|min:5|max:50',
           
        ] );
        $order = new Order();
        $order->mobile=$request->get('mobile');
        $order->description=$request->get('description');
        $order->size=$request->get('size');
        $order->color=$request->get('color');
        $order->designer_id=$request->get('designer_id');
        $order->customer_id=$request->get('customer_id');
        $order->design_id=$request->get('design_id');
        $order->time=$request->get('time');
        $order->date=$request->get('date');
            if($request->hasFile('image_design')){
                $orderimage=$request->file('image_design');
                $imageName=$orderimage->getClientOriginalName();
             $orderimage->move('images/orders',$imageName);
               $order->image=$imageName;
     
            }
            $isSaved=$order->save();
            if($isSaved){
                return redirect()->route('orders.index');
    
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
        $designers=Designer::all(); 
        $customers=Customer::all();
        $designs=Design::all();
        $order=Order::findOrFail($id);
        return view('admin.order.edit',['order'=>$order,'designers'=>$designers,'customers'=>$customers,'designs'=>$designs]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { $request->request->add(['id'=>$id]);
        $request->validate([
            'designer_id'=>'required|integer|exists:designers,id',
            'description'=>'required|string|min:5|max:50',
            'customer_id'=>'required|integer|exists:customers,id',
        ] );
        $order =Order::find($id);
        $order->mobile=$request->get('mobile');
        $order->description=$request->get('description');
        $order->size=$request->get('size');
        $order->color=$request->get('color');
        $order->designer_id=$request->get('designer_id');
        $order->customer_id=$request->get('customer_id');
        $order->design_id=$request->get('design_id');
        $order->time=$request->get('time');
        $order->date=$request->get('date');
            if($request->hasFile('image_order')){
                $orderimage=$request->file('image_order');
                $imageName=$orderimage->getClientOriginalName();
             $orderimage->move('images/orders',$imageName);
               $order->image=$imageName;
     
            }
            $isSaved=$order->save();
            if($isSaved){
                return redirect()->route('orders.index');
    
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
        $isDeleted= Order::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'Order Deleted Successfully',
                'icon'=>'success'


            ],200);

        }
        else{
            return response()->json([
                'title'=>'Faild',
                'text'=>'Faild To Delete Order',
                'icon'=>'error'

            ],400);
        }
    }
}
