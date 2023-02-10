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
        'password',
        'userType',
        'paymentStatus',
        'isDeleted'
    ];
    //To display the role name on the view users table
    public function roles()
    {
        return $this->belongsTo(Roles::class, 'roleID','id');
    }

}
