<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillIndex extends Model{

    protected $primaryKey = 'bill_id';

    protected $fillable = [
        'name', 
        'invoice_number', 
        'pan_number',
        'vat_number',
        'date',
        'tp_number', 
        'sub_total', 
        'startup_fee',
        'carraying_forwrding',
        'cash_discount',
        'gross_amount', 
        'total_cis', 
        'total_bottels',
        'net_amount',
        'user_id'
    ];

    public function user(){
       return $this->belongsTo('App\Models\User');
    }
    
}
