<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Akun extends Model
{
    protected $table= ('users');
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_num',
        'birthdate',
        'gender',
        'identify_number',
        'foto',
        'role'
    ];
}

