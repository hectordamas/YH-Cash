<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Cash;
use App\Models\Provider;
use App\Models\Contable;
use App\Models\Bank;
use App\Models\Expense;
use Carbon\Carbon;
use Auth;

class ExpensesController extends Controller
{

    public function index(Request $request)
    {
        $expenses = Expense::range($request->desde, $request->hasta)
        ->empresa($request->empresa)
        ->proveedor($request->proveedor)
        ->formaDePago($request->input('forma-de-pago'))
        ->caja($request->caja)
        ->banco($request->banco)
        ->contable($request->contable)
        ->recibo($request->recibo)
        ->reversados($request->reversar)
        ->get();

        return view('expenses.index', [
            'expenses' => $expenses
        ]);
    }


    public function create()
    {
        if(Auth::user()->role != 'Gerente' || Auth::user()->role != 'Analista'){
            return redirect()->back()->with('error', 'No tienes permisos para acceder a esta ruta');        
        }
        return view('expenses.create', [
            'companies' => Company::all(),
            'cashes' => Cash::all(),
            'banks' => Bank::all(),
            'providers' => Provider::all(),
            'contables' => Contable::where('type', 'Egreso')->get(),
        ]);
    }


    public function store(Request $request)
    {
        if(Auth::user()->role != 'Gerente' || Auth::user()->role != 'Analista'){
            return redirect()->back()->with('error', 'No tienes permisos para acceder a esta ruta');        
        }
        $validated = $request->validate([
            'fecha' => 'required',
            'monto' => 'required|min:0.01',
            'forma-de-pago' => 'required',
            'numero' => 'required',
            'concepto' => 'required',
            'descripcion' => 'required',
            'empresa' => 'required',
            'proveedor' => 'required',
            'contable' => 'required',
        ]);

        if($request->input('forma-de-pago') == 'Efectivo'){
            $validated = $request->validate([
                'caja' => 'required',
            ]);
        }else{
            $validated = $request->validate([
                'banco' => 'required',
            ]);
        }

        $cash = Cash::find($request->input('caja'));

        if($cash){
            if($cash->closure_date){
                //$fechaDeHoy = Carbon::now();
                $fechaSolicitud = Carbon::parse($request->fecha);
                $fechaDeCierre = Carbon::parse($cash->closure_date);

                if($fechaDeCierre->gt($fechaSolicitud)){
                    return redirect()->back()->with('error', 'La fecha que intentas ingresar es anterior o igual al ultimo cierre hecho para la caja: ' . $cash->name);
                }
            }
        }

        $expense = new Expense();
        $expense->fecha = $request->input('fecha');
        $expense->monto = $request->input('monto');
        $expense->forma_de_pago = $request->input('forma-de-pago');
        $expense->numero = $request->input('numero');
        $expense->concepto = $request->input('concepto');
        $expense->descripcion = $request->input('descripcion');
        $expense->company_id = $request->input('empresa');
        $expense->bank_id = $request->input('banco');
        $expense->cash_id = $request->input('caja');
        $expense->provider_id = $request->input('proveedor');
        $expense->contable_id = $request->input('contable');
        $expense->save();

        if(isset($cash)){
            if($cash->id == 3){
                $numeroInicial = (4920 + Expense::where('cash_id', $cash->id)->count() - 1);
                $expense->recibo =  '0' . $cash->id . '-' . $numeroInicial;
            }else{
                if($cash->id < 10){
                    $numeroDeCaja = '0' . $cash->id;
                }else{
                    $numeroDeCaja = $cash->id;
                }
                
                if($expense->id < 10){
                    $numeroDeRecibo = '0' . Expense::where('cash_id', $cash->id)->count();
                }else{
                    $numeroDeRecibo = Expense::where('cash_id', $cash->id)->count();
                }
                $expense->recibo =  $numeroDeCaja  . '-' . $numeroDeRecibo;
            }
            
        }

        $expense->save();


        return redirect('/expenses/' . $expense->id)->with('message', 'Pago Registrado con Éxito!');
    }

    public function show($id)
    {
        $expense = Expense::find($id);

        return view('expenses.show', [
            'expense' => $expense,
        ]);
    }


    public function edit($id)
    {
        if(Auth::user()->role != 'Gerente'){
            return redirect()->back()->with('error', 'No tienes permisos para acceder a esta ruta');        
        }
        $expense = Expense::find($id);

        return view('expenses.edit', [
            'expense' => $expense,
            'companies' => Company::all(),
            'cashes' => Cash::all(),
            'banks' => Bank::all(),
            'providers' => Provider::all(),
            'contables' => Contable::where('type', 'Egreso')->get(),
        ]);
    }


    public function update(Request $request, $id)
    {
        if(Auth::user()->role != 'Gerente'){
            return redirect()->back()->with('error', 'No tienes permisos para acceder a esta ruta');        
        }
        $validated = $request->validate([
            'fecha' => 'required',
            'monto' => 'required|min:0.01',
            'forma-de-pago' => 'required',
            'numero' => 'required',
            'concepto' => 'required',
            'descripcion' => 'required',
            'empresa' => 'required',
            'proveedor' => 'required',
            'contable' => 'required',
        ]);

        if($request->input('forma-de-pago') == 'Efectivo'){
            $validated = $request->validate([
                'caja' => 'required',
            ]);
        }else{
            $validated = $request->validate([
                'banco' => 'required',
            ]);
        }
        
        $expense = Expense::find($id);
        $expense->fecha = $request->input('fecha');
        $expense->monto = $request->input('monto');
        $expense->forma_de_pago = $request->input('forma-de-pago');
        $expense->numero = $request->input('numero');
        $expense->concepto = $request->input('concepto');
        $expense->descripcion = $request->input('descripcion');
        $expense->company_id = $request->input('empresa');
        $expense->bank_id = $request->input('banco');
        $expense->cash_id = $request->input('caja');
        $expense->provider_id = $request->input('proveedor');
        $expense->contable_id = $request->input('contable');
        $expense->save();

        return redirect()->back()->with('message', 'Pago Modificado con Éxito!');
    }


    public function destroy($id)
    {
        if(Auth::user()->role != 'Gerente'){
            return redirect()->back()->with('error', 'No tienes permisos para acceder a esta ruta');        
        }
       $expense = Expense::findOrFail($id);
       $expense->delete();

       return redirect()->back()->with('message', 'Pago Eliminado con Éxito!');
    }
}
