<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\Designer;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designs=Design::with('designers')->get();

        return view('admin.design.index',['designs'=>$designs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designers=Designer::all(); 
        return view('admin.design.create',['designers'=>$designers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { $request->validate([
        'designer_id'=>'required|integer|exists:designers,id',
        'description'=>'required|string|min:5|max:50',
       
    ] );
    $design = new Design();
    $design->name=$request->get('name');
    $design->description=$request->get('description');
    $design->size=$request->get('size');
    $design->color=$request->get('color');
    $design->designer_id=$request->get('designer_id');
        if($request->hasFile('image_design')){
            $designimage=$request->file('image_design');
            $imageName=$designimage->getClientOriginalName();
         $designimage->move('images/designs',$imageName);
           $design->image=$imageName;
 
        }
        $isSaved=$design->save();
        if($isSaved){
            return redirect()->route('designs.index');

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
        $design=Design::findOrFail($id);
        return view('admin.design.edit',['design'=>$design,'designers'=>$designers]);
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
            'designer_id'=>'required|integer|exists:designers,id',
            'id'=>'required|integer|exists:designs,id',
            'description'=>'required|string|min:5|max:50',
           
        ] );
        
      
       
        $design= Design::find($id);
        $design->name=$request->get('name');
        $design->description=$request->get('description');
        $design->color=$request->get('color');
        $design->size=$request->get('size');
        $design->designer_id=$request->get('designer_id');

        $isSaved=$design->save();
        if($isSaved){
            return redirect()->route('designs.index');

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
        $isDeleted= Design::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'Design Deleted Successfully',
                'icon'=>'success'


            ],200);

        }
        else{
            return response()->json([
                'title'=>'Faild',
                'text'=>'Faild To Delete Design',
                'icon'=>'error'

            ],400);
        }
    }

public function search(Request $request){
    if ($request->isMethod('POST')){
   $search_text=$request->get('search');
   $designs=Design::where('name','LIKE','%'. $search_text .'%')->with('designers')->get();
   
}return view('admin.design.search',compact('designs'));
}

}
