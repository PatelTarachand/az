<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subCategory;
use App\Models\PurchaseItem;
use App\Models\ApplyService;
use App\Models\packages;
use App\Models\UserPackage;

use App\Models\User;
use Session;
use Redirect;

class ServiceManDashboardController extends Controller
{
    public function loginForm(){
        return view('ServiceManDashboard.emp-login');
    }

    public function loginSubmit(Request $request){
        $mobile = $request->mobile;
        $password = $request->password;
        if(\Auth::attempt(['mobile' => $mobile, 'password' => $password,'role'=>2])){ 
            $res =  $user =\Auth::user(); 
            return redirect(route('empHome'));    
        }else{
            return redirect()->back()->with('error_otp', 'Invalid otp');
        }
    }

    public function empHome(){
        $uid = \Auth::user()->id;
        $page="2";
        $records = ApplyService::leftJoin('users','apply_services.user_id','users.id')
                                ->where('apply_services.service_man_id', $uid)
                                ->select('apply_services.*','users.name','users.mobile')
                                ->get();
        return view('ServiceManDashboard.emp-home', compact('records','page'));
    }

   

    public function empApplyServicesDetails($id){
        $userid =  \Auth::user()->id;
        $data = ApplyService::find($id);
        $today = date('Y-m-d');
        $items = PurchaseItem::where('service_id',$id)->get();
        $sum = PurchaseItem::where('service_id',$id)->where('status',1)->sum('total');
         
         $packages = UserPackage::where('user_id', $userid)->where('start_date','<=',$today)->where('end_date','>=',$today)->first();
         $total = $sum;
         if($packages==''){
           $service_charges = packages::first();
           $total = $total + $service_charges->amount;
         }
          
    

         return view('ServiceManDashboard.service_details', compact('data','items','sum','packages','total'));
    }

    public function profile(){
        return view('ServiceManDashboard.profile');
    }

    public function logout(){
        return "logout";
    }

    public function serviceDetails(){
        return view('ServiceManDashboard.serviceDetails');
    }
}
