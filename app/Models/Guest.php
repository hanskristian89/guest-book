<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $table = 'guest';

    protected $fillable = [
        'first_name',
        'last_name',
        'organization',
        'address',
        'id_province',
        'id_city',
    ];

    public function provinces(){
        return $this->belongsTo('App\Models\Province', 'id_province');
    }

    public function cities(){
        return $this->belongsTo('App\Models\City', 'id_city');
    }
}
