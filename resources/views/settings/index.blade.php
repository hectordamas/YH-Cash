@extends('layouts.app')

@section('content')
<div class="container-fluid py-2">
    <h3 class="mb-4">Configuración del Sistema</h3>

    <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">

            {{-- Crear Usuario --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 rounded-lg h-100 d-flex flex-column justify-content-center align-items-center p-4 hover-shadow">
                    <i class="fas fa-user-plus fa-3x mb-3 text-success"></i>
                    <h5 class="mb-3 font-weight-bold">Crear Usuario</h5>
                    <a href="{{ route('users.create') }}" class="btn btn-success btn-block font-weight-bold">Ir</a>
                </div>
            </div>

            {{-- Listar Usuarios --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 rounded-lg h-100 d-flex flex-column justify-content-center align-items-center p-4 hover-shadow">
                    <i class="fas fa-users fa-3x mb-3 text-primary"></i>
                    <h5 class="mb-3 font-weight-bold">Lista de Usuarios</h5>
                    <a href="{{ route('users.index') }}" class="btn btn-primary btn-block font-weight-bold">Ir</a>
                </div>
            </div>

            {{-- Video del Login --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 rounded-lg p-4 h-100">
                    <h5 class="font-weight-bold mb-4">Video del Login</h5>
                    <input type="file" name="login_video" class="form-control-file mb-2" accept="video/mp4">
                    <small class="text-muted d-block mb-3">Formato: MP4. Máx: 20MB</small>
                    @if(isset($settings['login_video']))
                        <p class="text-muted small mb-0">Actual:</p>
                        <video controls style="max-width: 100%; max-height: 150px;" class="mt-2 rounded">
                            <source src="{{ asset($settings['login_video']) }}" type="video/mp4" />
                            Tu navegador no soporta video.
                        </video>
                    @endif
                </div>
            </div>

            {{-- Color del Sidebar --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 rounded-lg p-4 h-100 d-flex flex-column">
                    <h5 class="font-weight-bold mb-4">Color del Sidebar</h5>
                    <input type="color" name="sidebar_color" value="{{ $settings['sidebar_color'] ?? '#343a40' }}" class="form-control form-control-color" style="max-width: 150px;">
                </div>
            </div>

            {{-- Logo Claro --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 rounded-lg p-4 h-100" style="background-color: #222; color: #eee;">
                    <h5 class="font-weight-bold mb-3">Logo Claro</h5>
                    <input type="file" name="logo_light" class="form-control-file mb-3" accept="image/png, image/jpeg">
                    <small class="text-muted d-block mb-3">Para fondo oscuro. Tamaño recomendado: 300x100px</small>
                    @if(isset($settings['logo_light']))
                        <div class="d-inline-block p-2 rounded">
                            <img src="{{ asset($settings['logo_light']) }}" alt="Logo claro actual" style="max-height: 60px;">
                        </div>
                    @endif
                </div>
            </div>

            {{-- Logo Oscuro --}}
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 rounded-lg p-4 h-100">
                    <h5 class="font-weight-bold mb-3">Logo Oscuro</h5>
                    <input type="file" name="logo_dark" class="form-control-file mb-3" accept="image/png, image/jpeg">
                    <small class="text-muted d-block mb-3">Para fondo claro. Tamaño recomendado: 300x100px</small>
                    @if(isset($settings['logo_dark']))
                        <div class="d-inline-block p-2 rounded">
                            <img src="{{ asset($settings['logo_dark']) }}" alt="Logo oscuro actual" style="max-height: 60px;">
                        </div>
                    @endif
                </div>
            </div>

        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-dark btn-lg px-5">Guardar Configuración</button>
        </div>
    </form>
</div>

<style>
.hover-shadow:hover {
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    transition: box-shadow 0.3s ease-in-out;
}
</style>
@endsection
