<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TPIndex extends Model{
    protected $primaryKey = 'tp_index_id';

    protected $fillable = [
        'tp_number', 
        'date', 
        'name',
        'address',
        'permit_number',
        'total_cases', 
        'total_bottels',
        'route_by',
        'purpose', 
        'name_sales',
        'address_sales',
        'driver_name', 
        'vahical_number',
        'license_number',
        'driver_number'
    ];

    public function user(){
       return $this->belongsTo('App\Models\User');
    }
}
