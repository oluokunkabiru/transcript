<?php

namespace App\Http\Controllers;

use App\Result;
use App\ResultSetting;
// use Barryvdh\DomPDF\PDF;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    //

    public function index()
    {
        return view('results.index');
    }

    public function openView()
    {
        return view('results.view');
    }

    public function editIndex()
    {
            return view('results.edit');
    }


    public function add(Request $request, Result $resultObject)
    {

        // return ($request);

        try
        {
            $result = $resultObject->createNew($request->all());
            // return $result;
            if ($result){
                return apiSuccess($result);
            }
            else{
                return $result;
                return apiFailure('');
            }
        }
        catch (\Exception $e)
        {
            return $e;
            return apiFailure($e);
        }
    }

    public function delete(Request $request, Result $resultObject)
    {
        try
        {
            $result = $resultObject->deleteResult($request->all());
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function edit(Request $request, Result $resultObject)
    {
        try
        {
            $result = $resultObject->updateResult($request->all());
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function viewResults(Result $resultObject)
    {
        try
        {
            $result = $resultObject->viewAll();
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function viewResult(Request $request, Result $resultObject)
    {
        try
        {
            $result = $resultObject->view($request->all());
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function viewResultSetting(ResultSetting $resultSetting)
    {
        try
        {
            $result = $resultSetting->getSetting();
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function editResultSetting(Request $request, ResultSetting $resultSetting)
    {
        try
        {
            $result = $resultSetting->updateSetting($request->all());
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function viewSelectedResult(Request $request, Result $resultObject)
    {
        // return $request;
        try
        {
            $result = $resultObject->viewSelected($request->all());
            // return $result;
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }





    public function viewSelectedResultByStudent(Request $request, Result $resultObject)
    {
        // return $request;
        try
        {
            $result = $resultObject->viewSelectedStudent($request->all());
            // return $result;
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function updateStatus(Request $request, Result $resultObject)
    {
        try
        {
            $result = $resultObject->updateResultStatus($request->all());
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function viewForStudent()
    {
        return view('results/viewForStudent');
    }


    public function viewTranscript(){
        $results = Result::with(['registered','level', 'session', 'sem'])->where('student_id', Auth::user()->id)->get();
        // return $results;

        return view('results.trancript', compact(['results']));
    }


// ->where('student_id', Auth::user()->id)
    public function transcript(){
        $results = Result::with(['registered','level', 'session', 'semester'])->where('student_id', Auth::user()->id)->get();
        $responder = config('app.apiResponse');
        $responder['status'] = 0;
        $responder['message'] = "Congratulation";
        $responder['data'] = $results;
        return $responder;


    }


    public function downloadResult(){
        $results = Result::with(['registered','level', 'session', 'sem'])->where('student_id', Auth::user()->id)->get();
        $pdf = PDF::loadView('results.result-download', compact('results'));
        return $pdf->download(Auth::user()->firstname." ". Auth::user()->middlename." ". Auth::user()->lastname .'.pdf');
    }
}


