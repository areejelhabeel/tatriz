<?php

namespace App\Http\Controllers;

use App\Models\Designer;
use App\Models\Piggybank;
use Illuminate\Http\Request;

class PiggybankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $piggybanks=Piggybank::with('designers')->get();
        return view('admin.piggybank.index',['piggybanks'=>$piggybanks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designers=Designer::all(); 
        return view('admin.piggybank.create',['designers'=>$designers]);
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
            'designer_id'=>'required|integer|exists:designers,id'
        ] );
        
      
       
        $piggybank = new Piggybank();
        $piggybank->Time=$request->get('Time');
        $piggybank->date=$request->get('date');
        $piggybank->amount_of_time=$request->get('amount_of_time');
        $piggybank->designer_id=$request->get('designer_id');
       
        $isSaved=$piggybank->save();
        if($isSaved){
            return redirect()->route('piggybanks.index');

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
        $piggybank=Piggybank::findOrFail($id);
        return view('admin.piggybank.edit',['piggybank'=>$piggybank,'designers'=>$designers]);
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
            'id'=>'required|integer|exists:piggybanks,id',
        ] );
        
      
       
        $piggybank  =Piggybank::find($id);
        $piggybank->Time=$request->get('Time');
        $piggybank->date=$request->get('date');
        $piggybank->amount_of_time=$request->get('amount_of_time');
        $piggybank->designer_id=$request->get('designer_id');
       
        $isSaved=$piggybank->save();
        if($isSaved){
            return redirect()->route('piggybanks.index');

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
        $isDeleted= Piggybank::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'PiggyBank Deleted Successfully',
                'icon'=>'success'


            ],200);

        }
        else{
            return response()->json([
                'title'=>'Faild',
                'text'=>'Faild To Delete PiggyBank',
                'icon'=>'error'

            ],400);
        }
    }
}
