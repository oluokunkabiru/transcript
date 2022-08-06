<?php

namespace App\Http\Controllers;

use App\Course;
use App\Department;
use App\Student;
use App\User;
use App\UserSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user,  Course $course, Department $department, UserSetting $userSetting)
    {
        // return "hello";
        
        if(auth()->user()->user_type != 1 && auth()->user()->user_type != 2){
            return view('auth.login');
        }
                    
        $courses = $course->viewAll();
        $users = $user->viewAll();
        $departments = $department->viewAll();

        $admin = array();
        $student = array();
        $professor = array();
        $data = array();
        $adminCount = 0;
        $studentCount = 0;
        $professorCount = 0;
        $courseCount = $course->count();

        foreach ($users as $user){
            if ($user->user_type == 1 || $user->user_type == 2){
                foreach ($departments as $department){
                    if($department->id  == $user->department_id){
                        $user->department = $department->name;
                    }
                }
                $admin[] = $user;
                $adminCount++;
            }
            elseif ($user->user_type == 3){
                foreach ($departments as $department){
                    if($department->id  == $user->department_id){
                        $user->department = $department->name;
                    }
                }
                $student[] = $user;
                $studentCount++;
            }
            elseif ($user->user_type == 4){
                foreach ($departments as $department){
                    if($department->id  == $user->department_id){
                        $user->department = $department->name;
                    }
                }
                $professor[] = $user;
                $professorCount++;
            }
        }

        $data = [
            'courses' => $courses,
            'student' => $student,
            'admin' => $admin,
                                                                'professor' => $professor,
            'adminCount' => $adminCount,
            'studentCount' => $studentCount,
            'professorCount' => $professorCount,
            'courseCount' => $courseCount,
        ];
// return $data;

        return view('home')->with('data',$data);
    }

    public function collectAuthUser()
    {
        return apiSuccess(auth()->id());
    }

    public function studentHome()
    {
        return view('studentHome', ['id' => auth()->user()->matric_no,]);
    }

    public function auth()
    {
        return apiSuccess(auth()->user());
    }

     // "dev": "npm run development",
        // "development": "cross-env NODE_ENV=development node_modules/webpack/bin/webpack.js --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js",
        // "watch": "cross-env NODE_ENV=development node_modules/webpack/bin/webpack.js --watch --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js",
        // "watch-poll": "npm run watch -- --watch-poll",
        // "hot": "cross-env NODE_ENV=development node_modules/webpack-dev-server/bin/webpack-dev-server.js --inline --hot --config=node_modules/laravel-mix/setup/webpack.config.js",
        // "prod": "npm run production",
        // "production": "cross-env NODE_ENV=production node_modules/webpack/bin/webpack.js --no-progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js"
 
}
