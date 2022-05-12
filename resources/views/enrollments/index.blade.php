@extends('adminlte::page')
@section ('title', 'Dashboard')
@section ('content_header')
<h1>Inscripciones</h1>
@stop

@section ('content')
<table class="table table-striped table-light mt-4">
    <thead class="thead-light">
        <tr>
            <th scope="col">Curso</th>
            <th scope="col">Alumno</th>
            <th scope="col">Estado</th>
        <tr>
    </thead>
    <tbody>
        @foreach( $enrollments as $enrollment )
        <tr>
            <td>{{ $enrollment->id }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
            
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

