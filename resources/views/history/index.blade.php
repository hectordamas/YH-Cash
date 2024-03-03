@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header text-primary font-weight-bold">
                    Histórico de Operaciones
                </div>
                <div class="card-body reverse">
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $i)
                                <tr>
                                    <td>{{$i->id}}</td>
                                    <td>{{$i->recibo}}</td>
                                    <td>@if($i->fecha) {{ date_format(new DateTime($i->fecha), 'd/m/Y') }} @endif</td>
                                    <td>{{$i->proveedor}}</td>
                                    <td>{{$i->empresa}}</td>
                                    <td>{{$i->contable}}</td>
                                    <td>{{ $i->banco }}</td>
                                    <td>{{ $i->caja }}</td>
                                    <td>${{ number_format($i->monto, 2, '.', ',') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="table-dark">
                            <tr>
                                <td colspan="9" class="text-center">
                                    <h5><strong>Total: </strong> ${{number_format($items->sum('monto'), 2, '.', ',')}}</h5>
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