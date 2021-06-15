@extends('layouts.admin')

@section('title', 'Categorias | Show')


@section('contenido')
<div class="container">
        <div class="row">
            <div class="col s12">
                <a href="{{ route('categorias.index') }}" class="btn-floating btn-large waves-effect blue-grey lighten-3">-</a>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <strong>
                    <p>Nombre de la categoria: {{ $categoria->nombre }}</p>
                </strong>
                <strong>
                    <p>Creado en: {{ $categoria->created_at }}</p>
                </strong>
            </div>
        </div>
</div>
@endsection

