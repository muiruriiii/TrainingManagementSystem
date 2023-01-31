<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'firstName',
        'lastName',
        'telephoneNumber',
        'email',
        'roleID',
        'courseID',
        'password',
        'userType',
        'paymentStatus',
        'isDeleted'
    ];

}
