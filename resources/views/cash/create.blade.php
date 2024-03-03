@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header text-primary font-weight-bold">
                    Crear Caja
                </div>
                <div class="card-body">
                    <form action="{{ route('cashes.store') }}" method="post" class="row">
                        @csrf
                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold text-primary">Nombre:</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold text-primary">Moneda:</label>
                            <select class="form-control" name="currency" id="currency">
                                <option value="€">€</option>
                                <option value="$">$</option>
                            </select>
                        </div>
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