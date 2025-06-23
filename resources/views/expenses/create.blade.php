@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header font-weight-bold text-primary">Registrar Pago</div>
                <div class="card-body">
                    <input type="hidden" name="totalCash" id="totalCash" value="0">
                    <form action="{{ route('expenses.store') }}" method="post" class="row expensesCreate">
                        @csrf
                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Fecha:</label>
                            <input type="date" name="fecha" id="fecha" class="form-control" required value="{{ date('Y-m-d') }}">
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Empresa:</label>
                            <select name="empresa" id="empresa" class="form-control select2" required>
                                <option value="">Selecciona un Elemento</option>
                                @foreach($companies as $c)
                                    <option value="{{ $c->id }}">{{ $c->rif }} - {{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Proveedor:</label>
                            <select name="proveedor" id="proveedor" class="form-control select2" required>
                                <option value="">Selecciona un Elemento</option>
                                @foreach($providers as $p)
                                    <option value="{{ $p->id }}">{{ $p->type }}{{ $p->number }} - {{ $p->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Número de Documento:</label>
                            <input type="text" name="numero" id="numero" class="form-control" required>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Monto:</label>
                            <input type="number" name="monto" id="monto" class="form-control" step="any" required>
                            <span id="montoFormateado"></span>
                        </div>


                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Forma de Pago:</label>
                            <select name="forma-de-pago" id="forma-de-pago" class="form-control" required>
                                <option value="Efectivo">Efectivo</option>
                                <option value="Transferencia">Transferencia</option>
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Caja:</label>
                            <select name="caja" id="cash" class="form-control select2" required>
                                <option value="">Selecciona un Elemento</option>
                                @foreach($cashes as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }} - {{$c->currency}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Banco:</label>
                            <select name="banco" id="bank" class="form-control select2" required>
                                <option value="">Selecciona un Elemento</option>
                                @foreach($banks as $b)
                                    <option value="{{ $b->id }}">{{ $b->name }} - {{$b->currency}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Concepto:</label>
                            <input type="text" name="concepto" id="concepto" class="form-control" required>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Descripción:</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" required>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Cuenta de Egreso:</label>
                            <select name="contable" id="contable" class="form-control select2" required>
                                <option value="">Selecciona un Elemento</option>
                                @foreach($contables as $c)
                                    <option value="{{ $c->id }}">{{$c->codigo}} - {{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <input type="submit" value="Registrar Pago" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection