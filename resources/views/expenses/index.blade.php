@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header text-primary font-weight-bold">
                    Resultados de tu consulta
                </div>
                <form action="{{ url('ex/actions') }}" method="post" class="card-body reverse">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            @isset($r)  <input type="hidden" name="reverse" value="{{$r}}"> @endisset
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fas fa-history"></i> Reversar Seleccionados
                            </button>
                        </div>
                    </div>
                    <table class="table table-striped datatable" style="width:100%">
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
                                <th><input type="checkbox" id="checkAll"></th>
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
                                    <td>
                                        <input type="checkbox" class="checkOne" name="check[]" value="{{$e->id}}"> 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-dark">
                            <tr>
                                <td colspan="10" class="text-center">
                                    <h5><strong>Total: </strong> ${{number_format($expenses->where('trash', NULL)->sum('monto'), 2, '.', ',')}}</h5>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection