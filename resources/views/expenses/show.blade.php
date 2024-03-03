@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header text-primary font-weight-bold no-print">
                    Comprobante de Pago Nº {{$expense->recibo}}
                </div>
                <div class="card-body py-5">
                    <div class="row">
                        <div class="col-md-12 mb-5 justify-content-center text-center no-print">
                            <a href="javascript:void(0);" onclick="window.print();" class="btn btn-primary">
                                <i class="fas fa-print"></i> Imprimir Comprobante
                            </a>
                        </div>

                        <div class="col-md-12 px-4">
                            <div class="row justify-content-center">
                                <div class="col-md-12 border border-danger p-5 rounded" style="border-style: dashed !important;">
                                    <div class="row">
                                        <div class="col-md-12 mb-5 text-center font-weight-bold">
                                            <h3><strong>{{$expense->company->name}} <br> {{$expense->company->rif}}</strong></h3>
                                        </div>
                                        <div class="col-md-12 d-flex font-weight-bold mb-3" style="justify-content:space-between;">
                                            <div class="font-weight-bold">
                                                <strong>Nº de Comprobante:</strong> {{$expense->recibo}}
                                            </div>
                                            <div class="text-right font-weight-bold">
                                                <strong>Fecha:</strong> {{ date_format(new DateTime($expense->fecha), 'd/m/Y') }}
                                            </div>
                                        </div>
                                        <div class="col-md-12 d-flex font-weight-bold mb-3" style="justify-content:space-between;">
                                            <div class="font-weight-bold">
                                                <strong>Recibimos de:</strong> {{$expense->company->name}} <br> {{$expense->company->rif}}
                                            </div>
                                            <div class="text-right font-weight-bold">
                                                <strong>Pago a:</strong> {{$expense->provider->name}} <br> {{$expense->provider->type}}{{$expense->provider->number}}
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-justify font-weight-bold mb-3">
                                            <strong>Por concepto de: <br></strong> {{$expense->concepto}}
                                        </div>
                                        <div class="col-md-12 text-justify font-weight-bold mb-3">
                                            <strong>Asociado al N° de Documento:</strong> #{{$expense->numero}}
                                        </div>
                                        <div class="col-md-12 text-justify font-weight-bold mb-3">
                                           <h5><strong>Por el monto de:</strong> ${{number_format($expense->monto, 2, '.', ',')}}</h5>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="row justify-content-center">
                                                
    
                                                <div class="col-md-4 mt-5 text-center mb-3">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div style="border-bottom:1px solid black; width:80%; margin:auto;"></div>
                                                        </div>
                                                        <div class="col-md-12 text-center">
                                                            <strong>El Cobrador</strong>: <br/> {{$expense->provider->name}} <br/> {{$expense->provider->type}}{{$expense->provider->number}}
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                                <div class="col-md-4 mt-5 text-center mb-3">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div style="border-bottom:1px solid black; width:80%; margin:auto;"></div>
                                                        </div>
                                                        <div class="col-md-12 text-center">
                                                            <strong>Cédula de Identidad</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="col-md-4 mt-5 text-center mb-3">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div style="border-bottom:1px solid black; width:80%; margin:auto;"></div>
                                                        </div>
                                                        <div class="col-md-12 text-center">
                                                            <strong>Nombre:</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                            </div>                                            
                                        </div>
                                        

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection