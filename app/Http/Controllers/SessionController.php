<?php

namespace App\Http\Controllers;

use App\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('session.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('session.create');
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
        $request->validate(['name'=>'required|unique:sessions,name']);
        $session = new Session();
        $session->name = $request->name;
        $session->save();
        $responder = config('app.apiResponse');
        $responder['status'] = 0;
        $responder['message'] = "Session Created Successfully";
        $responder['data'] = $session;
        // $responder['meta'] = ;
        // return $responder;
        return response()->json( $responder );
        // return $request;
    }

    public function sessionList(){
        $session = Session::orderBy('name')->get();
        $responder['status'] = 0;
        $responder['data'] = $session;
        return response()->json($responder);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        //
        // $session = Session::find($request->id);
        // $session->name = $request->name;
        // $session->update();
        // return $session;
        $session->name = $request->name;
        $session->update();
    //    return $session->update($request->all());
        $responder = config('app.apiResponse');
        $responder['status'] = 0;
        $responder['message'] = "Session Updated Successfully";
        $responder['data'] = $session;
        // $responder['meta'] = ;
        // return $responder;
        return response()->json( $responder );


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        //
    }
}
