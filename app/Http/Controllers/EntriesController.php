<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\Cash;

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
        $request->validate([
            'monto' => 'required|min:0.01',
            'descripcion' => 'required',
        ]);

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
        $request->validate([
            'monto' => 'required|min:0.01',
            'descripcion' => 'required',
        ]);

        $entry = new Entry();
        $entry->monto = $request->input('monto');
        $entry->descripcion = $request->input('descripcion');
        $entry->cash_id = $request->input('caja');
        $entry->contable_id = $request->input('contable');
        $entry->save();

        return redirect()->back()->with('message', 'Entrada Registrada con Éxito!');
    }

    public function destroy($id)
    {
       $entry = Entry::findOrFail($id);
       $entry->delete();

       return redirect()->back()->with('message', 'Entrada Eliminada con Éxito!');
    }
}
