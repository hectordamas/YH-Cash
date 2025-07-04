<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cash;
use App\Models\Entry;
use App\Models\Expense;
use Auth;

class CashController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        if(Auth::user()->role != 'Gerente'){
            return redirect()->back()->with('error', 'No tienes permisos para acceder a esta ruta');        
        }

        return view('cash.create');
    }


    public function store(Request $request)
    {
        if(Auth::user()->role != 'Gerente'){
            return redirect()->back()->with('error', 'No tienes permisos para acceder a esta ruta');        
        }
        $validated = $request->validate([
            'name' => 'required',
            'currency' => 'required',
        ]);

        $cash = new Cash();
        $cash->name = $request->name;
        $cash->currency = $request->currency;
        $cash->save();
        
        return redirect()->back()->with('message', 'Caja creada con éxito!');
    }


    public function show($id)
    {
        $cash = Cash::find($id);
        $entries = Entry::where('cash_id', $cash->id)->get();
        $expenses = Expense::where('cash_id', $cash->id)->get();

        return view('cash.show', [
            'cash' => $cash,
            'entries' => $entries,
            'expenses' => $expenses
        ]);
    }


}
