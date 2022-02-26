<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\BaseController as BaseController;

use Illuminate\Http\Request;
use App\Models\PurchaseItem;

class PurchaseItemController extends BaseController
{
    //add item by Service man
    
    public function add_item(){
        
    }
    
    
    //fetch item by User
    public function fetch_items(Request $request){
        $auth_id = auth()->user()->id;
        //$auth_id = 9;
        $res['data'] = PurchaseItem::where('user_id',$auth_id)->where('service_id',$request->service_id)->get();
        $res['sum'] = PurchaseItem::where('user_id',$auth_id)->where('service_id',$request->service_id)->sum('total');
        return $this->sendResponse($res, 'Items');
    } 
    
    public function item_status(Request $request){
         $request->status;
         $rules = array(
            'status'=>'required',
            );
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
        return $this->sendError($validator->messages());
        }
        $auth_id = auth()->user()->id;
        //$auth_id = 9;
         PurchaseItem::where('user_id',$auth_id)->where('id',$request->item_id)->update(['status'=>$request->status]);
        
         $res['data'] = PurchaseItem::where('user_id',$auth_id)->where('service_id',$request->service_id)->get();
         $res['sum'] = PurchaseItem::where('user_id',$auth_id)->where('service_id',$request->service_id)->sum('total');
        return $this->sendResponse($res, 'Items');
        
    }
    
    
}
