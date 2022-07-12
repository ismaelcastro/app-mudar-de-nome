<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, ['class' => $errors->has('name') ?  'form-control is-invalid' : 'form-control']) }}
            @include('admin.partials._help_block',['field' => 'name'])
        </div>
        
        <div class="form-group" style="display: none">
            <div class="checkbox-fade fade-in-primary d-">
                <label>
                    {{ Form::checkbox('forwardingagent', 1) }}
                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                    <span class="text-inverse">Habilitar serviço de despachante</span>
                </label>
            </div>
        </div>
        
        <div class="form-group">
            <div class="checkbox-fade fade-in-primary d-">
                <label>
                    {{ Form::checkbox('package', 1) }}
                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                    <span class="text-inverse">Habilitar guias em pacote</span>
                </label>
            </div>
        </div>

    </div>
</div>