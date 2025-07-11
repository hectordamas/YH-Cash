@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header text-primary font-weight-bold">
                    Resultados de tu consulta
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped datatable">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Recibo</th>
                                <th>Fecha</th>
                                <th>Proveedor</th>
                                <th>Empresa</th>
                                <th>Cuenta</th>
                                <th>Banco</th>
                                <th>Caja</th>
                                <th>Monto</th>
                                <th>Usuario</th>
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
                                    <td>{{ date_format(new DateTime($e->fecha), 'd/m/Y') }}</td>
                                    <td>{{$e->provider->name}}</td>
                                    <td>{{$e->company->name}}</td>
                                    <td>{{isset($e->contable) ? $e->contable->name : 'N/A'}}</td>
                                    <td>{{isset($e->bank) ? $e->bank->name : 'N/A'}}</td>
                                    <td>{{isset($e->cash) ? $e->cash->name : 'N/A'}}</td>
                                    <td>${{ number_format($e->monto, 2, '.', ',') }}</td>
                                    <td>{{ $e->user_name }}</td>
                                    @if(Auth::user()->role == 'Gerente')
                                    <td>
                                        <a href="{{ route('expenses.edit', $e->id) }}" class="btn btn-sm btn-primary" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    
                                        <form action="{{ route('expenses.destroy', $e->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este gasto?')">
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
                                <td colspan="{{ Auth::user()->role == 'Gerente' ? '11' : '10' }}" class="text-center">
                                    <h5><strong>Total: </strong> ${{number_format($expenses->where('trash', NULL)->sum('monto'), 2, '.', ',')}}</h5>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection