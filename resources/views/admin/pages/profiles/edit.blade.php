@extends('adminlte::page')

@section('title', 'Editar Perfil')

@section('content_header')
    <div class="d-flex">
        <h1>Editar o Perfil de {{$profile->name}}</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.update', $profile->id) }}" class="form" method="POST">
                @method('PUT')

                @include('admin.pages.profiles._partials.form')
                
            </form>
        </div>
    </div>
@stop