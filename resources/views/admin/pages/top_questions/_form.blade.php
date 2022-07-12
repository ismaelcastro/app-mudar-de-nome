<div class="row">
    <div class="col-sm-8">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('top_question_category_id', 'Categoria') }}
                    {{  Form::select('top_question_category_id', $category_list,null,['class' => $errors->has('top_question_category_id') ?  'form-control is-invalid' : 'form-control']) }}
                    @include('admin.partials._help_block',['field' => 'top_question_category_id'])
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('name', 'Título') }}
                    {{ Form::text('name', null, ['class' => $errors->has('name') ?  'form-control is-invalid' : 'form-control']) }}
                    @include('admin.partials._help_block',['field' => 'name'])
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('question', 'Pergunta') }}
                    {{ Form::text('question', null, ['class' => $errors->has('question') ?  'form-control is-invalid' : 'form-control']) }}
                    @include('admin.partials._help_block',['field' => 'question'])
                </div>
            </div>
            <div class="col-sm-6">
                <div class="col-sm-2">
                    <div class="form-group">
                        {{ Form::label('order', 'Ordem') }}
                        {{ Form::number('order', null, ['class' => $errors->has('order') ?  'form-control is-invalid' : 'form-control']) }}
                        @include('admin.partials._help_block',['field' => 'order'])
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::label('answer', 'Resposta') }}
                    {{ Form::textarea('answer', null, ['class' => $errors->has('answer') ?  'form-control is-invalid' : 'form-control', 'rows' => 4, 'cols' => 40]) }}
                    @include('admin.partials._help_block',['field' => 'answer'])
                </div>
            </div>
        </div>
    </div>
</div>

