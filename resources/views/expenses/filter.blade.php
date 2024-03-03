@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header font-weight-bold text-primary">Consultar Pagos</div>
                <div class="card-body">
                    <form action="{{ route('expenses.index') }}" class="row">
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
                                    <option value="{{ $c->id }}">{{ $c->rif }} - {{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Proveedor:</label>
                            <select name="proveedor" id="proveedor" class="form-control select2">
                                <option value="">Todos</option>
                                @foreach($providers as $p)
                                    <option value="{{ $p->id }}">{{ $p->type }}{{ $p->number }} - {{ $p->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Forma de Pago:</label>
                            <select name="forma-de-pago" id="forma-de-pago" class="form-control">
                                <option value="">Todos</option>
                                <option value="Efectivo">Efectivo</option>
                                <option value="Transferencia">Transferencia</option>
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Caja:</label>
                            <select name="caja" id="cash" class="form-control select2">
                                <option value="">Todos</option>
                                @foreach($cashes as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }} - {{$c->currency}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Banco:</label>
                            <select name="banco" id="bank" class="form-control select2">
                                <option value="">Todos</option>
                                @foreach($banks as $b)
                                    <option value="{{ $b->id }}">{{ $b->name }} - {{$b->currency}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Cuenta de Egreso:</label>
                            <select name="contable" id="contable" class="form-control select2">
                                <option value="">Todos</option>
                                @foreach($contables as $c)
                                    <option value="{{ $c->id }}">{{$c->codigo}} - {{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        
                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Tipo de Pago:</label>
                            <select name="reversar" id="reversar" class="form-control">
                                <option value="">Todos</option>
                                <option value="Reversados">Reversados</option>
                                <option value="No Reversados">No Reversados</option>
                            </select>
                        </div>


                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Nº de Recibo:</label>
                            <input type="text" name="recibo" id="recibo" class="form-control">
                        </div>

                        <div class="col-md-12">
                            <input type="submit" value="Consultar Pagos" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection