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
use Illuminate\Support\Facades\Auth;

class UserDashboard extends Controller
{
    

    public function user_profile_update(Request $request)
    {
        $id = Auth::id();
        $data = $request->all();
        unset($data['_token']);
        if(User::where('id', $id)->update($data)){
            Session::flash('success', 'Profile Update Sucessfully');
            return Redirect::back();
        }
    }

    public function userLogout(){
        Auth::logout();
        return redirect('/');            
    }
    
    public function userDashboard(){
        return view('userDashboard.index');
    }

    public function history(){
        $uid = \Auth::user()->id;
        $page="1";
        $records = ApplyService::where('user_id', $uid)->get();
        return view('userDashboard.service_list', compact('records','page'));
    }

    public function applyServices(){
        $uid = \Auth::user()->id;
        $page="2";
         $records = ApplyService::where('user_id', $uid)->where('status',0)->orWhere('status',1)->orWhere('status',2)->get();
        return view('userDashboard.service_list', compact('records','page'));
    }

    public function applyServicesDetails($id){
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
          
         

         return view('userDashboard.service_details', compact('data','items','sum','packages','total'));
    }

    public function ItemAction(Request $request,$id,$status){
        $sum = PurchaseItem::where('id',$id)->update(['status'=>$status]);
        return back();
    }    
    public function profile(Request $request){
        $userid =  \Auth::user()->id;
        $packages = packages::get();
        $user = User::find($userid);
        return view('userDashboard.profile', compact('packages', 'user'));
    }

    public function getSubcatery($id){
        $subCategory = subCategory::leftJoin('categories','sub_categories.category_id','categories.id')->where('category_id', $id)->select('categories.name','sub_categories.subCategoryName','sub_categories.img','sub_categories.id')->get();
        return view('userDashboard.sub_category', compact('subCategory'));
    }

    public function addService($id){
        $data = subCategory::leftJoin('categories','sub_categories.category_id','categories.id')->where('sub_categories.id', $id)->select('categories.name','categories.id as cat_id','sub_categories.subCategoryName','sub_categories.img','sub_categories.id as sub_cat_id')->first();
      
        return view('userDashboard.add_service', compact('data'));
    }

    public function userServiceSubmit(Request $request){
       $request->all();
       $request->validate([
        'category_id'=>'required',
        'sub_category_id'=>'required',
        'description'=>'required',
        'manual_address'=>'nullable',
        ]);
    
    
    $data = $request->all();
    $data['user_id'] = \Auth::user()->id;
    $data['apply_date'] = date('Y-m-d');
    $data['apply_time'] = date('H:i:s');
    //$data['user_id'] = 9;
    if(isset($request->id)){
          ApplyService::where('id',$request->id)->update($data);
          $res = ApplyService::find($request->id);
          $msg = 'Service Updated.';
      }else{
        $res = ApplyService::create($data);
        $msg= 'Service Requisted.';
      }
        Session::flash('success', $msg);
        return Redirect::back();
    }
}
