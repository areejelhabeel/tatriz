<?php

namespace App\Http\Controllers;

use App\Models\Designer;
use App\Models\DesignerAssistant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DesignerAssistantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designer_assistants=DesignerAssistant::with('designers')->get();
        return view('admin.designer_assistant.index',['designer_assistants'=>$designer_assistants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designers=Designer::all(); 
        return view('admin.designer_assistant.create',['designers'=>$designers]);
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
            'mobile'=>'required|numeric'
        ] );
        
      
       
        $designer_assistant = new DesignerAssistant();
        $designer_assistant->first_name=$request->get('first_name');
        $designer_assistant->last_name=$request->get('last_name');
        $designer_assistant->email=$request->get('email');
        $designer_assistant->mobile=$request->get('mobile');
        $designer_assistant->password=Hash::make('pass123');
        $designer_assistant->user_name=$request->get('user_name');
        $designer_assistant->facebook_link=$request->get('facebook_link');
        $designer_assistant->instagram_link=$request->get('instagram_link');
        $designer_assistant->designer_id=$request->get('designer_id');
       
        $isSaved=$designer_assistant->save();
        if($isSaved){
            return redirect()->route('designer_assistants.index');

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
        $designer_assistant=DesignerAssistant::findOrFail($id);
        return view('admin.designer_assistant.edit',['designer_assistant'=>$designer_assistant,'designers'=>$designers]);
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
            'mobile'=>'required|numeric',
            'id'=>'required|integer|exists:designer_assistants,id',
        ] );
        
      
       
        $designer_assistant  =DesignerAssistant::find($id);
        $designer_assistant->first_name=$request->get('first_name');
        $designer_assistant->last_name=$request->get('last_name');
        $designer_assistant->email=$request->get('email');
        $designer_assistant->mobile=$request->get('mobile');
        $designer_assistant->password=Hash::make('pass123');
        $designer_assistant->user_name=$request->get('user_name');
        $designer_assistant->facebook_link=$request->get('facebook_link');
        $designer_assistant->instagram_link=$request->get('instagram_link');
        $designer_assistant->designer_id=$request->get('designer_id');
       
        $isSaved=$designer_assistant->save();
        if($isSaved){
            return redirect()->route('designer_assistants.index');

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
        $isDeleted= DesignerAssistant::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'Designer Assistant Deleted Successfully',
                'icon'=>'success'


            ],200);

        }
        else{
            return response()->json([
                'title'=>'Faild',
                'text'=>'Faild To Delete Designer Assistant',
                'icon'=>'error'

            ],400);
        }
    }
    public function create2()
    {
        $designers=Designer::all(); 
        return view('admin.registerDesignerAssistant',['designers'=>$designers]);
    }
    public function store2(Request $request)
    {
       
        
      
       
        $designer_assistant = new DesignerAssistant();
        $designer_assistant->first_name=$request->get('first_name');
        $designer_assistant->last_name=$request->get('last_name');
        $designer_assistant->email=$request->get('email');
        $designer_assistant->mobile=$request->get('mobile');
        $designer_assistant->password=Hash::make('pass123');
        $designer_assistant->user_name=$request->get('user_name');
        $designer_assistant->facebook_link=$request->get('facebook_link');
        $designer_assistant->instagram_link=$request->get('instagram_link');
        $designer_assistant->designer_id=$request->get('designer_id');
       
        $isSaved=$designer_assistant->save();
        if($isSaved){
            return redirect()->route('admin.login');

        }
        else{
            return redirect()->back();
        }
    }

}
