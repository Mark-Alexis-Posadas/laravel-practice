<?php

namespace App\Exports;

use App\Models\PersonalInformation;
use Maatwebsite\Excel\Concerns\FromCollection;

class PersonalInformationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PersonalInformation::all();
    }
}
