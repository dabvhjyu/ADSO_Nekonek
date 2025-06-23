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
    
    .register-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px 0;
    }
    
    .register-card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        background-color: white;
        max-width: 900px;
        margin: 0 auto;
    }
    
    .register-row {
        display: flex;
        flex-direction: row;
    }
    
    .register-image {
        background-image:  url('/images/bienvenido.png'); /* Ruta corregida */
        background-size: cover;
        background-position: center;
        min-height: 400px;
    }
    
    .register-header {
        background-color: var(--primary-purple);
        color: white;
        font-weight: bold;
        padding: 15px;
        text-align: center;
    }
    
    .register-body {
        padding: 30px;
    }
    
    .form-group {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .form-label {
        text-align: right;
        padding-right: 15px;
        width: 40%;
        font-weight: 500;
    }
    
    .form-input {
        width: 60%;
    }
    
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    
    .form-control:focus {
        border-color: var(--light-purple);
        box-shadow: 0 0 0 0.25rem rgba(124, 67, 189, 0.25);
    }
    
    .btn-container {
        margin-left: 40%;
        margin-bottom: 20px;
    }
    
    .btn-primary {
        background-color: var(--primary-purple);
        border-color: var(--primary-purple);
        padding: 8px 25px;
        font-weight: 600;
        border: none;
        border-radius: 5px;
        color: white;
        cursor: pointer;
    }
    
    .btn-primary:hover {
        background-color: var(--secondary-purple);
    }
    
    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875em;
        margin-top: 5px;
        display: block;
    }
    
    @media (max-width: 768px) {
        .register-row {
            flex-direction: column;
        }
        
        .register-image {
            min-height: 200px;
        }
        
        .form-group {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .form-label {
            width: 100%;
            text-align: left;
            margin-bottom: 5px;
        }
        
        .form-input {
            width: 100%;
        }
        
        .btn-container {
            margin-left: 0;
        }
    }
</style>

<div class="register-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="register-card">
                    <div class="register-row">
                        <div class="col-md-6 register-image"></div>
                        <div class="col-md-6">
                            <div class="register-header">{{ __('Registrarse') }}</div>

                            <div class="register-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name" class="form-label">{{ __('Nombre') }}</label>
                                        <div class="form-input">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="form-label">{{ __('Correo') }}</label>
                                        <div class="form-input">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                                        <div class="form-input">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm" class="form-label">{{ __('Confirmar Contraseña') }}</label>
                                        <div class="form-input">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="btn-container">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Registrarse') }}
                                        </button>
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