<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Result extends Model
{
    //
    protected $fillable = ['student_id','level_id', 'semester', 'year', 'course_reg_id', 'results', 'status', 'staff_id'];

    public function createNew($data)
    {
        $existingData = $this->where('student_id', '=', $data['student_id'])
            ->where('semester', '=' , $data['semester'])
            ->where('year', '=' , $data['year'])->first();

        if ($existingData === null){
            $data['results'] = json_encode($data['results']);
            $data['staff_id'] = auth()->id();
            return $this->create($data);
        }
        // return $existingData;
        else{
            $this->update($data);
        }


    }

    public function deleteResult($data)
    {
        $data['staff_id'] = auth()->id();
        return $this->delete($data);
    }

    public function view(Array $requests)
    {
        foreach ($requests as $request)
        {
            $results[] = $this->where('id', $request)->get();
        }


        return $results;
    }

    public function updateResult($data)
    {
        $data['staff_id'] = auth()->id();

        if(!isset($data['status']))
        {
            $data['status'] = 1;
        }

        
        return $this->where('student_id', $data['student_id'])
                    ->where('semester', $data['semester'])
                    ->where('year', $data['year'])
                    ->update([
                                'results' => $data['results'],
                                'staff_id' => $data['staff_id'],
                                'status' => 1,//$data['status'],
                            ]);
    }


    
    public function updateResultStatus($data)
    {
        $data['staff_id'] = auth()->id();
        return $this->where('student_id', $data['student_id'])
            ->where('semester', $data['semester'])
            ->where('year', $data['year'])
            ->update([
                'status' => $data['status'],
                'staff_id' => $data['staff_id']
            ]);
    }

    public function viewAll()
    {
        $result = $this->all();
        return $result;
    }

    public function registered(){
       return $this->belongsTo(CourseRegistered::class,'course_reg_id', 'id');
    }

    public function semester(){
        return $this->belongsTo(Semester::class, 'semester', 'id');
    }

    public function myClass($cgpa){
        $class = "";
        if($cgpa >=4.5 && $cgpa <=5){
            $class = "First Class";
        }elseif($cgpa >=3.5 && $cgpa <=4.499){
            $class = "Second Class Upper";
        }elseif($cgpa >=2.5 && $cgpa <= 3.999){
            $class = "Second Class Lower";
        }elseif($cgpa >= 1.5 && $cgpa <= 2.49999){
            $class = "Third Class";
        }else{
            $class = "Pass";
        }
        return $class;
    }
    
    public function grade($score){
        $grade = "F";
        if ($score >=70 && $score <= 100) {
            $grade = "A";
        } elseif ($score >=60 && $score < 70) {
            $grade = "B";
        }elseif ($score >=50 && $score < 60) {
            $grade = "C";
        }elseif ($score >=45 && $score < 50) {
            $grade = "D";
        }elseif ($score >=40 && $score < 45) {
            $grade = "E";
        }else {
            $grade = "F";
        }
        return $grade ;
    }

    

    public function point($grade){

        $points = 0;
        if ($grade=="A") {
            $points =5;
        } elseif($grade=="B") {
            $points=4;
        }elseif($grade=="C") {
            $points=3;
        }elseif($grade=="D") {
            $points=2;
        }elseif($grade=="E") {
            $points=1;
        }else{
            $points=0;
        }
        return $points;
    }

    public function sem(){
        return $this->belongsTo(Semester::class, 'semester', 'id');
    }

public function getCourse($id){
    $course = Course::where('id', $id)->first();
    return $course;
}

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function session(){
        return $this->belongsTo(Session::class, 'year', 'id');
    }

    public function viewSelected($data)
    {
        
        $results = $this->with(['registered','level', 'session', 'semester'])
        // ->with(['register'])->whereHas("registered", function($reg) use ($data){
        //     $reg->where('level_id', $data['level_id'])  ;
        // })
        ->where('semester', $data['semester'])
        ->where('year', $data['year'])
        
        // ->where('student_id', Auth::user()->id)
        ->where('status', 1)
            ->get();

        return $results;
    }


    public function viewSelectedStudent($data)
    {
        
        $results = $this->with(['registered','level', 'session', 'semester'])
        ->with(['register'])->whereHas("registered", function($reg) use ($data){
            $reg->where('level_id', $data['level_id'])  ;
        })
        ->where('semester', $data['semester'])
        ->where('year', $data['year'])
        
        // ->where('student_id', Auth::user()->id)
        //->where('status', 1)
            ->get();

        return $results;
    }
}



