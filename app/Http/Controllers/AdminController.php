<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\AssignService;
use App\Models\User;
class AdminController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function logout(){
        \Auth::logout(); // log the user out of our application
        return view('auth.login');
    }

    public static function getValueStatic2($table,$column,$key,$value)
    {
         $result = DB::select("SELECT ".$column." FROM ".$table." WHERE ".$key." = ".$value);
         if(empty($result)) { return ''; } else { return $result[0]->$column; }
      
    }

    public static function getServiceManList($id){

      return User::leftJoin('assign_services','users.id','assign_services.service_man_id')
            ->where('assign_services.sub_category_id', 'LIKE', "%{$id}%") 
            ->select('users.id','users.name')
            ->get();
    }
}
