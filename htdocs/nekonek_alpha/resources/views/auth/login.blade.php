@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary-purple: #4a148c;
        --secondary-purple: #7c43bd;
        --light-purple: #e1bee7;
        --dark-purple: #2a0845;
        --accent-color: #f3e5f5;
    }
    
    .login-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .login-card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        background-color: white;
    }
    
    .login-row {
        display: flex;
        flex-direction: row;
    }
    
    .login-image {
    background-image: url('/images/inicio_1.png'); /* Ruta corregida */
    background-size: cover;
    background-position: center;
    min-height: 350px;
}

    
    .login-header {
        background-color: var(--primary-purple);
        color: white;
        font-weight: bold;
        padding: 15px;
        text-align: center;
    }
    
    .login-body {
        padding: 30px;
    }
    
    
    .btn-primary:hover {
        background-color: var(--secondary-purple);
        border-color: var(--secondary-purple);
    }
    
    .btn-link {
        color: var(--secondary-purple);
    }
    
    .form-control:focus {
        border-color: var(--light-purple);
        box-shadow: 0 0 0 0.25rem rgba(124, 67, 189, 0.25);
    }
    
    .form-check-input:checked {
        background-color: var(--primary-purple);
        border-color: var(--primary-purple);
    }
    
    @media (max-width: 768px) {
        .login-row {
            flex-direction: column;
        }
        
        .login-image {
            min-height: 200px;
        }
    }
</style>

<div class="login-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card login-card">
                    <div class="login-row">
                        <div class="col-md-6 login-image"></div>
                        <div class="col-md-6">
                            <div class="login-header">{{ __('Inicio de sesion') }}</div>

                            <div class="login-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo electronico') }}</label>

                                        <div class="col-md-8">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                        <div class="col-md-8">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-8 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Recordarme') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Ingresar') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('¿olvidaste tu contraseña?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
