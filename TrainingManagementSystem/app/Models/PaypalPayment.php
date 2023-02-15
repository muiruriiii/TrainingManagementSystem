<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaypalPayment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id','payment_id','payer_id','payer_email','userID','amount','currency','payment_status'];
    protected $dates = ['deleted_at'];
    //To display the user's name on the view payments table
    public function users()
    {
        return $this->belongsTo(Users::class, 'userID','id');
    }
}
