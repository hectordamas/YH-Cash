<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cash;
use App\Models\Entry;
use App\Models\Expense;

class CashController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('cash.create');
    }


    public function store(Request $request)
    {
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
