@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar tipos de alterações</h1>        
    </div>
</div>

{{ Form::model($changetype, ['route' => ['admin.changetypes.update',$changetype->id], 'method' => 'PUT' ]) }}
    @include('admin.pages.changetypes._form')                        
    <div class="col-sm-8 text-right">
        <a href="{{ route('admin.changetypes.index') }}" class="text-primary">Cancelar</a>
        <button type="submit" class="btn btn-primary ml-2">Atualizar</button>
    </div>
{{ Form::close() }}


@endsection