<?php

namespace App\Http\Controllers;

use App\CompanyShift;
use Illuminate\Http\Request;

class CompanyShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shifts = CompanyShift::orderBy('company_shift_id','DESC')->get();
        return view('admin.company-shift.index',compact('shifts'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CompanyShift  $companyShift
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyShift $companyShift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyShift  $companyShift
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyShift $companyShift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyShift  $companyShift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyShift $companyShift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyShift  $companyShift
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyShift $companyShift)
    {
        //
    }
}
