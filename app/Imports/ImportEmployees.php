<?php

namespace App\Imports;

use App\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportEmployees implements ToModel,WithValidation, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'firstName'     => $row['firstname'],
            'lastName'     => $row['lastname'],
            'company_id'=> $row['company_id'],
            'email'     => $row['email'],
            'phone'    => $row['phone'], 
        ]);
    }
    public function rules(): array
    {
    return [
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email',
        'company_id' => '',
        'phone'=>''
    ];
    }
}
