<?php

namespace App\Http\Controllers;



use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=admin::all();

       return view('admin.admins.index',['admins'=>$admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
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
        
      
       
        $admin = new admin();
        $admin->first_name=$request->get('first_name');
        $admin->last_name=$request->get('last_name');
        $admin->email=$request->get('email');
        $admin->mobile=$request->get('mobile');
        $admin->password=Hash::make('pass123');
        $admin->user_name=$request->get('user_name');
        $admin->facebook_link=$request->get('facebook_link');
        $admin->instagram_link=$request->get('instagram_link');
      

        $isSaved=$admin->save();
        if($isSaved){
            return redirect()->route('admins.index');

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

        $admin=admin::findOrFail($id);
        return view('admin.admins.edit',['admin'=>$admin]);
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
            
            'first_name'=>'required|string|min:3|max:15',
            'last_name'=>'required|string|min:3|max:15',
            'mobile'=>'required|numeric'
        ] );
       
       
       $admin=admin::find($id);
       $admin->first_name=$request->get('first_name');
        $admin->last_name=$request->get('last_name');
        $admin->email=$request->get('email');
        $admin->mobile=$request->get('mobile');
        $admin->password=Hash::make('pass123');
        $admin->user_name=$request->get('user_name');
        $admin->facebook_link=$request->get('facebook_link');
        $admin->instagram_link=$request->get('instagram_link');

        $isSaved=$admin->save();
        if($isSaved){
            return redirect()->route('admins.index');

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
        $isDeleted= admin::destroy($id);
        if($isDeleted){
            return response()->json([
                'title'=>'Success',
                'text'=>'Admin Deleted Successfully',
                'icon'=>'success'


            ],200);

        }
        else{
            return response()->json([
                'title'=>'Faild',
                'text'=>'Faild To Delete Admin',
                'icon'=>'error'

            ],400);
        }
    }
}
