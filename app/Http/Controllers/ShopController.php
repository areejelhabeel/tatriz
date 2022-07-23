<?php

namespace App\Http\Controllers;

use App\Models\Designer;
use App\Models\DesignerAssistant;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops=Shop::with('designers','designer_assistants')->get();

        return view('admin.shop.index',['shops'=>$shops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {$designers=Designer::all(); 
        $designer_assistants=DesignerAssistant::all();
        return view('admin.shop.create',['designers'=>$designers,'designer_assistants'=> $designer_assistants]);
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
            'designer_assistant_id'=>'required|integer|exists:designer_assistants,id',
            'description'=>'required|string|min:5|max:50',
            'location'=>'required|string|min:5|max:30',
            'mobile'=>'required|numeric'
        ] );
        
      
       
        $shop = new shop();
        $shop->name=$request->get('name');
        $shop->description=$request->get('description');
        $shop->location=$request->get('location');
        $shop->mobile=$request->get('mobile');
        $shop->designer_id=$request->get('designer_id');
        $shop->designer_assistant_id=$request->get('designer_assistant_id');
        $isSaved=$shop->save();
        if($isSaved){
            return redirect()->route('shops.index');

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
    {   $designers=Designer::all(); 
        $designer_assistants=DesignerAssistant::all();
        $shop=Shop::findOrFail($id);
        return view('admin.shop.edit',['shop'=>$shop,'designers'=>$designers,'designer_assistants'=>$designer_assistants]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {$request->request->add(['id'=>$id]);
        $request->validate([
            'designer_id'=>'required|integer|exists:designers,id',
            'designer_assistant_id'=>'required|integer|exists:designer_assistants,id',
            'id'=>'required|integer|exists:shops,id',
            'description'=>'required|string|min:5|max:50',
            'location'=>'required|string|min:5|max:30',
            'mobile'=>'required|numeric'
        ] );
        
      
       
        $shop = shop::find($id);
        $shop->name=$request->get('name');
        $shop->description=$request->get('description');
        $shop->location=$request->get('location');
        $shop->mobile=$request->get('mobile');
        $shop->designer_id=$request->get('designer_id');
        $shop->designer_assistant_id=$request->get('designer_assistant_id');
        $isSaved=$shop->save();
        if($isSaved){
            return redirect()->route('shops.index');

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
        $isDeleted= shop::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'Shop Deleted Successfully',
                'icon'=>'success'


            ],200);

        }
        else{
            return response()->json([
                'title'=>'Faild',
                'text'=>'Faild To Delete Shop',
                'icon'=>'error'

            ],400);
        }
    }
}
