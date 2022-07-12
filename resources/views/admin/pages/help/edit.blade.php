@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar "<i>Como Podemos te Ajudar</i>" </h1>        
    </div>
</div>

{{ Form::model($help, ['route' => ['admin.help.update',$help->id], 'method' => 'PUT' ]) }}
    @include('admin.pages.help._form')                        
    <div class="col-sm-8 text-right">
        <a href="{{ route('admin.help.index') }}" class="text-primary">Cancelar</a>
        <button type="submit" class="btn btn-primary ml-2">Atualizar</button>
    </div>
{{ Form::close() }}


@endsection

@section('scriptjs')
<script src="{{ asset('assets-adm/plugins/ckeditor2/ckeditor.js') }}" defer></script>
    <script defer>
    window.onload = function() {
        // Full featured editor
        CKEDITOR.replace( 'description', {
            height: '400px',
            extraPlugins: 'forms'
        });
    };
    </script>
@endsection