<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = 'antrian'; 

    protected $primaryKey = 'no';
    
    protected $fillable = [
        'nomor_antrian',
        'tanggal'
    ];
    
    public $timestamps = false;

    protected static function booted() {
        static::saving(function ($antrian) {
            $antrian->tanggal = now();
        });
    }
}
