<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historyitem;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Historyitem::range($request->desde, $request->hasta)
        ->empresa($request->empresa)
        ->proveedor($request->proveedor)
        ->caja($request->caja)
        ->banco($request->banco)
        ->contable($request->contable)
        ->recibo($request->recibo)
        ->get();

        return view('history.index', [
            'items' => $items
        ]);
    }

}
