@extends('layouts.admin')

@section('title', 'Etiqueta | Show')


@section('contenido')
<div class="container">
        <div class="row">
            <div class="col s12">
                <a href="{{ route('etiquetas.index') }}" class="btn-floating btn-large waves-effect blue-grey lighten-3">-</a>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <strong>
                    <p>Etiqueta: {{ $etiqueta->nombre }}</p>
                </strong>
                <strong>
                    <p>Etiqueta creado  en: {{ $etiqueta->created_at }}</p>
                </strong>
            </div>
        </div>
</div>
@endsection
