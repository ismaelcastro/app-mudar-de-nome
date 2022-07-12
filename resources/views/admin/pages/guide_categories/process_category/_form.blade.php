<div class="row">
    <div class="col-sm-8">
        <div class="row">
            <div class="col-sm-5">
                <div class="form-group">
                    {{ Form::label('process_type_id', 'Categoria') }}
                    {{  Form::select('process_type_id', $category_list,null,['class' => $errors->has('process_type_id') ?  'form-control is-invalid' : 'form-control']) }}
                    @include('admin.partials._help_block',['field' => 'top_question_category_id'])
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    {{ Form::label('name', 'Título') }}
                    {{ Form::text('name', null, ['class' => $errors->has('name') ?  'form-control is-invalid' : 'form-control']) }}
                    @include('admin.partials._help_block',['field' => 'name'])
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    {{ Form::label('color', 'Cor') }}
                    {{ Form::color('color', null, ['class' => $errors->has('color') ?  'form-control is-invalid' : 'form-control']) }}
                    @include('admin.partials._help_block',['field' => 'color'])
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::label('resume', 'Resumo') }}
                    {{ Form::text('resume', null, ['class' => $errors->has('resume') ?  'form-control is-invalid' : 'form-control', 'rows' => 4, 'cols' => 40]) }}
                    @include('admin.partials._help_block',['field' => 'resume'])
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::label('description', 'Descrição') }}
                    {{ Form::textarea('description', null, ['class' => $errors->has('description') ?  'form-control is-invalid' : 'form-control', 'rows' => 4, 'cols' => 40]) }}
                    @include('admin.partials._help_block',['field' => 'description'])
                </div>
            </div>
        </div>

    </div>
</div>

