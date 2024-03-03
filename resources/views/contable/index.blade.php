@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header text-primary font-weight-bold">
                    Listado de cuentas de ingresos y egresos
                </div>
                <div class="card-body">
                    <table class="table table-striped datatable" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contables as $i)
                                <tr>
                                    <td>{{$i->id}}</td>
                                    <td>{{$i->codigo}}</td>
                                    <td>{{$i->name}}</td>
                                    <td>
                                        <a href="{{ route('contables.edit', ['contable' => $i->id]) }}" class="btn btn-success btn btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection