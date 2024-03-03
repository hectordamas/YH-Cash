<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
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
            return $query->where('company_id', $empresa);
    }

    public function scopeProveedor($query, $proveedor){
        if($proveedor)
            return $query->where('provider_id', $proveedor);   
    }

    public function scopeFormaDePago($query, $formaDePago){
        if($formaDePago)
            return $query->where('forma_de_pago', $formaDePago);
    }

    public function scopeCaja($query, $caja){
        if($caja)
            return $query->where('cash_id', $caja);   
    }

    public function scopeBanco($query, $banco){
        if($banco)
            return $query->where('bank_id', $banco);
    }

    public function scopeContable($query, $contable){
        if($contable)
            return $query->where('contable_id', $contable);
    }

    public function scopeRecibo($query, $recibo){
        if($recibo)
            return $query->where('recibo', $recibo);
    }

    public function scopeReversados($query, $reversar){
        if($reversar == 'Reversados'){
            return $query->whereNotNull('trash');    
        } else if($reversar == 'No Reversados'){
            return $query->whereNull('trash');
        }  else{
            return $query;
        }
    }
    
    public function bank(){
        return $this->belongsTo(\App\Models\Bank::class);
    }

    public function cash(){
        return $this->belongsTo(\App\Models\Cash::class);
    }

    public function company(){
        return $this->belongsTo(\App\Models\Company::class);
    }

    public function contable(){
        return $this->belongsTo(\App\Models\Contable::class);
    }


    public function provider(){
        return $this->belongsTo(\App\Models\Provider::class);
    }
    
}
