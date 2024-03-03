<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;

class EntriesController extends Controller
{

    public function create()
    {
        return view('entries.create', [
            'cashes' => \App\Models\Cash::all(),
            'contables' => \App\Models\Contable::where('type', 'Ingreso')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $entry = new Entry();
        $entry->monto = $request->input('monto');
        $entry->descripcion = $request->input('descripcion');
        $entry->cash_id = $request->input('caja');
        $entry->contable_id = $request->input('contable');
        $entry->save();

        return redirect()->back()->with('message', 'Entrada Registrada con Éxito!');
    }


    public function edit($id)
    {
        $entry = Entry::find($id);

        return view('entries.edit', [
            'cashes' => \App\Models\Cash::all(),
            'contables' => \App\Models\Contable::where('type', 'Ingreso')->get(),
            'entry' => $entry
        ]);
    }


    public function update(Request $request, $id)
    {
        $entry = new Entry();
        $entry->monto = $request->input('monto');
        $entry->descripcion = $request->input('descripcion');
        $entry->cash_id = $request->input('caja');
        $entry->contable_id = $request->input('contable');
        $entry->save();

        return redirect()->back()->with('message', 'Entrada Registrada con Éxito!');
    }
}
