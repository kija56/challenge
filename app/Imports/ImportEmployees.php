<?php

namespace App\Imports;

use App\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportEmployees implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'firstName'     => $row[0],
            'lastName'     => $row[1],
            'company_id'=> $row[2],
            'email'     => $row[3],
            'phone'    => $row[4], 
        ]);
    }
}
