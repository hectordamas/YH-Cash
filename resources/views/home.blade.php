@extends('layouts.app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Escritorio</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        @php
                            $entradasDelMes = \App\Models\Entry::whereNotNull('cash_id')->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->sum('monto');
                            $salidasDelMes = \App\Models\Expense::whereNotNull('cash_id')->whereMonth('fecha', date('m'))->whereYear('fecha', date('Y'))->where('trash', NULL)->sum('monto');
                            $saldoDelMes = $entradasDelMes - $salidasDelMes;
                        @endphp
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Saldo del Mes (Cajas)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${{number_format($saldoDelMes, 2, '.', ',')}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        @php
                            $entradas = \App\Models\Entry::whereNotNull('cash_id')->sum('monto');
                            $salidas = \App\Models\Expense::whereNotNull('cash_id')->where('trash', NULL)->sum('monto');
                            $saldo = $entradas - $salidas;
                        @endphp
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Saldo Actual (Cajas)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${{number_format($saldo, 2, '.', ',')}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    @php
                        $entradasDelAño = \App\Models\Entry::whereNotNull('cash_id')->whereYear('created_at', date('Y'))->sum('monto');
                        $salidasDelAño = \App\Models\Expense::whereNotNull('cash_id')->whereYear('fecha', date('Y'))->where('trash', NULL)->sum('monto');
                        $saldoDelAño = $entradasDelAño - $salidasDelAño;
                    @endphp
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Saldo del Año (Cajas)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">${{ number_format($saldoDelAño, 2, '.', ',') }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Proveedores Registradoss
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ App\Models\Provider::all()->count() }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Total Por Proveedor</h6>
                </div>

                @php
                    $providers = App\Models\Provider::all();
                    $pagosPorProveedor = collect([]);
                    $abonos = [];
                    $proveedores = [];

                    foreach ($providers as $p) {
                        $monto = App\Models\Expense::where('provider_id', $p->id)->where('trash', NULL)->sum('monto');
                        $pagosPorProveedor->push(['proveedor' => $p->name, 'monto' => $monto ]);
                    }

                    foreach ($pagosPorProveedor->sortByDesc('monto')->take(10) as $pago) {
                        array_push($abonos, $pago['monto']);
                        array_push($proveedores, $pago['proveedor']);
                    }
                @endphp

                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="pagoPorProveedor"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pie Chart -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-success">Total Por Cuentas de Egreso</h6>
                </div>

            @php
                $contables = App\Models\Contable::where('type', 'Egreso')->get();
                $pagosPorContable = collect([]);
                $cabonos = [];
                $cuentas = [];

                foreach ($contables as $c) {
                    $monto = App\Models\Expense::where('contable_id', $c->id)->where('trash', NULL)->sum('monto');
                    $pagosPorContable->push(['contable' => $c->name, 'monto' => $monto ]);
                }

                foreach ($pagosPorContable->sortByDesc('monto')->take(10) as $pago) {
                    array_push($cabonos, $pago['monto']);
                    array_push($cuentas, $pago['contable']);
                }

            @endphp
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="pagosPorCuenta"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

@section('chart')
<script>
var ctx = document.getElementById("pagoPorProveedor");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: {!! json_encode($proveedores) !!},
    datasets: [{
      label: "Total",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 1)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: {!! json_encode($abonos) !!},
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});



var ctx = document.getElementById("pagosPorCuenta");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: {!! json_encode($cuentas) !!},
    datasets: [{
      label: "Total",
      lineTension: 0.3,
      backgroundColor: "#1cc88a",
      borderColor: "#1cc88a",
      pointRadius: 3,
      pointBackgroundColor: "#1cc88a",
      pointBorderColor: "#1cc88a",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "#1cc88a",
      pointHoverBorderColor: "#1cc88a",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: {!! json_encode($cabonos) !!},
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});



</script>
@endsection
