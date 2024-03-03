@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header text-primary font-weight-bold">
                    Disponibilidad de Cajas
                </div>
                <div class="card-body">

                    <div class="row">

                        @foreach($cashes as $cash)
                            @php
                                $totalEntries = $cash->entries->sum('monto');
                                $totalExpenses = $cash->expenses->sum('monto');
                                $total = $totalEntries - $totalExpenses;
                            @endphp
                            <a href="{{ route('cashes.show', ['cash' => $cash->id]) }}" class="col-md-3">
                                <div class="card bg-dark text-light mb-3 px-2 border-dark">
                                    <div class="card-body">
                                        <div class="row align-items-center" style="justify-content:space-between;">
                                            <span class="font-weight-bold text-uppercase text-small" style="font-size:13px;"><i class="far fa-money-bill-alt mr-1"></i> {{$cash->name}}:</span>
                                            <span>{{$cash->currency}} {{ number_format($total, 2, '.', ',') }}</span>   
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection