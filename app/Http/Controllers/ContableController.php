<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contable;

class ContableController extends Controller
{

    public function index()
    {
        $contables = Contable::all();
        return view('contable.index', [
            'contables' => $contables
        ]);
    }


    public function create()
    {
        return view('contable.create');
    }


    public function store(Request $request)
    {
        $contable = new Contable();
        $contable->type = $request->type;
        $contable->name= $request->name;
        $contable->codigo = $request->codigo;
        $contable->save();

        return redirect()->back()->with('message', 'Cuenta creada con éxito!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $contable = Contable::find($id);

        return view('contable.edit', [
            'contable' => $contable
        ]);
    }


    public function update(Request $request, $id)
    {
        $contable = Contable::find($id);
        $contable->type = $request->type;
        $contable->name= $request->name;
        $contable->codigo = $request->codigo;
        $contable->save();

        return redirect()->back()->with('message', 'Cuenta creada con éxito!');
    }


    public function destroy($id)
    {
        //
    }
}
