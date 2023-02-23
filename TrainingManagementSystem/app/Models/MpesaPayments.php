<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class MpesaPayments extends Model implements Auditable
{
    use HasFactory, SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $fillable = [
    'id',
    'courseAmount',
    'transactionID',
    'phoneNumber',
    'userID'
    ];
     protected $dates = ['deleted_at'];

//To display the user's name on the view payments table
    public function users()
    {
        return $this->belongsTo(Users::class, 'userID','id');
    }
}
