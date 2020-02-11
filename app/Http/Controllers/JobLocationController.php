<?php

namespace App\Http\Controllers;

use App\JobLocation;
use Illuminate\Http\Request;

class JobLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = JobLocation::orderBy('company_location_id','DESC')->get();
        return view('admin.location.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.location.create');
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
            'location_name' => 'required',
            'location_description' => 'required',
        ]);
        $location = new JobLocation;
        $location->location_name = $request->location_name;
        $location->location_description = $request->location_description;
        $location->save();
        if($location){
            return back()->with('message','Location added successfully');
        }
        else{
            return back()->with('message','Error in adding Location');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobLocation  $jobLocation
     * @return \Illuminate\Http\Response
     */
    public function show(JobLocation $jobLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobLocation  $jobLocation
     * @return \Illuminate\Http\Response
     */
    public function edit($location)
    {
        $location =JobLocation::where('company_location_id',$location)->first();
        return view('admin.location.update',compact('location'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobLocation  $jobLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$location)
    {
        $request->validate([
            'location_name' => 'required',
            'location_description' => 'required',
        ]);
        // dd($location);
        $update = JobLocation::where('company_location_id',$location)->update([
            'location_name'=>$request->location_name,
            'location_description'=>$request->location_description,
        ]);
        if($update){
            return back()->with('message','Location Updated successfully');
        }
        else{
            return back()->with('message','Error in adding Location');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobLocation  $jobLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy($location)
    {   
        $location =JobLocation::where('company_location_id',$location)->delete();       
        if($location){
            return back()->with('message',"Location Successfully Deleted");
        }else{
            return back()->with('message',"Error in Deleting");
        }
    }
}
