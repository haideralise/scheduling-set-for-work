<?php

namespace App\Http\Controllers;

use App\Cost;
use App\Department;
use Illuminate\Http\Request;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cost_centers = Cost::orderBy('id','DESC')->with('department')->get();
        return view('admin.cost-center.index',compact('cost_centers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('admin.cost-center.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'center_name' => 'required|unique:cost_center,center_name',
            'center_code' => 'required|unique:cost_center,center_code',
            'department_id' => 'required|exists:company_department,company_department_id',
        ]);
        $cost = new Cost;
        $cost->center_name = $request->center_name;
        $cost->center_code = $request->center_code;
        $cost->department_id = ($request->department_id);
        $cost->save();
        if($cost){
            return back()->with('message','Department added successfully');
        }
        else{
            return back()->with('message','Error in adding Department');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function show(Cost $cost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function edit($cost)
    {
        $cost =Cost::where('id',$cost)->first();
        $departments = Department::all();
        return view('admin.cost-center.update',compact('cost','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cost)
    {
        $request->validate([
            'center_name' => 'required',
            'center_code' => 'required',
            'department_id' => 'required',
        ]);
        $update = Cost::where('id',$cost)->update([
            'center_name'=>$request->center_name,
            'center_code'=>$request->center_code,
            'department_id'=>$request->department_id,
        ]);
        if($update){
            return back()->with('message','Cost Updated successfully');
        }
        else{
            return back()->with('message','Error in adding Cost');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cost  $cost
     * @return \Illuminate\Http\Response
     */
    public function destroy($cost)
    {
        $cost =Cost::where('id',$cost)->delete();
        if($cost){
            return back()->with('message',"Cost Successfully Deleted");
        }else{
            return back()->with('message',"Error in Deleting");
        }
    }
}
