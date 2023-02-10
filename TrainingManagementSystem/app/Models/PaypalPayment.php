<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaypalPayment extends Model
{
    use HasFactory;
    protected $fillable = ['id','payment_id','payer_id','payer_email','userID','amount','currency','payment_status'];
    //To display the user's name on the view payments table
    public function users()
    {
        return $this->belongsTo(Users::class, 'userID','id');
    }
}
