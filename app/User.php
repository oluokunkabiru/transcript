<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'gender', 'DOB', 'tel_no', 'email', 'address', 'password',
        'image', 'matric_no', 'department_id', 'user_type', 'staff_id', 'is_active'
    ];
    public $dept;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function createNew($data)
    {
        $this->setDepartment($data['department_id']);
        $data['matric_no'] =  $this->getDepartment()."/".date("Y") ."/". $this->getLastId();
        // return $data['matric_no'];
        $existingData = $this->where('matric_no', '=', $data['matric_no'])->first();
        // return "hello here";
        if($existingData === null){
            isset($data['staff_id']) ? $data['staff_id'] : $data['staff_id'] = auth()->id();
            $data['password'] = isset($data['password']) ? bcrypt($data['password']) : bcrypt('secret');
                // return "hi";
            if(!isset($data['image'])){
                $data['image'] = $data['matric_no'].'.jpg';
            }
            // return $data;
            return $this->create($data);
        }else{
            return $existingData;
        }
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

    public function viewUserType(Array $requests)
    {
        foreach ($requests as $request)
        {
            $results[] = $this->where('user_type', $request)->get();
        }

        return $results;
    }

    public function viewAll()
    {
        return $this->all();
    }
    public function setDepartment($id){
        $department = Department::find($id);
        $code = $department->short_code;
        $this->dept = $code;
    }

    public function getLastId(){
        $student = User::latest()->first();
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
    public function setMatricNoAttribute($value)
    {
        $this->attributes['matric_no'] = $this->getDepartment()."/".date("Y") ."/". $this->getLastId() ;
    }


    public function updateUser($data)
    {
        $data['staff_id'] = auth()->id();
        return $this->where('id', $data['id'])
            ->update(
                [
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'middlename' => $data['middlename'],
                'tel_no' => $data['tel_no'],
                'email' => $data['email'],
                'address' => $data['address'],
                'matric_no' => $data['matric_no'],
                'image' => $data['image'],
                'department_id' => $data['department_id'],
                'user_type' => $data['user_type'],
                'staff_id' => $data['staff_id']
                ]
            );
    }

    public function updateUserPassword($data)
    {
        $data['staff_id'] = auth()->id();
        /*$existingData = $this->where('password', '=', bcrypt($data['old_password']))
                            ->where('id', '=', auth()->id())->first();*/

        return $this->where('id', auth()->id())
                    ->update(
                        [
                            'password' => bcrypt($data['new_password']),
                            'staff_id' => $data['staff_id']
                        ]
                    );


    }
}
