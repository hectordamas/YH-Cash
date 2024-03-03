@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header font-weight-bold text-primary">
                    Directorio de Proveedores
                </div>
                <div class="card-body">
                    <table class="table table-striped datatable">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>RIF</th>
                                <th>Razón Social</th>
                                <th>Dirección</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($providers as $p)
                                <tr>
                                    <td>{{$p->id}}</td>
                                    <td>{{$p->type}}{{$p->number}}</td>
                                    <td>{{$p->name}}</td>
                                    <td>{{$p->address}}</td>
                                    <td>
                                        <a href="{{ route('providers.edit', ['provider' => $p->id]) }}" class="btn btn-sm btn-primary">
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