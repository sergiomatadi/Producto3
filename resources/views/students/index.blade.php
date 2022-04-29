@extends('adminlte::page')
@section ('title', 'Dashboard')
@section ('content_header')
<h1>Dashboard</h1>
@stop

@section ('content')
<a href="students/create" class="btn btn-primary mt-4">CREAR</a>
<table class="table table-striped table-light mt-4">
    <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Usuario</th>
            <th scope="col">Email</th>
            <th scope="col">Nombre</th>
            <th scope="col">Teléfono</th>
            <th scope="col">NIF</th>
            <th scope="col">Fecha de registro</th>
            <th scope="col">Acciones</th>


        <tr>
    </thead>
    <tbody>
    @foreach( $students as $students )
        <tr>
            <td>{{ $students->id }}</td>
            <td>{{ $students->name }}</td>
            <td>{{ $students->username }}</td>
            <td>{{ $students->email }}</td>
            <td>{{ $students->name }}</td>
            <td>{{ $students->telephone }}</td>
            <td>{{ $students->nif }}</td>
            <td>{{ $students->date_registered }}</td>
            <td>
            
            <a href="{{ url('/students/'.$students->id.'/edit') }}"class="text-decoration-none mt-1"><input type="submit" style="text-decoration:none" value="Editar">
     
            </a>    
       

            <form action="{{ url('/students/'.$students->id ) }}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" class="mt-3"onclick="return confirm('¿Quieres eliminar?')" value="Borrar">
            </form>

            </td>

        </tr>
    @endforeach
    </tbody>
</table>
@stop

@section ('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section ('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@stop