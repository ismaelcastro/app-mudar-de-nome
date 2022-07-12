<div class="row">
    <div class="col-sm-8">        
        
        <div class="form-group">
            {{ Form::label('pages', 'Páginas') }}
            {{
                Form::select('pages', $pages,null,['class' => $errors->has('pages') ?  'js-basic-multiple form-control is-invalid' : 'js-basic-multiple form-control', 'multiple' => 'multiple', 'name' => 'pages[]'])
            }}
            @include('admin.partials._help_block',['field' => 'pages'])
        </div>
        
        <div class="form-group">
            {{ Form::label('name', 'Título') }}
            {{ Form::text('name', null, ['class' => $errors->has('name') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'name'])
        </div>

        <div class="form-group">
            {{ Form::label('description', 'Descrição') }}
            {{ Form::textarea('description', null, ['class' => $errors->has('description') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'description'])
        </div>


    </div>
</div>