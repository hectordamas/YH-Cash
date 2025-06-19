@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="height:100vh;">

        <div class="col-xl-10 col-lg-10 col-md-10">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-flex align-items-center" style="height:500px;">
                            <div class="p-5 w-100">
                                <div class="text-center mb-5">
                                    <img src="{{ asset($settings['logo_dark'] ?? 'assets/logo_dark.png') }}" width="190px" alt="{{ env('APP_NAME') }} Logo">
                                </div>
                                <form class="user" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                        id="exampleInputEmail" aria-describedby="emailHelp"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Correo Electrónico">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                        id="exampleInputPassword" placeholder="Contraseña"
                                        name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="remember">Recordar mis datos</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-user btn-block">
                                        Inicia Sesión
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-flex justify-content-center bg-login-image">
                            <video autoplay muted loop style="position: absolute; left: 0; bottom: 0; min-width: 100%; min-height: 100%;">
                                <source src="{{ asset($settings['login_video'] ?? 'assets/video.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
