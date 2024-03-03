<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Cash;
use App\Models\Provider;
use App\Models\Contable;
use App\Models\Bank;
use App\Models\Expense;

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
        $cash = Cash::find($request->input('caja'));
        if($cash){
            $total = $cash->entries->sum('monto') - ($cash->expenses->sum('monto') + $request->input('monto'));
            if($total <= 0){
                return redirect()->back()->with('error', 'Esta Caja no dispone de efectivo suficiente para completar la operación!');
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
        //
    }
}
