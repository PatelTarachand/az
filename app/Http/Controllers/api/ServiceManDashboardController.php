<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\ApplyService;
use App\Models\PurchaseItem;

class ServiceManDashboardController extends BaseController
{
    
    public function test(){
        return "he";
    }
    public function sLogin(Request $request){
        
        
        $rules = array('email'=>'required|email',
        'password'=>'required|digits:8');
        
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
        return $this->sendError($validator->messages());
        }
        
        $email = $request->email;
        $password = $request->password;
        
        
         if(\Auth::attempt(['email' => $email, 'password' => $password])){ 
            $res =  $user =\Auth::user(); 
            $success['id'] =  $res->id;
            $success['name'] =  $res->name;
            $success['email'] =  $res->email;
            $success['mobile'] =  $res->mobile;
            $success['address'] =  $res->address;
            $success['profile_photo_path'] =  $res->profile_photo_path;      
            $success['authtoken'] =$res->createToken($res->mobile)->plainTextToken;
            return $this->sendResponse($success, 'Login Success.');
        }else{
            $success['error'] = 'failed';
            return $this->sendResponse($success, 'Something went wrong.');
        }
    }
    
    
       public function fetch_assign_service(Request $request){
        //$auth_id =auth()->user()->id;
        //$auth_id = 9;
        //->where('user_id',$auth_id);
        //->where('apply_services.status','!=','0')
        $res= ApplyService::leftJoin('categories','apply_services.category_id','categories.id')
                            ->leftJoin('sub_categories','apply_services.sub_category_id','sub_categories.id')
                            ->select('apply_services.*','categories.name as category_name','sub_categories.subCategoryName as sub_category_name')
                            ->get();
                            
        return $this->sendResponse2($res, 'Applied Data');
        
    }
    
     public function add_item(Request $request){
        //  return $request->all();
         
         $rules = array(
            'item_name'=>'required',
            'price'=>'required',
            'qty'=>'required',
            'total'=>'required',
            'service_id'=>'required',
            'user_id'=>'required',
            );
       
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
        return $this->sendError($validator->messages());
        }
        
         $data = $request->all();
         //$data['user_id'] = auth()->user()->id;
         
         $data['service_man_id'] = 9;
         
         $res = PurchaseItem::create($data);
         $msg= 'Item Added';
       
        
        return $this->sendResponse($res, $msg);
        
    }
    
    public function fetch_items(Request $request){
         $request->all();
            $res['data'] = PurchaseItem::where('service_id',$request->service_id)->get();
            $res['total'] = PurchaseItem::where('service_id',$request->service_id)->where('status',1)->sum('total');
             return $this->sendResponse2($res, 'Items Data');
    }
    
}
