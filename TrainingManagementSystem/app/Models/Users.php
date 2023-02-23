<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Users extends Model implements Auditable
{
    use HasFactory, SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [
        'id',
        'firstName',
        'lastName',
        'telephoneNumber',
        'email',
        'userProfile',
        'roleID',
        'password',
        'userType',
        'paymentStatus',

    ];

    protected $dates = ['deleted_at'];

    //To display the role name on the view users table
    public function roles()
    {
        return $this->belongsTo(Roles::class, 'roleID','id');
    }

}
