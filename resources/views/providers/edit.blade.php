@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header font-weight-bold text-primary">
                    Modificar Proveedor
                </div>
                <div class="card-body">
                    <form action="{{ route('providers.update', ['provider' => $provider]) }}" class="row" method="post">
                        @csrf
                        @method('PUT')
                        <div class="col-md-4 form-group">
                            <label for="" class="font-weight-bold text-dark">RIF:</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="type" id="type" class="form-control">
                                        <option value="{{$provider->type}}">{{$provider->type}}</option>
                                        <option value="J">J</option>
                                        <option value="V">V</option>
                                        <option value="G">G</option>
                                        <option value="E">E</option>
                                    </select>   
                                </div>
                                <div class="col-md-9 form-group">
                                    <input type="text" name="rif" class="form-control" id="rif" value="{{$provider->number}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold text-dark">Razón Social:</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$provider->name}}"/>
                        </div>
                        <div class="col-md-5 form-group">
                            <label for="" class="font-weight-bold text-dark">Dirección:</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{$provider->address}}">
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Modificar Proveedor">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection