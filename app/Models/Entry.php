<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function contable(){
        return $this->belongsTo(\App\Models\Contable::class);
    }

    public function cash(){
        return $this->belongsTo(\App\Models\Cash::class);
    }
}
