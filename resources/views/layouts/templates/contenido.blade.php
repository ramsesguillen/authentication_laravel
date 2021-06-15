@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <a href="{{ route('categorias.create') }}" class="btn-floating btn-large waves-effect blue-grey lighten-3">+</a>
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
                @forelse ( $categorias as $categoria )
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>
                            <a class="waves-effect green darken-2 btn-large" href="{{ route('categorias.show', $categoria->id ) }}">Show</a>
                            <a class="waves-effect blue darken-2 btn-large" href="{{ route('categorias.edit', $categoria->id ) }}">Edit</a>
                            <form action="{{ route('categorias.destroy', $categoria->id ) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="waves-effect red darken-2 btn-large" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="center-align">No hay ninguna categoria</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
