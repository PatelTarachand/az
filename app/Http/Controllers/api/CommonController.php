<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\api\BaseController as BaseController;
use App\Models\User;
use Illuminate\Http\Request;

class CommonController extends BaseController
{
    public function sendOtp(Request $request)
    {
        $rules = array('mobile'=>'required|digits:10');
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
        return $this->sendError($validator->messages());
        }
        
        $mobile = $request->mobile;
        $digits = 4;
        //$otp = rand(pow(10, $digits-1), pow(10, $digits)-1);
        $otp='1234';

       
         $input = User::where('mobile', $mobile)->first();
        if($input){
             $input = User::find($input->id);
             $input->password =bcrypt($otp);      
             $input->save();
             $success['mobile'] =  $mobile;
              return $this->sendResponse($success, 'Otp Sent.');
           
        }else{
             $input = new User();
             $input->mobile = $mobile;
             $input->password =bcrypt($otp);      
              $input->save();
             $success['mobile'] =  $mobile;
            return $this->sendResponse($success, 'Otp Sent');
        }
    }

    public function otpVerify(Request $request)
    {
        
        $rules = array('mobile'=>'required|digits:10',
        'otp'=>'required|digits:4');
        
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
        return $this->sendError($validator->messages());
        }
        
        $mobile = $request->mobile;
        $otp = $request->otp;
        
        $vefiry = User::where(['mobile'=>$mobile, 'otp'=>$otp])->count();

       if(\Auth::attempt(['mobile' => $mobile, 'password' => $otp])){ 
            $res =  $user =\Auth::user(); 
            User::where(['mobile'=>$mobile, 'password'=>$otp])->update(['veryfycode'=>$otp]);
            $success['id'] =  $res->id;
            $success['name'] =  $res->name;
            $success['email'] =  $res->email;
            $success['mobile'] =  $res->mobile;
            $success['address'] =  $res->address;
            $success['profile_photo_path'] =  $res->profile_photo_path;      
            $success['authtoken'] =$res->createToken($res->mobile)->plainTextToken;
            return $this->sendResponse($success, 'Otp Verified Successfully.');
        }else{
            $success['mobile'] =  $mobile;
            $success['otp'] =  $otp;
            return $this->sendResponse($success, 'Something went wrong.');
        }

    }

}
