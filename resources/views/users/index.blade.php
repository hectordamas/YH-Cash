@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Listado de Usuarios
                </div>
                <div class="card-body">
                    <table class="table table-striped datatable" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>E Mail</th>
                                <th>Acciones</th>
                                <th>Bloqueado</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('users.edit', [ 'user' => $user->id ]) }}" class="btn btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <input 
                                            type="checkbox" 
                                            class="checkbox-config" 
                                            data-id="{{ $user->id }}" 
                                            data-field="blocked"
                                            {{ $user->inactivo ? 'checked' : '' }}
                                        >  
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.checkbox-config').on('change', function(){
            let id = $(this).data('id'); // ID del usuario
            let fieldName = $(this).data('field'); // Nombre del campo
            let check = $(this).is(':checked') ? 1 : 0; // Determinar el nuevo valor
            console.log(id, check)
            $.ajax({
                method: 'POST',
                url: '{{ url("setUserConfig") }}', // Ruta para actualizar la configuración
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    field: fieldName, 
                    value: check
                },
                success: function(res){
                    console.log("Configuración actualizada:", res);
                },
                error: function(err){
                    console.error("Error al actualizar:", err);
                }
            });
        });
    })
</script>
@endsection