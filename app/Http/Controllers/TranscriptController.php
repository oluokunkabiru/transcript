<?php

namespace App\Http\Controllers;

use App\Transcript;
use Illuminate\Http\Request;

class TranscriptController extends Controller
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
        //
        $payment = new Transcript();
        $payment->status = $request->status;
        $payment->payment_details = json_encode($request->payment_details);
        $payment->user_id = $request->user_id;
        $payment->save();
        $responder = config('app.apiResponse');
        $responder['status'] = 0;
        $responder['message'] = "Congratulation";
        $responder['data'] = $payment;
        return $responder;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transcript  $transcript
     * @return \Illuminate\Http\Response
     */
    public function show(Transcript $transcript)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transcript  $transcript
     * @return \Illuminate\Http\Response
     */
    public function edit(Transcript $transcript)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transcript  $transcript
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transcript $transcript)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transcript  $transcript
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transcript $transcript)
    {
        //
    }
}
