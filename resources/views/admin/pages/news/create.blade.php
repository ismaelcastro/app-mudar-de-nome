@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Adicionar Notícia</h1>        
    </div>
</div>

{{ Form::open(['route' => 'admin.news.store' ]) }}
    @include('admin.pages.news._form')                        
    <div class="col-sm-8 text-right">
        <a href="{{ route('admin.news.index') }}" class="text-primary">Cancelar</a>
        <button type="submit" class="btn btn-primary ml-2">Criar</button>
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