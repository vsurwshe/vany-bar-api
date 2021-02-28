<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TPItems extends Model{
    protected $primaryKey = 'tp_items_id';
    protected $fillable = [
        'tp_item_varity_name', 
        'tp_item_strength_of_vv', 
        'tp_item_strength_of_the_bottel',
        'tp_item_mrp',
        'tp_item_varity_name',
        'tp_item_number_cases', 
        'tp_item_number_bottels',
        'tp_item_total_bottels',
        'tp_item_batch_number', 
        'tp_item_month_of_mfg',
        'tp_item_prev_bottels_qty',
        'tp_item_bottel_id'
    ];

    public function user(){
       return $this->belongsTo('App\Models\TPIndex');
    }
}
