<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\ApplyService;

class ApplyServiceController extends BaseController
{
   public function apply_service(Request $request)
    {
        $rules = array(
            'category_id'=>'required',
            'sub_category_id'=>'required',
            'description'=>'required',
            'lat'=>'nullable',
            'long'=>'nullable',
            'manual_address'=>'nullable',
            'apply_date'=>date('Y-m-d'),
            'apply_date'=>date('H:i:s'),
            );
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
        return $this->sendError($validator->messages());
        }
        
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
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
          
        return $this->sendResponse($res,$msg);
    }
    
    public function fetch_apply_service(Request $request){
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


    public function assignTask(Request $request){

    return ApplyService::where('id',$request->id)->update(['service_man_id'=>$request->ser_id,'status'=>1]);

    }
    
   
    
}
