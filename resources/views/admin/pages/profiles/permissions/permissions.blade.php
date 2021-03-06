@extends('adminlte::page')

@section('title', 'Permissões de Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        {{-- <li class="breadcrumb-item active"><a href="{{ route('permissions.permissions') }}">Permissoes</a></li> --}}
    </ol>

    <div class="d-flex">
        <h1>Permissões do Perfil de <b>{{$profile->name}}</b></h1>

        <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-dark ml-2">Adicionar nova Permissão</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->name }}
                            </td>
                            <td style="width=10px">
                                <a href="{{ route('profiles.permission.detach', [$profile->id, $permission->id]) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop