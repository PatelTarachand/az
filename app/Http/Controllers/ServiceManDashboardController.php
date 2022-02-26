<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subCategory;
use App\Models\PurchaseItem;
use App\Models\ApplyService;
use App\Models\packages;
use App\Models\UserPackage;
use Auth;
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

    public function startWork($id){
        $start_work_date = date('Y-m-d');
        $start_work_time = date('H:i');
       ApplyService::where('id',$id)->update(['start_work_date'=>$start_work_date,'start_work_time'=>$start_work_time,'status'=>2]);
       return redirect()->back();
    }


    public function add_items(Request $request){
        $input = $request->all();
       return PurchaseItem::create($input);
    }
   
    public function item_details(Request $request){
        $records = PurchaseItem::where('service_id',$request->id)->get();
        $html='';
        $i=1;
       
        foreach($records as $tc){

            $status ='';
            if($tc->status==0){
                $route ="item_delete/".$tc->id;
                $status ='<a href="'.$route.'" class="btn btn-danger">x</a>';
                
            }elseif($tc->status==1){
                $status ='Approved';

            }elseif($tc->status==2){
                $status ='Cancel';
            }
            
          
           
            $html.='<tr>
                    <td>'.$i.'</td>
                    <td>'.$tc->item_name.'</td>
                    <td>'.$tc->price.'</td>
                    <td>'.$tc->qty.'</td>
                    <td>'.$tc->total.'</td>
                    <td>'.$status.'</td>
            </tr>';
        }

        return $html;
    }

    public function item_delete($id){
        $records = PurchaseItem::where('id',$id)->delete();
        return redirect()->back();
    }
    public function empApplyServicesDetails($id){
        $userid =  \Auth::user()->id;
        $data = ApplyService::leftJoin('users','apply_services.user_id','users.id')
        ->where('apply_services.id', $id)
        ->select('apply_services.*','users.name','users.mobile')
        ->get()->first();
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
        $data = User::find(Auth::user()->id);
        return view('ServiceManDashboard.profile',compact('data'));
    }

    public function logout(){
        Auth::logout();
        return redirect(route('index'));
    }

    public function serviceDetails(){
        return view('ServiceManDashboard.serviceDetails');
    }
}
