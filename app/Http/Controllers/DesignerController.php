<?php

namespace App\Http\Controllers;

use App\Models\Designer;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DesignerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designers=Designer::all();

       return view('admin.designer.index',['designers'=>$designers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.designer.create');
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
            
         
         ] );
      
        
         $designer= new designer();
         $designer->first_name=$request->get('first_name');
        $designer->last_name=$request->get('last_name');
        $designer->email=$request->get('email');
        $designer->mobile=$request->get('mobile');
        $designer->password=Hash::make('pass123');
        $designer->user_name=$request->get('user_name');
        $designer->facebook_link=$request->get('facebook_link');
        $designer->instagram_link=$request->get('instagram_link');
        
         $isSaved=$designer->save();
        if($isSaved){
            session()->flash('alert_type','alert-success');
            session()->flash('message','Designer Added Successffly');
            return redirect()->route('designers.index');
        }
        else{
            session()->flash('alert_type','alert-danger');
            session()->flash('message','Failed To Add Designer');
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
  
       

        $designer=designer::findOrFail($id);
        return view('admin.designer.edit',['designer'=>$designer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {      $request->request->add(['id'=>$id]);
        $request->validate([
            
           'first_name'=>'required|string|min:3|max:15',
            'last_name'=>'required|string|min:3|max:15',
            'mobile'=>'required|numeric',
        
        ] );
     
       
        $designer= designer::find($id);
        $designer->first_name=$request->get('first_name');
       $designer->last_name=$request->get('last_name');
       $designer->email=$request->get('email');
       $designer->mobile=$request->get('mobile');
       $designer->password=Hash::make('pass123');
       $designer->user_name=$request->get('user_name');
       $designer->facebook_link=$request->get('facebook_link');
       $designer->instagram_link=$request->get('instagram_link');
       
        $isSaved=$designer->save();
       if($isSaved){
           session()->flash('alert_type','alert-success');
           session()->flash('message','Designer Updated Successffly');
           return redirect()->route('designers.index');
       }
       else{
           session()->flash('alert_type','alert-danger');
           session()->flash('message','Failed To Update Designer');
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
        $isDeleted= Designer::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'Designer Deleted Successfully',
                'icon'=>'success'


            ],200);

        }
        else{
            return response()->json([
                'title'=>'Faild',
                'text'=>'Faild To Delete Designer',
                'icon'=>'error'

            ],400);
        }
    }
    public function store2(Request $request)
    {
       
         $designer= new designer();
         $designer->first_name=$request->get('first_name');
        $designer->last_name=$request->get('last_name');
        $designer->email=$request->get('email');
        $designer->mobile=$request->get('mobile');
        $designer->password=Hash::make('pass123');
        $designer->user_name=$request->get('user_name');
        $designer->facebook_link=$request->get('facebook_link');
        $designer->instagram_link=$request->get('instagram_link');
        
         $isSaved=$designer->save();
        if($isSaved){
            session()->flash('alert_type','alert-success');
            session()->flash('message','Designer Added Successffly');
            return redirect()->route('admin.login');
        }
        else{
            session()->flash('alert_type','alert-danger');
            session()->flash('message','Failed To Add Designer');
            return redirect()->back();
        }
        
    }
}
