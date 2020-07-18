@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
    <div class="d-flex">
        <h1>Cadastrar Novo Plano</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@stop