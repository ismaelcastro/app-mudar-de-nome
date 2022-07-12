@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar atendimento</h1>        
    </div>
</div>

{{ Form::model($call, ['route' => ['admin.calls.update',$call->id], 'method' => 'PUT' ]) }}
    @include('admin.pages.calls._form')                        
    <div class="col-sm-8 text-right">
        <a href="{{ route('admin.calls.index') }}" class="text-primary">Cancelar</a>
        <button type="submit" class="btn btn-primary ml-2">Atualizar</button>
    </div>
{{ Form::close() }}
@include('admin.pages.clients._form_modal')

@endsection

@section('stylecss')
    @if ($call->affiliation == 'retificacao')
        <style>
            .box_action{display: block;}
        </style>
    @endif
@endsection