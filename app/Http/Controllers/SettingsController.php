<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Auth;

class SettingsController extends Controller
{

    public function index()
    {
                if(Auth::user()->role != 'Gerente'){
            return redirect()->back()->with('error', 'No tienes permisos para acceder a esta ruta');        
        }
        return view('settings.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
                if(Auth::user()->role != 'Gerente'){
            return redirect()->back()->with('error', 'No tienes permisos para acceder a esta ruta');        
        }
        // Validación
        $request->validate([
            'login_video' => 'nullable|mimes:mp4|max:20480', // 20MB
            'logo_light' => 'nullable|image|mimes:png,jpg,jpeg|max:2048', // 2MB
            'logo_dark' => 'nullable|image|mimes:png,jpg,jpeg|max:2048', // 2MB
            'sidebar_color' => 'nullable|string|regex:/^#[0-9a-fA-F]{6}$/',
        ]);

        // Guardar color sidebar
        if ($request->filled('sidebar_color')) {
            Setting::setValue('sidebar_color', $request->sidebar_color);
        }

        if ($request->hasFile('login_video')) {
            $request->file('login_video')->move(public_path('uploads'), 'video.mp4');
            Setting::setValue('login_video', 'uploads/video.mp4');
        }
    
        if ($request->hasFile('logo_light')) {
            $request->file('logo_light')->move(public_path('uploads'), 'logo_light.png');
            Setting::setValue('logo_light', 'uploads/logo_light.png');
        }
    
        if ($request->hasFile('logo_dark')) {
            $request->file('logo_dark')->move(public_path('uploads'), 'logo_dark.png');
            Setting::setValue('logo_dark', 'uploads/logo_dark.png');
        }

        return redirect()->back()->with('success', 'Configuración actualizada correctamente.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
