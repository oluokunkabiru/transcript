<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'short_code', 'HOD'];
    //
    public function createNew($data)
    {
        isset($data['staff_id']) ? $data['staff_id'] : $data['staff_id'] = auth()->id();
        return $this->create($data);
    }

    public function deleteDepartment($data)
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

    public function updateDepartment($data)
    {
        $data['staff_id'] = auth()->id();
        return $this->where('id', $data['id'])
            ->update([
                'name' => $data['name'],
                'short_code' => $data['short_code'],
                'HOD' => $data['HOD']
                ]);
    }

}
