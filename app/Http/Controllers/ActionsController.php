<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\User;
use Auth;

class ActionsController extends Controller
{
    public function reverse(Request $request){
        if($request->reverse){
            if(isset($request->check)){
                for($i = 0; $i < count($request->check); $i++){
                    $expense = Expense::find($request->check[$i]);
                    $expense->trash = NULL;
                    $expense->save();
                }
            }
        }else{

            if(isset($request->check)){
                for($i = 0; $i < count($request->check); $i++){
                    $expense = Expense::find($request->check[$i]);
                    $expense->trash = 'Y';
                    $expense->save();
                }
            }
        }

        return redirect()->back()->with('message', 'Pagos revertidos con éxito!');
    }

    public function revertidos(){
        $expenses = Expense::whereNotNull('trash')->get();
        $r = true;
        return view('expenses.index', [
            'expenses' => $expenses,
            'r' => $r
        ]);
    }

    public function changePassword(Request $request, $id){
        $request->validate([
            'password' => 'required',
        ]);
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->back()->with('message', 'Contraseña actualizada con éxito!');
    }

    public function setUserConfig(Request $request) {

        $user = User::find($request->id);
        $user->inactivo = $request->value;
        $user->save();

        return response()->json(['success' => 'Configuración actualizada']);
    }

}
