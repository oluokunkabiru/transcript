<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'tel_no',
        'email', 'matric_no', 'department_id', 'staff_id'
    ];

    public function createNew($data)
    {
/*        $data['password'] = isset($data['password']) ? bcrypt($data['password']) : bcrypt('secret');*/
        $data['staff_id'] = auth()->id();
        return $this->create($data);
    }

    public function deleteUser($data)
    {
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

    public function viewAll()
    {
        return $this->all();
    }
    public function updateStudent($data)
    {
        $data['staff_id'] = auth()->id();
        return $this->where('id', $data['id'])
            ->update([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'middlename' => $data['middlename'],
                'tel_no' => $data['tel_no'],
                'email' => $data['email'],
                'department_id' => $data['department_id'],
                'matric_no' => $data['matric_no'],
                'staff_id' => $data['staff_id']
            ]);
    }



    public function setDepartment($id){
        $department = Department::find($id);
        $code = $department->short_code;
        $this->dept = $code;
    }

    public function getLastId(){
        $student = Student::latest()->first();
        if ($student){


        return
        str_pad(($student->id?$student->id:0)+1, 4, '0', STR_PAD_LEFT) ;
        }else{
          return  str_pad(0+1, 4, '0', STR_PAD_LEFT) ;

        }
    }

    public function getDepartment(){
        return $this->dept;
    }

    public function setDepartmentIdAttribute($value)
    {
        $this->setDepartment($value);
        $this->attributes['department_id'] = $value  ;
    }

    public function courses()
{
    return $this->belongsToMany(Course::class);
}


    public function setMatricNoAttribute($value)
    {
        $this->attributes['matric_no'] = $this->getDepartment()."/".date("Y") ."/". $this->getLastId() ;
    }

}
