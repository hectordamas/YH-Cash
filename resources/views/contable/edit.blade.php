@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header text-primary font-weight-bold">
                    Moificar Cuenta
                </div>
                <div class="card-body">
                    <form action="{{ route('contables.update', ['contable' => $contable->id]) }}" method="post" class="row">
                        @csrf
                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold text-primary">Código:</label>
                            <input type="text" class="form-control" name="codigo" id="codigo" value="{{$contable->codigo}}">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold text-primary">Nombre:</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$contable->name}}">
                        </div>
                        <div class="col-md-3 fomr-group">
                            <label for="" class="font-weight-bold text-primary">Tipo de Cuenta:</label>
                            <select class="form-control" name="type" id="type">                                
                                <option value="{{$contable->type}}">{{$contable->type}}</option>
                                <option value="Egreso">Egreso</option>
                                <option value="Ingreso">Ingreso</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group"></div>
                        <div class="col-md-12">
                            <input type="submit" value="Crear" class="btn btn-dark">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection