<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;

class ProvidersController extends Controller
{

    public function index()
    {
        $providers = Provider::all();

        return view('providers.index', [
            'providers' => $providers
        ]);
    }


    public function create()
    {
                if(Auth::user()->role != 'Gerente'){
            return redirect()->back()->with('error', 'No tienes permisos para acceder a esta ruta');        
        }
        return view('providers.create');
    }


    public function store(Request $request)
    {
                if(Auth::user()->role != 'Gerente'){
            return redirect()->back()->with('error', 'No tienes permisos para acceder a esta ruta');        
        }
        $validated = $request->validate([
            'type' => 'required',
            'number' => 'required',
            'name' => 'required',
            'address' => 'required',
        ]);

        $provider = Provider::where('number', $request->rif)->where('type', $request->type)->first();

        if($provider){
            return redirect()->back()->with('error', 'Este proveedor ya se encuentra registrado');
        }else{
            $provider = new Provider();
            $provider->type = $request->type;
            $provider->number = $request->rif;
            $provider->name = $request->name;        
            $provider->address = $request->address;
            $provider->save();
    
            return redirect()->back()->with('message', 'Nuevo proveedor registrado!');
        }

    }

    public function edit($id)
    {
                if(Auth::user()->role != 'Gerente'){
            return redirect()->back()->with('error', 'No tienes permisos para acceder a esta ruta');        
        }
        $provider = Provider::find($id);

        return view('providers.edit', [
            'provider' => $provider
        ]);

    }


    public function update(Request $request, $id)
    {
                if(Auth::user()->role != 'Gerente'){
            return redirect()->back()->with('error', 'No tienes permisos para acceder a esta ruta');        
        }
        $validated = $request->validate([
            'type' => 'required',
            'number' => 'required',
            'name' => 'required',
            'address' => 'required',
        ]);

        $provider = Provider::find($id);
        $provider->type = $request->type;
        $provider->number = $request->rif;
        $provider->name = $request->name;        
        $provider->address = $request->address;
        $provider->save();

        return redirect()->back()->with('message', 'Proveedor modificado con éxito!');
    }


}
