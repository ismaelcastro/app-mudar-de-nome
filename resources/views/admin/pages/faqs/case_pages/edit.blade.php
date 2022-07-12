@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar página case</h1>        
    </div>
</div>

{{ Form::model($case_page, ['route' => ['admin.case_pages.update',$case_page->id], 'method' => 'PUT' ]) }}
    @include('admin.pages.case_pages._form')                        
    <div class="col-sm-8 text-right">
        <a href="{{ route('admin.case_pages.index') }}" class="text-primary">Cancelar</a>
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