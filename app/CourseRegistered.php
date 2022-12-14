<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseRegistered extends Model
{
    //

    protected $table = 'courses_registered';

    protected $fillable = ['student_id', 'semester','level_id', 'year', 'courses', 'staff_id'];

    public function createNew($data)
    {
        $existingData = $this->where('student_id', '=', $data['student_id'])
        ->where('semester', '=' , $data['semester'])
        ->where('level_id', '=' , $data['level_id'])
        ->where('year', '=' , $data['year'])->first();


        // return $existingData;
        if ($existingData === null){
            $data['courses'] = json_encode($data['courses']);
            return $this->create($data);
        }
        return false;
    }

    public function deleteRegistration($data)
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

    public function viewSelected($data)
    {

        $results = $this->where('semester', $data['semester'])
                        ->where('year', $data['year'])
                        ->get();

        return $results;
    }

    public function viewSelectedForStudent($data)
    {

        $results = $this->where('semester', $data['semester'])
            ->where('year', $data['year'])
            ->where('student_id', $data['student_id'])
            ->get();

        return $results;
    }

    public function updateRegistration($data)
    {
        $data['staff_id'] = auth()->id();
        return $this->where('student_id', $data['student_id'])
            ->where('semester', $data['semester'])
            ->where('year', $data['year'])
            ->where('level_id', $data['level_id'])
            ->update(['courses' => $data['courses'],]);

    }

    public function viewAll()
    {
        $result = $this->all();
        return $result;
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

}
