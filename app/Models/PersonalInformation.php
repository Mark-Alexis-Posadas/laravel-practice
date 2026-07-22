<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonalInformation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'personal_information';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'birthday',
        'gender',
        'email',
        'phone',
        'address',
    ];
}
