<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarBottels extends Model{
    protected $primaryKey = 'bar_bottel_id';

    protected $fillable = [
        'bar_bottel_name', 
        'bar_bottel_unit_price', 
        'bar_bottel_per_case_count',
        'bar_bottel_packing',
        'bar_bottel_total_qty',
        'user_id'
    ];

    public function user(){
       return $this->belongsTo('App\Models\User');
    }
}
