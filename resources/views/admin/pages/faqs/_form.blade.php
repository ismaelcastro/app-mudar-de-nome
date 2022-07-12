<div class="row">
    <div class="col-sm-8">        
        
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('faq_category_id', 'Categoria') }}
                    {{
                        Form::select('faq_category_id', $category_list,null,['class' => $errors->has('faq_category_id') ?  'form-control is-invalid' : 'form-control'])
                    }}
                    @include('admin.partials._help_block',['field' => 'faq_category_id'])
                    <a href="javascript:void(0)" class="text-info" data-toggle="modal" data-target="#category-Modal">Adicionar categoria</a>
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
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::label('websites', 'Sites') }}
                    {{
                        Form::select('websites', $websites_list,null,['class' => $errors->has('websites') ?  'js-basic-multiple form-control is-invalid' : 'js-basic-multiple form-control', 'multiple' => 'multiple', 'name' => 'websites[]'])
                    }}
                    @include('admin.partials._help_block',['field' => 'websites'])
                </div>
            </div>    
        </div>
        <div class="form-group">
            {{ Form::label('description', 'Descrição') }}
            {{ Form::textarea('description', null, ['class' => $errors->has('description') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'description'])
        </div>


    </div>
</div>