@extends('layouts.app')
@section('content')
@php
    $totalEntries = $cash->entries->sum('monto');
    $totalExpenses = $cash->expenses->sum('monto');
    $total = $totalEntries - $totalExpenses;
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card shadow">
                <div class="card-header font-weight-bold text-primary">Detalles de {{$cash->name}}: <span class="text-dark">{{$cash->currency}} {{number_format($total, 2, '.', ',')}}</span></div>
                <div class="card-body">

                    @if(Auth::user()->role == 'Gerente')
                    <div class="col-md-12 mb-3 text-right">
                        <a href="/closure/create/{{$cash->id}}" class="btn btn-primary">
                            <i class="fas fa-cash-register"></i> Cierre de Caja
                        </a>
                    </div>
                    @endif

                    <div class="col-md-12">
                        
                    </div>
            
                    
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active font-weight-bold" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Entradas</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link font-weight-bold" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Pagos</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-12 py-3 table-responsive" style="overflow-y: scroll;">
                                <table class="table table-striped table-bordered datatable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Fecha</th>
                                            <th>Descripción</th>
                                            <th>Monto</th>
                                            <th>Cuenta de Ingreso</th>
                                            @if(Auth::user()->role == 'Gerente')
                                            <th>Acciones</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($entries as $e)
                                            <tr>
                                                <td>{{$e->id}}</td>
                                                <td>{{date_format($e->created_at, 'd/m/Y')}}</td>
                                                <td>{{$e->descripcion}}</td>
                                                <td style="white-space: nowrap;">{{$cash->currency}} {{ number_format($e->monto, 2, '.', ',') }}</td>
                                                <td>{{$e->contable->codigo}} - {{$e->contable->name}}</td>
                                                @if(Auth::user()->role == 'Gerente')
                                                <td>
                                                    <a href="{{ route('entries.edit', $e->id) }}" class="btn btn-sm btn-primary" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                
                                                    <form action="{{ route('entries.destroy', $e->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar esta entrada?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="table-dark">
                                        <tr>
                                            <td colspan="{{ Auth::user()->role == 'Gerente' ? '6' : '5' }}" class="text-center">
                                                <strong>Total: </strong> ${{number_format($entries->sum('monto'), 2, '.', ',')}}
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-12 py-3 table-responsive" style="overflow-y: scroll;">
                                <table class="table table-striped table-bordered datatable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Nº de Recibo</th>
                                            <th>Fecha</th>
                                            <th>Descripción</th>
                                            <th>Monto</th>
                                            <th>Cuenta de Egreso</th>
                                            @if(Auth::user()->role == 'Gerente')
                                            <th>Acciones</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($expenses as $e)
                                            <tr @if($e->trash) class="text-danger" @endif>
                                                <td>{{$e->id}}</td>
                                                <td><a href="{{ route('expenses.show', [ 'expense' => $e->id ]) }}" class="font-weight-bold">{{$e->recibo}}</a></td>
                                                <td>{{date_format(new DateTime($e->fecha), 'd/m/Y')}}</td>
                                                <td>{{$e->descripcion}}</td>
                                                <td style="white-space: nowrap;">{{$cash->currency}} {{ number_format($e->monto, 2, '.', ',') }}</td>
                                                <td>{{isset($e->contable) ? $e->contable->name . ' - ' . $e->contable->name : 'N/A'}}</td>
                                                @if(Auth::user()->role == 'Gerente')
                                                <td>
                                                    <a href="{{ route('expenses.edit', $e->id) }}" class="btn btn-sm btn-primary" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                
                                                    <form action="{{ route('expenses.destroy', $e->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar esta entrada?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="table-dark">
                                        <tr>
                                            <td colspan="{{ Auth::user()->role == 'Gerente' ? '7' : '6' }}" class="text-center">
                                                <strong>Total: </strong> ${{number_format($expenses->where('trash', NULL)->sum('monto'), 2, '.', ',')}}
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
