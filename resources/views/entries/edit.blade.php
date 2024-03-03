@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header font-weight-bold text-primary">Modificar Entrada</div>
                <div class="card-body">
                    <form action="{{ route('entries.update', ['entry' => $entry]) }}" method="post" class="row">
                        
                        @csrf

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Monto:</label>
                            <input type="number" name="monto" id="monto" class="form-control" step="any" value="{{$entry->monto}}">
                            <span id="montoFormateado"></span>
                        </div>


                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Descripción:</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{$entry->descripcion}}">
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Cuenta de Ingreso:</label>
                            <select name="contable" id="contable" class="form-control select2">
                                <option value="{{$entry->contable->id}}">{{$entry->contable->codigo}} - {{$entry->contable->name}}</option>
                                @foreach($contables as $c)
                                    <option value="{{ $c->id }}">{{$c->codigo}} - {{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Caja:</label>
                            <select name="caja" id="cash" class="form-control select2">
                                <option value="{{ isset($entry->cash) ? $entry->cash->id : '' }}">{{ isset($entry->cash) ? $entry->cash->name .' - ' . $entry->cash->currency : 'Seleccionar un Elemento' }}</option>
                                @foreach($cashes as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }} - {{$c->currency}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <input type="submit" value="Modificar Entrada" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection