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
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <input type="submit" class="btn btn-dark" value="Crear Cierre">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection