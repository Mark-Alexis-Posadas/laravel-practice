<?php

namespace App\Imports;

use App\Models\PersonalInformation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PersonalInformationImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new PersonalInformation([
            'first_name'  => $row['first_name'],
            'middle_name' => $row['middle_name'] ?? null,
            'last_name'   => $row['last_name'],
            'birthday'    => $row['birthday'],
            'gender'      => $row['gender'],
            'email'       => $row['email'],
            'phone'       => $row['phone'],
            'address'     => $row['address'],
        ]);
    }
}
