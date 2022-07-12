@php
    $clientSelected = ( session()->has('lastClient') ? session()->get('lastClient') : null );
@endphp
<div class="form-group">
    {{ Form::label('client_id', 'Clientes') }} <span class="text-danger">*</span>
    {{
        Form::select('client_id', $client_list,$clientSelected,['class' => $errors->has('client_id') ?  'js-example-basic-single form-control is-invalid' : 'js-example-basic-single form-control', 'onchange' => 'loadQuerent(this.options[this.selectedIndex].text)'])
    }}
    @include('admin.partials._help_block',['field' => 'client_id'])
    <a href="javascript:void(0);" data-toggle="modal" data-target="#add-cliente">Adicionar cliente</a>
</div>