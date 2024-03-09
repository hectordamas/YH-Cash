@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form class="card closureCreate" method="post" action="/closure/store">
                @csrf
                <input type="hidden" name="id" value="{{$cash->id}}">
                <div class="card-header font-weight-bold text-primary">
                    Cierre de caja <span class="text-dark">({{ $cash->name }})</span> 
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="" class="text-dark font-weight-bold">Fecha de Cierre</label>
                            <input type="date" value="{{ date('Y-m-d')}}" class="form-control" readonly > 
                        </div>
                    </div>

                    @if($cash->closure_date)
                        @if($puedeCerrarCaja)
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="submit" class="btn btn-dark" value="Crear Cierre">
                            </div>
                        </div>
                        @else
                        <div class="row">
                            <div class="col-md-4">
                                <div class="alert alert-danger">
                                    @if($fechaActual->day > 5)
                                        Actualmente no es posible cerrar la caja. Esto se debe a que el lapso de tiempo permitido para el cierre de la caja ha transcurrido. Nuestro sistema requiere que el cierre se realice dentro de los primeros 5 días del mes actual.                                     
                                    @else
                                        No se puede proceder con el cierre de la caja en este momento. El mes pasado ya ha sido cerrado, por lo que no es posible realizar un nuevo cierre para ese período.
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                    @else
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="submit" class="btn btn-dark" value="Crear Primer Cierre">
                        </div>
                    </div>
                    @endif

                </div>
            </form>
        </div>
    </div>
</div>
@endsection