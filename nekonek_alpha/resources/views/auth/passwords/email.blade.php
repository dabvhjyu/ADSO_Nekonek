@extends('layouts.app')

@section('content')
<style>
    .password-reset-container {
        background-color: #f8f9fa;
        padding: 40px 0;
        min-height: 100vh;
    }
    .card {
        border: none;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(76, 0, 130, 0.1);
    }
    .card-header {
        background-color: #4a148c; /* Dark purple */
        color: white;
        font-weight: 600;
        padding: 15px 20px;
        border-bottom: none;
        border-radius: 8px 8px 0 0;
        text-align: center;
    }
    .card-body {
        padding: 25px;
    }
    .btn-primary {
        background-color: #4a148c; /* Dark purple */
        border-color: #4a148c;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: 500;
    }
    .btn-primary:hover {
        background-color: #5c1a9f; /* Slightly lighter purple */
        border-color: #5c1a9f;
    }
    .form-control:focus {
        border-color: #9c27b0;
        box-shadow: 0 0 0 0.2rem rgba(106, 27, 154, 0.25);
    }
    .image-container {
        text-align: center;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }
    .password-image {
        max-width: 100%;
        height: auto;
        border-radius: 6px;
    }
</style>

<div class="container password-reset-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cambiar Contraseña') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Registrado') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Link de recuperacion') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <!-- Imagen dentro de la tarjeta, debajo del formulario -->
                    <div class="image-container">
                        <img src="{{ asset('images/olvido.png') }}" alt="Password Reset" class="password-image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection