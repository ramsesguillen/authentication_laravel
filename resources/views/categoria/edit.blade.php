@extends('layouts.admin')
@section('title', 'Categorias | Create')


@section('contenido')
<div class="container">
    <div class="row">
        <div class="col s12">
            <a href="{{ route('categorias.index') }}" class="btn-floating btn-large waves-effect blue-grey lighten-3">-</a>
        </div>
    </div>
    <div class="row" style="margin-top: 120px;">
        <form class="col s12" action="{{  route('categorias.update', $categoria->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Placeholder" value="{{ $categoria->nombre }}" name="nombre" id="first_name" type="text" class="validate">
                    <label for="first_name">Name</label>
                    @error('nombre')
                        <div class="alert alert-danger"><small style="color: red;">{{ $message }}</small></div>
                    @enderror
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect green darken-2" type="submit" name="action">Enviar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
