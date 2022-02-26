<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use App\Models\banner;
use App\Models\category;
use App\Models\User;
use Auth;
class HomeController extends BaseController
{
    public function index(Request $request)
    {
        //$auth_id = auth()->user()->id;
        $auth_id = 9;
        $user = User::where('id', $auth_id)->first();
        $category = category::get();
        $banner = banner::where('status', 1)->get();
        $success['data1'] =  $category;
        $success['data2'] =  $user;
        $success['data3'] = $banner;
        return $this->sendResponse($success, 'Data found successfully!');
    }
    
    public function fetch_profile(Request $request){
        //$auth_id = auth()->user()->id;
        $auth_id = 9;
       $user = User::where('id', $auth_id)->first();
       return $this->sendResponse($user, 'Profile Update'); 
    }
    
    public function update_profile(Request $request){
       //$auth_id = auth()->user()->id;
        $auth_id = 9;
       $user = User::where('id', $auth_id)->first();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->address = $request->address;
       $user->package = $request->package;
       $user->save();
       return $this->sendResponse($user, 'Profile Update'); 
    }
}
