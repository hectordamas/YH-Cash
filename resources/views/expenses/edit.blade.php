@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header font-weight-bold text-primary">
                    Editar Pago: {{$expense->recibo}}
                </div>
                <div class="card-body">
                    <form action="{{ route('expenses.update', ['expense' => $expense->id]) }}" method="post" class="row">
                        @csrf
                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Fecha:</label>
                            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $expense->fecha }}">
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Empresa:</label>
                            <select name="empresa" id="empresa" class="form-control select2">
                                <option value="{{$expense->company_id}}">{{$expense->company->rif}} - {{$expense->company->name}}</option>
                                @foreach($companies->filter(function($item) use ($expense) { return $item->id != $expense->company_id; }) as $c)
                                    <option value="{{ $c->id }}">{{ $c->rif }} - {{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Proveedor:</label>
                            <select name="proveedor" id="proveedor" class="form-control select2">
                                <option value="{{$expense->provider_id}}">{{$expense->provider->type}}{{$expense->provider->number}} - {{$expense->provider->name}}</option>
                                @foreach($providers->filter(function($item) use ($expense) { return $item->id != $expense->provider_id; }) as $p)
                                    <option value="{{ $p->id }}">{{ $p->type }}{{ $p->number }} - {{ $p->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Número de Documento:</label>
                            <input type="text" name="numero" id="numero" class="form-control" value="{{$expense->numero}}">
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Monto:</label>
                            <input type="number" name="monto" id="monto" class="form-control" step="any" value="{{$expense->monto}}">
                            <span id="montoFormateado"></span>
                        </div>


                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Forma de Pago:</label>
                            <select name="forma-de-pago" id="forma-de-pago" class="form-control">
                                <option value="{{$expense->forma_de_pago}}">{{$expense->forma_de_pago}}</option>
                                <option value="Efectivo">Efectivo</option>
                                <option value="Transferencia">Transferencia</option>
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Caja:</label>
                            <select name="caja" id="cash" class="form-control select2">
                                <option value="{{ isset($expense->cash) ? $expense->cash->id : '' }}">{{ isset($expense->cash) ? $expense->cash->name .' - ' . $expense->cash->currency : 'Seleccionar un Elemento' }}</option>
                                @foreach($cashes as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }} - {{$c->currency}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Banco:</label>
                            <select name="banco" id="bank" class="form-control select2">
                                <option value="{{ isset($expense->bank) ? $expense->bank->id : '' }}">{{ isset($expense->bank) ? $expense->bank->name .' - ' . $expense->bank->currency :'Seleccionar un Elemento' }}</option>
                                @foreach($banks as $b)
                                    <option value="{{ $b->id }}">{{ $b->name }} - {{$b->currency}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Concepto:</label>
                            <input type="text" name="concepto" id="concepto" class="form-control" value="{{$expense->concepto}}">
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Descripción:</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{$expense->descripcion}}">
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Cuenta de Egreso:</label>
                            <select name="contable" id="contable" class="form-control select2">
                                <option value="{{$expense->contable->id}}">{{$expense->contable->codigo}} - {{$expense->contable->name}}</option>
                                @foreach($contables as $c)
                                    <option value="{{ $c->id }}">{{$c->codigo}} - {{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <input type="submit" value="Modificar Pago" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection