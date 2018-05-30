<?php

namespace App\Http\Controllers;

use App\trans_detail;
use Illuminate\Http\Request;

class TransDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return trans_detail::all();
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
        return ::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\trans_detail  $trans_detail
     * @return \Illuminate\Http\Response
     */
    public function show(trans_detail $trans_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\trans_detail  $trans_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(trans_detail $trans_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\trans_detail  $trans_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, trans_detail $trans_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\trans_detail  $trans_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(trans_detail $trans_detail)
    {
        //
    }
}
