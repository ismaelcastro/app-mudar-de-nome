<div class="row">
    <div class="col-sm-8"> 
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('news_category_id', 'Categoria') }}
                    {{
                        Form::select('news_category_id', $category_list,null,['class' => $errors->has('news_category_id') ?  'form-control is-invalid' : 'form-control'])
                    }}
                    @include('admin.partials._help_block',['field' => 'news_category_id'])
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
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('image', 'Imagem') }}
                    <div class="input-group">        
                        {{ Form::text('image', null, ['class' => $errors->has('image') ?  'form-control is-invalid' : 'form-control']) }}
                        <span class="input-group-btn">
                            <div class="btn btn-success btn-file">
                                <i class="fa fa-paperclip"></i>
                                Upload
                                {{ Form::file('attachment', ['onchange' => 'upload(this,"'.route('upload-image').'","image");']) }}
                            </div>
                        </span>
                        @include('admin.partials._help_block',['field' => 'image'])
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{ Form::label('date', 'Data de publicação') }}
                    {{ Form::date('date', null,['class' => $errors->has('date') ?  'form-control is-invalid' : 'form-control'])}}
                    @include('admin.partials._help_block',['field' => 'date'])
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
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {{ Form::label('summary', 'Resumo') }}
                    {{ Form::textarea('summary', null, ['class' => $errors->has('summary') ?  'form-control is-invalid' : 'form-control']) }}
                    @include('admin.partials._help_block',['field' => 'summary'])
                </div>
            </div>    
        </div>
        <div class="form-group">
            {{ Form::label('description', 'Descrição') }}
            {{ Form::textarea('description', null, ['class' => $errors->has('description') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'description'])
        </div>
        
        <h4 class="sub-title">META TAG</h4>
        
        <div class="form-group">
            {{ Form::label('metatitle', 'Title') }}
            {{ Form::text('metatitle', null, ['class' => $errors->has('metatitle') ?  'form-control is-invalid maxlength' : 'form-control maxlength', 'maxlength' => '90']) }}
            @include('admin.partials._help_block',['field' => 'metatitle'])
        </div>
        
        <div class="form-group">
            {{ Form::label('metadescription', 'Description') }}
            {{ Form::textarea('metadescription', null, ['class' => $errors->has('metadescription') ?  'form-control is-invalid maxlength' : 'form-control maxlength', 'maxlength' => '250']) }}
            @include('admin.partials._help_block',['field' => 'metadescription'])
        </div>
        


    </div>
</div>