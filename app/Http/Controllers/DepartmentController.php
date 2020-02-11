<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy('company_department_id','DESC')->get();
        return view('admin.department.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department.create');
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
            'department_title' => 'required',
            'department_description' => 'required',
        ]);
        $department = new Department;
        $department->department_title = $request->department_title;
        $department->department_description = $request->department_description;
        $department->save();
        if($department){
            return back()->with('message','Department added successfully');
        }
        else{
            return back()->with('message','Error in adding Department');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($department)
    {
        $department =Department::where('company_department_id',$department)->first();
        return view('admin.department.update',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $department)
    {
        $request->validate([
            'department_title' => 'required',
            'department_description' => 'required',
        ]);
        $update = Department::where('company_department_id',$department)->update([
            'department_title'=>$request->department_title,
            'department_description'=>$request->department_description,
        ]);
        if($update){
            return back()->with('message','Department Updated successfully');
        }
        else{
            return back()->with('message','Error in adding Department');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($department)
    {
        $department =Department::where('company_department_id',$department)->delete();       
        if($department){
            return back()->with('message',"Department Successfully Deleted");
        }else{
            return back()->with('message',"Error in Deleting");
        }
    }
}
