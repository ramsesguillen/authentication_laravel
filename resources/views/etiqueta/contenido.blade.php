
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <a href="{{ route('etiquetas.create') }}" class="btn-floating btn-large waves-effect blue-grey lighten-3">+</a>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse ( $etiquetas as $etiqueta )
                    <tr>
                        <td>{{ $etiqueta->id }}</td>
                        <td>{{ $etiqueta->nombre }}</td>
                        <td>
                            <a class="waves-effect green darken-2 btn-large" href="{{ route('etiquetas.show', $etiqueta->id ) }}">Show</a>
                            <a class="waves-effect blue darken-2 btn-large" href="{{ route('etiquetas.edit', $etiqueta->id ) }}">Edit</a>
                            <form action="{{ route('etiquetas.destroy', $etiqueta->id ) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="waves-effect red darken-2 btn-large" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="center-align">No hay ninguna etiqueta</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
