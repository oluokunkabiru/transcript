<?php

namespace App\Http\Controllers;

use App\CourseRegistered;
use Illuminate\Http\Request;

class CourseRegisteredController extends Controller
{
    //

    public function newRegistration()
    {
        return view('course-registration.new-registration');
    }

    public function editIndex()
    {
        return view('course-registration.edit-registration');
    }

    public function add(Request $request, CourseRegistered $courseRegistered)
    {
        try
        {
            $result = $courseRegistered->createNew($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }


    public function delete(Request $request, CourseRegistered $courseRegistered)
    {
        try
        {
            $result = $courseRegistered->deleteRegistration($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function edit(Request $request, CourseRegistered $courseRegistered)
    {
        try
        {
            $result = $courseRegistered->updateRegistration($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function viewRegistrations(CourseRegistered $courseRegistered)
    {
        try
        {
            $result = $courseRegistered->viewAll();
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function viewRegistration(Request $request, CourseRegistered $courseRegistered)
    {
        try
        {
            $result = $courseRegistered->view($request->all());
            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }

    public function viewSelectedRegistration(Request $request, CourseRegistered $courseRegistered)
    {
        try
        {
            $result = $courseRegistered->viewSelected($request->all());

            return $result;
        }
        catch (\Exception $e)
        {
            return $e;
        }
    }


}