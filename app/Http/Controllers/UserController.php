<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        
        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:Analista,Gerente,Director',
        ]);

        // Crear nuevo usuario
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validación de los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:Analista,Gerente,Director',
        ]);
    
        // Actualización de campos
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
    
        // Solo actualizar contraseña si se escribió una nueva
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
    
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }


    public function destroy($id)
    {
        //
    }
}
