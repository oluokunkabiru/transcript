<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Level extends Model
{
    public function totalStudent($id){
       return count(Student::where('level_id', $id)->get());
    }
}
