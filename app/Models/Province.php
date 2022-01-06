<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'province';

    protected $fillable = [
        'kode',
        'nama',
    ];

    public function guests(){
        return $this->hasMany('App\Models\Guest', 'id');
    }
}
