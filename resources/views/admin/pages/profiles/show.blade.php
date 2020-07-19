@extends('adminlte::page')

@section('title', "Detalhe do Perfil")

@section('content_header')
    <div class="d-flex">
        <h1>Detalhes do Perfil de <b>{{ $profile->name }}</b> </h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $profile->name }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $profile->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR PERFIL</button>
            </form>
        </div>
    </div>
@stop