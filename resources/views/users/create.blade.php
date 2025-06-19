@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header font-weight-bold">
                    Crear Nuevo Usuario
                </div>
                <div class="card-body">
                    <form class="row" action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="col-md-3 form-group">
                            <label for="name" class="font-weight-bold">Nombre</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="email" class="font-weight-bold">E-Mail</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>                        
                        <div class="col-md-3 form-group">
                            <label for="password" class="font-weight-bold">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="role" class="font-weight-bold">Rol</label>
                            <select name="role" class="form-control" required>
                                <option value="" disabled selected>Seleccione un rol</option>
                                <option value="Analista" {{ old('role') == 'Analista' ? 'selected' : '' }}>Analista</option>
                                <option value="Gerente" {{ old('role') == 'Gerente' ? 'selected' : '' }}>Gerente</option>
                                <option value="Director" {{ old('role') == 'Director' ? 'selected' : '' }}>Director</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-dark">Crear Usuario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
