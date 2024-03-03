@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header font-weight-bold text-primary">Consultar Histórico de Operaciones</div>
                <div class="card-body">
                    <form action="{{ route('history.index') }}" class="row">
                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Desde:</label>
                            <input type="date" name="desde" id="desde" class="form-control">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Hasta:</label>
                            <input type="date" name="hasta" id="hasta" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Empresa:</label>
                            <select name="empresa" id="empresa" class="form-control select2">
                                <option value="">Todos</option>
                                @foreach($companies as $c)
                                    <option value="{{ $c->empresa }}">{{ $c->empresa }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Proveedor:</label>
                            <select name="proveedor" id="proveedor" class="form-control select2">
                                <option value="">Todos</option>
                                @foreach($providers as $p)
                                    <option value="{{ $p->proveedor }}">{{ $p->proveedor }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Caja:</label>
                            <select name="caja" id="cash" class="form-control select2">
                                <option value="">Todos</option>
                                @foreach($cashes as $c)
                                    <option value="{{ $c->caja }}">{{$c->caja}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Banco:</label>
                            <select name="banco" id="bank" class="form-control select2">
                                <option value="">Todos</option>
                                @foreach($banks as $b)
                                    <option value="{{ $b->banco }}">{{$b->banco}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Cuenta de Egreso:</label>
                            <select name="contable" id="contable" class="form-control select2">
                                <option value="">Todos</option>
                                @foreach($contables as $c)
                                    <option value="{{ $c->cuenta }}">{{$c->cuenta}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Nº de Recibo:</label>
                            <input type="text" name="recibo" id="recibo" class="form-control">
                        </div>

                        <div class="col-md-12">
                            <input type="submit" value="Consultar Histórico de Operaciones" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection