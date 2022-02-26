<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class ServicemanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::where('role',2)->paginate(10);
          
        if ($request->ajax()) {
            return view('serviceman.serviceman_datatable', compact('data'));
        }
        
        return view('serviceman.serviceman',compact('data'));
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
        $data = $request->all();
        
        if ($request->hasFile('profile')) {
            $rand_val = date('YMDHIS') . rand(11111, 99999);
            $image_file_name = md5($rand_val);
            $file = $request->file('profile');
            $fileName = $image_file_name . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/servicemanprofile';
            $file->move($destinationPath, $fileName);
             $path = $destinationPath.'/'.$fileName;
            $data['profile_photo_path'] = $fileName;
        }

        $data['role'] = 2;
        $data['password'] = Hash::make($request->password);
        
        unset($data['_token']);
        if($request->serviceman_id == 0){
            $res = User::create($data);
            if($res->id){
                $response = [];
                $response['error'] = false;
                $response['success'] = true;
                $response['popup_type'] = "success";
                $response['action'] = "create";
                $response['message'] = "New Record Added Successfully";
                return $response;
            }else{
                $response = [];
                $response['error'] = true;
                $response['success'] = false;
                $response['popup_type'] = "error";
                $response['action'] = "";
                $response['message'] = "Something went wrong";
                return $response;            
            }
        }else{
            if(User::where('id', $request->serviceman_id)->update($data)){
                $response = [];
                $response['error'] = false;
                $response['success'] = true;
                $response['popup_type'] = "success";
                $response['action'] = "update";
                $response['message'] = "Record Updated Successfully";
                return $response;
            }else{
                $response = [];
                $response['error'] = true;
                $response['success'] = false;
                $response['popup_type'] = "error";
                $response['action'] = "";
                $response['message'] = "Something went wrong";
                return $response;            
            }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
