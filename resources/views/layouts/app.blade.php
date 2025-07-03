<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ env('APP_NAME') }}</title>
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css?v=1">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @php $sidebarColor = $settings['sidebar_color'] ?? '#343a40'; @endphp
        <ul class="navbar-nav sidebar sidebar-dark accordion no-print" id="accordionSidebar" style="background-color: {{ $sidebarColor }}">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center my-5" href="{{ url('home') }}">
                <img src="{{ asset($settings['logo_light'] ?? 'assets/logo_light.png') }}" style="max-width: 180px; width:100%;" alt="Logo">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Panel Principal</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="far fa-credit-card"></i>
                    <span>Pagos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pagos:</h6>
                        <a class="collapse-item" href="{{ url('consultar-pagos') }}">Consultar Pagos</a>
                        @if(in_array(Auth::user()->role, ['Analista', 'Gerente']))
                        <a class="collapse-item" href="{{ route('expenses.create') }}">Registrar Pago</a>
                        @endif
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-cash-register"></i>
                    <span>Cajas</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Cajas:</h6>
                        <a class="collapse-item" href="{{ url('consultar-cajas') }}">Consultar Cajas</a>
                        @if(in_array(Auth::user()->role, ['Gerente']))
                        <a class="collapse-item" href="{{ route('entries.create') }}">Registrar Entrada</a>
                        @endif

                        @if(Auth::user()->role == 'Gerente')
                        <a class="collapse-item" href="{{ route('cashes.create') }}">Crear Caja</a>
                        @endif
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="far fa-address-card"></i>
                    <span>Proveedores</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Proveedores:</h6>
                        @if(Auth::user()->role == 'Gerente')
                            <a class="collapse-item" href="{{ route('providers.create') }}">Registrar Proveedor</a>
                        @endif
                        <a class="collapse-item" href="{{ route('providers.index') }}">Directorio</a>
                    </div>
                </div>
            </li>

           <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAccount"
                    aria-expanded="true" aria-controls="collapseAccount">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>Cuentas</span>
                </a>
                <div id="collapseAccount" class="collapse" aria-labelledby="headingAccount" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Cuentas:</h6>
                        <a class="collapse-item" href="{{ route('contables.create') }}">Registrar Cuenta</a>
                        <a class="collapse-item" href="{{ route('contables.index') }}">Listado de Cuentas</a>
                    </div>
                </div>
            </li>




            @if(Auth::user()->role == 'Gerente')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                    aria-expanded="true" aria-controls="collapseUsers">
                    <i class="fas fa-users"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Usuarios:</h6>
                        <a class="collapse-item" href="{{ route('users.create') }}">Registrar Usuario</a>
                        <a class="collapse-item" href="{{ route('users.index') }}">Todos los Usuarios</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('settings') }}" >
                    <i class="fas fa-cog"></i>
                    <span>Configuración</span>
                </a>
            </li>
            @endif



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow no-print">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="/assets/img/avatar.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <form class="d-none" action="{{ route('logout') }}" method="post" id="logout">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#changePassword">
                                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cambiar Contraseña
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" onclick="document.getElementById('logout').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                
                @yield('content')

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <form action="{{ url('changePassword/' . Auth::user()->id) }}" method="POST" class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="echangePasswordLabel" aria-hidden="true">
        @csrf
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12 form-group">
                    <label for="password">Ingresa tu nueva contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
    </form>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/assets/js/demo/chart-area-demo.js"></script>
    <script src="/assets/js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.29/dist/sweetalert2.all.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="/assets/js/script.js"></script>

    @if(session()->has('error'))
        <script>
            Swal.fire({icon:'error', title:'Ha ocurrido un error!', text: "{{session('error')}}", confirmButtonText: "OK", confirmButtonColor: '#dc3545'})
        </script>
    @endif

    @if(session()->has('message'))
    <script>
        Swal.fire({icon:'success', title:'', text: "{{session('message')}}", confirmButtonText: 'OK', confirmButtonColor: '#28a745'})
    </script>
    @endif

    @if ($errors->any())
<script>
    let errorMessages = `
        @foreach ($errors->all() as $error)
            • {{ $error }}<br>
        @endforeach
    `;

    Swal.fire({
        icon: 'error',
        title: '¡Corrige los siguientes errores!',
        html: errorMessages,
        confirmButtonText: 'OK',
        confirmButtonColor: '#dc3545'
    });
</script>
@endif

    @yield('chart')

    @yield('scripts')
</body>

</html>