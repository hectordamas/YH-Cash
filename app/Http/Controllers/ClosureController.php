<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cash;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class ClosureController extends Controller
{
    public function verificarCierreCaja($closure_date) {
        // Obtener la fecha actual
        $fechaActual = Carbon::now();
    
        // Crear un CarbonPeriod para el mes anterior al mes actual
        $inicioMesAnterior = $fechaActual->copy()->subMonthNoOverflow()->startOfMonth();
        $finMesAnterior = $inicioMesAnterior->copy()->endOfMonth();
        $periodoMesAnterior = CarbonPeriod::create($inicioMesAnterior, $finMesAnterior);
    
        // Verificar si la fecha de cierre de la caja se encuentra en el periodo del mes anterior al mes actual
        if ($periodoMesAnterior->contains($closure_date)) {
            // Si la fecha de cierre está en el periodo del mes anterior al mes actual, no permitir el cierre de caja
            return false;
        }
    
        // Si la fecha de cierre no está en el periodo del mes anterior al mes actual, permitir el cierre de caja si estamos dentro de los primeros 5 días del mes actual
        return $fechaActual->day <= 5;
    }

    public function create($id){
        $cash = Cash::find($id);
        $puedeCerrarCaja = $this->verificarCierreCaja($cash->closure_date);
        $fechaActual = Carbon::now();

        return view('cash.closure', [
            'cash' => $cash,
            'puedeCerrarCaja' => $puedeCerrarCaja,
            'fechaActual' => $fechaActual
        ]);

    }


    public function store(Request $request){
        $cash = Cash::find($request->id);
        $cash->closure_date = Carbon::now();
        $cash->save();

        return redirect('/consultar-cajas')->with('message',  'La fue cerrada con exito');
    }
}
