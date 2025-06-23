@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->rol_id == 1)
                        <div class="alert alert-primary">
                            <h4>Bienvenido, Administrador</h4>
                            <p>Tienes acceso completo al sistema. Puedes gestionar usuarios, contenido y configuraciones.</p>
                        </div>
                        <!-- Aquí puedes agregar componentes específicos para administradores -->
                    @elseif(Auth::user()->rol_id == 2)
                        <div class="alert alert-info">
                            <h4>Bienvenido, Lector</h4>
                            <p>Tienes acceso de lectura al contenido del sistema.</p>
                        </div>
                        <!-- Aquí puedes agregar componentes específicos para lectores -->
                    @elseif(Auth::user()->rol_id == 3)
                        <div class="alert alert-success">
                            <h4>Bienvenido, Editor</h4>
                            <p>Tienes permisos para editar y crear contenido en el sistema.</p>
                        </div>
                        <!-- Aquí puedes agregar componentes específicos para editores -->
                    @else
                        {{ __('Estas Dentro') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

