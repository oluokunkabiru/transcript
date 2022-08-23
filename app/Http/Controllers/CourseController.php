<?php

namespace App\Http\Controllers;

use App\Course;
use App\Level;
use App\Semester;
use App\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //

    public function index()
    {
        return view('courses.index');
    }

    public function add(User $user)
    {
        $professors = $user->viewUserType(['4']);
        $levels = Level::get();
        $semesters = Semester::orderBy('name')->get();
        return view ('courses.add')->with(['professors'=> $professors[0], 'levels'=>$levels, 'semesters'=>$semesters]);
    }

    public function postAdd(Request $request, Course $course, User $user)
    {
        $request->validate([
            'level_id'=>'required',
            'semester_id' =>'required',
            'course_code' => 'required|unique:courses,course_code',
            'unit' => 'required|integer',
            'name' => 'required|string',
            'professor_id' => 'required'
        ]);
        // try
        // {
            // if($request->hasFile('photo')){
                // try{
                //     $image = $request->file('photo');
                //     $imageName = OptimiseImage($image, $request['course_code']);
                //     // $request['image'] = $imageName;
                // }
                // catch (\Exception $e){
                //     echo '<script>alert("Upload a valid image");</script>';
                // }
            // }
            // else
            // {
            //     // $professors = $user->viewUserType(['4']);
            //     // $levels = Level::get();
            //     return redirect()->back();
            //     // return view ('courses.add')->with(['professors'=> $professors[0],'levels'=>$levels]);
            // }

            //  if($request['password']!= $request['c_password']){
            //     $request['password'] = '';
            // }

            $result = $course->createNew($request->all());

            if ($result){
                return redirect()->route('course.index');
            }
        // }
        // catch (\Exception $e)
        // {
        //     echo '<script>alert("Try again later and fill all fields");</script>';
        // }
    }

    public function viewCourses()
    {
        $course = Course::with(['level', 'semester'])->get();
        try
        {
            $result = $course;//->viewAll();
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    
    public function viewCourse(Request $request, Course $course)
    {
        try
        {
            $result = $course->view($request->all());
            return apiSuccess($result);
        }
        catch (\Exception $e)
        {
            return apiFailure($e);
        }
    }

    public function edit()
    {
        return view('courses.edit');
    }
    public function postEdit(Request $request, Course $course)
    {
        try
        {
            $result = $course->updateCourses($request->all());
            if($result)
            {
                return apiSuccess($result);
            }
            else
            {
                return apiFailure(false);
            }
        }
        catch(\Exception $e)
        {
            return apiFailure($e);
        }
    }
}
