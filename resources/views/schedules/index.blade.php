@extends('adminlte::page')
@section ('title', 'Horarios')
@section ('content_header')
<h1>Horarios</h1>
@stop

@section ('content')
@can('admin.users.index')
<a href="schedules/create" class="btn btn-primary mt-4">CREAR</a>
@endcan
<table class="table table-striped table-light mt-4">
    <thead class="thead-light">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Día</th>
            <th scope="col">Inicio</th>
            <th scope="col">Fin</th>
            <th scope="col">Asignatura</th>
        <tr>
    </thead>
    <tbody>
    @foreach( $schedules as $schedule )
        <tr>
            <td>{{ $schedule->id }}</td>
            <td>{{ $schedule->day }}</td>
            <td>{{ $schedule->time_start }}</td>
            <td>{{ $schedule->time_end }}</td>
            <td>{{ $schedule->subject }}</td>
            <td>

            <a href="{{ url('/schedules/'.$schedule->id.'/edit') }}"class="text-decoration-none mt-1"><input type="submit" style="text-decoration:none" value="Editar">
            </a>


            <form action="{{ url('/schedules/'.$schedule->id ) }}" method="post">
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
