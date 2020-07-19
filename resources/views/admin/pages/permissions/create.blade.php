@extends('adminlte::page')

@section('title', 'Cadastrar Nova Permissão')

@section('content_header')
    <div class="d-flex">
        <h1>Cadastrar Nova Permissão</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.store') }}" class="form" method="POST">

                @include('admin.pages.permissions._partials.form')
                
            </form>
        </div>
    </div>
@stop