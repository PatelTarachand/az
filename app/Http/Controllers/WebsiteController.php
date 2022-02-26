<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\category;
use Redirect;
use Session;
use DB;


class WebsiteController extends Controller
{
    public function index(){
        return view('website.index');
    }

    public function aboutus(){
        return view('website.about');
    }


    public function contactus(){
        return view('website.contact');
    }



    public function userLogin(){
        return view('website.login');
    }

    public function userLoginSubmit(Request $request){
        $request->validate([
            'mobile'=>'required|digits:10'
            ]);
        
        $mobile = $request->mobile;
        
        $digits = 4;
        //$otp = rand(pow(10, $digits-1), pow(10, $digits)-1);
        $otp='123';
        $myArray = array(
            'password' => $otp
        );
        
        $input = User::where('mobile', $mobile)->first();

        if($input){
            $input = User::find($input->id);
            $input->password =bcrypt($otp);      
            $input->save();
            Session::put('sMobile', $mobile);
            return Redirect('user-otp-form');

          
       }else{
            $input = new User();
            $input->mobile = $mobile;
            $input->password =bcrypt($otp);      
             $input->save();
             Session::put('sMobile', $mobile);
             return Redirect('user-otp-form');
       }

      
        return Redirect::back();
    }
    
    public function userOtpForm(Request $request){
        return view('website.otp');
    }

    public function userOtpSubmit(Request $request){

        $request->validate([
            'mobile'=>'otp=>required|digits:4'
            ]);
        
        $mobile = Session::get('sMobile');
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
            return Redirect('user-home');    
        }else{
            $success['mobile'] =  $mobile;
            $success['otp'] =  $otp;
            Session::flash('error_otp', 'Invalid otp');
            return Redirect::back();
        }


        
        
    }
    
    public function userHome(){
         $data['user_id'] = \Auth::user()->id;
        $category = category::where('status', 1)->get();
        return view('userDashboard.index', ['category'=>$category]);
    }
    
    
    public static function getValue($table, $key, $value, $column){
        $res = DB::table($table)->where($key, $value)->value($column);
        return $res;
    }


    public static function getData($table, $key, $value, $key2, $value2,){
        $res = DB::table($table)->where($key, $value)->where($key, $value)->get();
        return $res;
    }

    

   
}
