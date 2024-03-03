<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historyitem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeRange($query, $from, $to){
        if(!$from) {
            $from = '0000-00-00'; 
        }

        if($from || $to)
            return $query->whereBetween('fecha', [$from, $to]);
    }

    public function scopeEmpresa($query, $empresa){
        if($empresa)
            return $query->where('empresa', $empresa);
    }

    public function scopeProveedor($query, $proveedor){
        if($proveedor)
            return $query->where('proveedor', $proveedor);   
    }

    public function scopeCaja($query, $caja){
        if($caja)
            return $query->where('caja', $caja);   
    }

    public function scopeBanco($query, $banco){
        if($banco)
            return $query->where('banco', $banco);
    }

    public function scopeContable($query, $contable){
        if($contable)
            return $query->where('contable', $contable);
    }

    public function scopeRecibo($query, $recibo){
        if($recibo)
            return $query->where('recibo', $recibo);
    }    
}
