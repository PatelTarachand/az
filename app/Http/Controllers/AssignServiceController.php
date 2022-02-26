<?php

namespace App\Http\Controllers;

use App\Models\AssignService;
use App\Models\category;
use App\Models\User;

use Illuminate\Http\Request;

class AssignServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['sub_category_id'] = json_encode($request->sub_cat,true);
        $input['createdby'] = auth()->user()->id;
        unset($request->sub_cat);
        AssignService::create($input);
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssignService  $assignService
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $man = User::find($id);
        $data = AssignService::where('assign_services.service_man_id',$id)->leftJoin('categories','assign_services.category_id','categories.id')->select('assign_services.*','categories.name as category_name')->get();
        $category = category::where('status',1)->orderBy('name','asc')->get();
        return view('services.assignservice',compact('category','man','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssignService  $assignService
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $editData = AssignService::find($id);
       $man = User::find($editData->service_man_id);
       $data = AssignService::where('assign_services.service_man_id',$editData->service_man_id)->leftJoin('categories','assign_services.category_id','categories.id')->select('assign_services.*','categories.name as category_name')->get();
      
        $category = category::where('status',1)->orderBy('name','asc')->get();
        return view('services.assignservice',compact('category','man','data','editData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssignService  $assignService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $input = $request->all();
        $input['sub_category_id'] = json_encode($request->sub_cat,true);
        $input['createdby'] = auth()->user()->id;
        unset($input['sub_cat']);
        unset($input['_method']);
        unset($input['_token']);
        AssignService::where('id',$id)->update($input);
        
        return redirect(route('assignService.show',$request->service_man_id))->with('message','Update Assign Task');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssignService  $assignService
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignService $assignService)
    {
        //
    }
    
}
