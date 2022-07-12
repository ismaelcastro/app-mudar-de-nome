<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {{ Form::label('goal', 'Meta') }}
            {{ Form::text('goal', null, ['class' => $errors->has('goal') ?  'form-control is-invalid money' : 'form-control money']) }}
            @include('admin.partials._help_block',['field' => 'goal'])
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {{ Form::label('bonus', 'Bônus') }}
            {{ Form::text('bonus', null, ['class' => $errors->has('bonus') ?  'form-control is-invalid money' : 'form-control money']) }}
            @include('admin.partials._help_block',['field' => 'bonus'])
        </div>
    </div>
</div>