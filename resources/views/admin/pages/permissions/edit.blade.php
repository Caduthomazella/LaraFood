@extends('adminlte::page')

@section('title', 'Editar Permissao')

@section('content_header')
    <div class="d-flex">
        <h1>Editar a Permissão <b>{{$permission->name}}</b></h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.update', $permission->id) }}" class="form" method="POST">
                @method('PUT')

                @include('admin.pages.permissions._partials.form')
                
            </form>
        </div>
    </div>
@stop