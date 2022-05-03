@extends('adminlte::page')
@section ('title', 'Usuarios')
@section ('content_header')
<h1>Asignar un rol</h1>
@stop

@section ('content')

@if (session('info'))
     <div class="alert alert-success">
          <strong> {{session('info')}}</strong>
     </div>
@endif
    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre</p>
            <p class="form-control">{{$user->name}}</p>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
            @foreach ($roles as $role)
            <div>
                <label>
                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                {{$role->name}}
                </label>
            </div>
            @endforeach
            {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section ('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section ('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

@stop