<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model{

    protected $primaryKey = 'bill_item_id';

    protected $fillable = [
        'bill_item_mrp', 
        'bill_item_particulars', 
        'bill_item_packing',
        'bill_item_cis',
        'bill_item_bottels',
        'bill_item_rate', 
        'bill_item_amount'
    ];

    public function user(){
       return $this->belongsTo('App\Models\User');
    }
}
