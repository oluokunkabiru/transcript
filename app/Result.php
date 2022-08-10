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
            $data['status'] = 0;
        }

        
        return $this->where('student_id', $data['student_id'])
                    ->where('semester', $data['semester'])
                    ->where('year', $data['year'])
                    ->update([
                                'results' => $data['results'],
                                'staff_id' => $data['staff_id'],
                                'status' => $data['status'],
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
        ->where('status', 1)
            ->get();

        return $results;
    }
}



