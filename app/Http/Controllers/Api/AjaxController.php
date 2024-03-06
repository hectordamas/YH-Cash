<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cash;
use App\Models\Bank;

class AjaxController extends Controller
{
    public function getBanksOrCashes(){

        $output = '';
        $cashes = Cash::all();
        $banks = Bank::all();

        if($request->formaDePago == 'Efectivo'){
            foreach($cashes as $c){
                $output = $output . '<option value="'. $c->id .'">"'. $c->name .'"</option>';
            }
        }else{
            foreach($banks as $b){
                $output = $output . '<option value="'. $b->id .'">"'. $b->name .'"</option>';
            }
        }

        return response()->json([
            'output' => $output
        ]);

    }

    public function getCashData(Request $request){
        $cash = Cash::find($request->id);

        return response()->json([
            'total' => $cash->entries->sum('monto') - $cash->expenses->sum('monto') 
        ]);
    }
}
