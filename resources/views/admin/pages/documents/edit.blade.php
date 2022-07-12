@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar documento</h1>        
    </div>
</div>

{{ Form::model($document, ['route' => ['admin.documents.update',$document->id], 'method' => 'PUT' ]) }}
    @include('admin.pages.documents._form')                        
    <div class="col-sm-8 text-right">
        <a href="{{ route('admin.documents.index') }}" class="text-primary">Cancelar</a>
        <button type="submit" class="btn btn-primary ml-2">Atualizar</button>
    </div>
{{ Form::close() }}


@endsection

@section('stylecss')
    @if ($document->type != 'simple' && $document->type != 'd4sign' && $document->type != 'despachante')
        <style>
            .openthis{display: block;}
        </style>
    @elseif($document->type == 'd4sign')
        <style>
            .open_d4sign{display: block;}
        </style>
    @endif
@endsection

@section('scriptjs')
<script>
    $('#price').mask('000,000,00', {reverse: true});
</script>
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