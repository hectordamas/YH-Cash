<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cash;
use Carbon\Carbon;

class ClosureController extends Controller
{
    public function create($id){
        $cash = Cash::find($id);

        return view('cash.closure', [
            'cash' => $cash
        ]);

    }


    public function store(Request $request){
        $cash = Cash::find($request->id);
        $cash->closure_date = Carbon::now();
        $cash->save();

        return redirect('/consultar-cajas')->with('message',  'La fue cerrada con exito');
    }
}
