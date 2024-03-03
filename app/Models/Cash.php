<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function entries(){
        return $this->hasMany(\App\Models\Entry::class);
    }

    public function expenses(){
        return $this->hasMany(\App\Models\Expense::class)->whereNull('trash');
    }
}
