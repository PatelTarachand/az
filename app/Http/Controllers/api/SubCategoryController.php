<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController as BaseController;
use App\Models\subCategory;

class SubCategoryController extends BaseController
{
    public function index(Request $request)
    {
        $subCategory = subCategory::where('category_id', $request->id)->get();
        $success['data'] =  $subCategory;
        return $this->sendResponse2($subCategory, 'Data found successfully!');
    }

   
}
