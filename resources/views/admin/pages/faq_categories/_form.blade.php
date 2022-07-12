<div class="row">
    <div class="col-sm-8">

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, ['class' => $errors->has('name') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'name'])
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