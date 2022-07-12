@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Adicionar usuário</h1>        
    </div>
</div>

{{ Form::open(['route' => 'admin.users.store' ]) }}
    @include('admin.pages.users._form')                        
    <div class="col-sm-8 text-right">
        <a href="{{ route('admin.users.index') }}" class="text-primary">Cancelar</a>
        <button type="submit" class="btn btn-primary ml-2">Criar</button>
    </div>
{{ Form::close() }}


@endsection