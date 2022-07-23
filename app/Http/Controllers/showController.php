<?php

namespace App\Http\Controllers;

use App\Models\show;
use Illuminate\Http\Request;

class showController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows=show::all();

        return view('admin.shows.index',['shows'=>$shows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shows.create');
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

            'name'=>'required|string|min:3|max:15',
            'address'=>'required|string|min:3|max:15',
            'time'=>'required',
        ] );
        
      
       
        $show = new show();
        $show->name=$request->get('name');
        $show->address=$request->get('address');
        $show->time=$request->get('time');
        $show->date=$request->get('date');
        $show->amount_required=$request->get('amount_required');
      

        $isSaved=$show->save();
        if($isSaved){
            return redirect()->route('shows.index');

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
    { $show=show::findOrFail($id);
        return view('admin.shows.edit',['show'=>$show]);
       
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
            
            'name'=>'required|string|min:3|max:15',
            
        ] );
       
       
       $show=show::find($id);
       $show->name=$request->get('name');
       $show->address=$request->get('address');
       $show->time=$request->get('time');
       $show->date=$request->get('date');
       $show->amount_required=$request->get('amount_required');

        $isSaved=$show->save();
        if($isSaved){
            return redirect()->route('shows.index');

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
        $isDeleted= show::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'Fashion Show Deleted Successfully',
                'icon'=>'success'


            ],200);

        }
        else{
            return response()->json([
                'title'=>'Faild',
                'text'=>'Faild To Delete Fashion Show',
                'icon'=>'error'

            ],400);
        }
    }
}
