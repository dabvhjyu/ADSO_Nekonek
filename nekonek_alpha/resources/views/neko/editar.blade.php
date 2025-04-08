@extends('layouts.app')
@section('content')


<div class="modal fade"  tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('neko.update', $neko) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="nombre_serie" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="nombre_serie"
                            value="{{ $crear_serie->titulo }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nombre_serie" class="form-label">Subtitulo</label>
                        <input type="text" class="form-control" id="subtitulo" name="nombre_serie"
                            value="{{ $crear_serie->subtitulo }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nombre_serie" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="nombre_serie"
                            value="{{ $crear_serie->descripcion }}" required>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" id="next-btn" class="btn btn-primary px-4">
                            Actualizar serie <i class="bi bi-save ms-2"></i>
                        </button>
                    </div>
            </div>
            </form>

            @if (session('success'))
                <div class="alert alert-success mt-4" role="alert">
                    {{ session('success') }}
                </div>
            @endif


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </div>
</div>
</div>

@endsection