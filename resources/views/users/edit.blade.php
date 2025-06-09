@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Editar Usuario #{{ $user->id }}
                </div>
                <div class="card-body">
                    <form class="row" action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                        @csrf
                            @method('PUT')

                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Nombre</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">E-Mail</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                        </div>                        
                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Password</label>
                            <input type="password" class="form-control" name="password" >
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="" class="font-weight-bold">Rol</label>
                            <select name="role" class="form-control">
                                <option value="Analista" {{ $user->role == 'Analista' ? 'selected' : '' }}>Analista</option>
                                <option value="Gerente" {{ $user->role == 'Gerente' ? 'selected' : '' }}>Gerente</option>
                                <option value="Director" {{ $user->role == 'Director' ? 'selected' : '' }}>Director</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-dark">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection