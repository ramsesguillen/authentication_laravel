@extends('layouts.admin')
@section('title', 'Nota | Create')


@section('contenido')
<div class="container">
    <div class="row">
        <div class="col s12">
            <a href="{{ route('notas.index') }}" class="btn-floating btn-large waves-effect blue-grey lighten-3">-</a>
        </div>
    </div>
    <div class="row" style="margin-top: 120px;">
        <form class="col s12" action="{{  route('notas.store') }}" method="POST"  enctype="multipart/form-data" file="true">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Tu nota aquí" name="titulo" id="titulo" type="text" class="validate">
                    <label for="titulo">Nota</label>
                    @error('titulo')
                        <div class="alert alert-danger"><small style="color: red;">{{ $message }}</small></div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="categoria_id">
                        <option value="" disabled selected></option>
                        @forelse ( $categorias as $categoria )
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @empty
                            <option value="" disabled selected> no hay categorias </option>
                        @endforelse
                    </select>
                    <label>Categorias</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="etiquetas_id">
                        <option value="" disabled selected></option>
                        @forelse ( $etiquetas as $etiqueta )
                        <option value="{{ $etiqueta->id }}">{{ $etiqueta->nombre }}</option>
                        @empty
                            <option value="" disabled selected> no hay etiquetas </option>
                        @endforelse
                    </select>
                    <label>Etiqueta</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="" name="extracto" id="extracto" type="text" class="validate">
                    <label for="extracto">extracto</label>
                    @error('extracto')
                        <div class="alert alert-danger"><small style="color: red;">{{ $message }}</small></div>
                    @enderror
                </div>
            </div>
                </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="date" class="datepicker" name="fecha">
                    @error('fecha')
                        <div class="alert alert-danger"><small style="color: red;">{{ $message }}</small></div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="file" class="" name="imagen_destacada">
                    @error('imagen_destacada')
                        <div class="alert alert-danger"><small style="color: red;">{{ $message }}</small></div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <textarea name="contenido" id="contenido" class="materialize-textarea"></textarea>
                    <label for="contenido">Contenido</label>
                    @error('contenido')
                        <div class="alert alert-danger"><small style="color: red;">{{ $message }}</small></div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <button class="btn waves-effect green darken-2" type="submit">Enviar</button>
            </div>
        </form>
        </div>
    </div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var options = document.querySelectorAll('option');
    var instances = M.FormSelect.init(elems, options);
});
</script>
