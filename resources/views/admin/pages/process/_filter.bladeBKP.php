<div class="row mb-3">
    <div class="col-sm-8 pr-0">

        {{ Form::open(['route' => 'admin.process.index', 'id' => 'form-searh-case' ]) }}
        
        <input type="hidden" name="paymentform" id="paymentform" @isset($dataForm['paymentform']) value="{{ $dataForm['paymentform'] }}" @endisset>
        <input type="hidden" name="forwardingagent" id="forwardingagent" >
        <input type="hidden" name="ord" id="ord" @isset($dataForm['ord']) value="{{ $dataForm['ord'] }}" @endisset>

        <select name="procedural_step[]" id="procedural_step" class="d-none" multiple>
            @foreach ($procedural_step_list as $key => $value)
                <option value="{{$key}}" @if (isset($dataForm['procedural_step']) && in_array($key, $dataForm['procedural_step']) ) selected="selected" @endif >{{$value}}</option>
            @endforeach
        </select>

        <select name="stage_case[]" id="stage_case" class="d-none" multiple>
            @foreach ($stage_case_list as $key => $value)
                <option value="{{$key}}" @if (isset($dataForm['stage_case']) && in_array($key, $dataForm['stage_case']) ) selected="selected" @endif >{{$value}}</option>
            @endforeach
        </select>


        <div class="box-filter filter-bar">
            <ul class="nav navbar-nav">
                <li class="nav-item box-filter-search">
                    <button type="button" class="btn btn-avanced mr-0">
                        <i class="fa fa-caret-down au-button__icon au-button__icon--only"></i>
                    </button>
                   <input type="text" name="title" id="title" class="filter-field" placeholder="Encontre um contato">
                   <button class="btn-search" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </li>
            </ul>
        </div>
        <div class="box-advanced">
            <div class="ga-field">
                <div class="row">
                    <div class="col-sm-12">                        
                        <div class="ga-control">
                            <label class="ga-label ng-binding">Mostrar:</label>
                            <div class="row pb-3">
                                <div class="col-sm-4">
                                    <select name="field_date_search" class="form-control">
                                        <option value="created_at" @if(isset($dataForm['field_date_search']) && $dataForm['field_date_search'] == 'created_at' ) selected="selected" @endif>Data de criação</option>
                                        <option value="signed" @if(isset($dataForm['field_date_search']) && $dataForm['field_date_search'] == 'signed' ) selected="selected" @endif>Data da assinatura</option>
                                        <option value="casedate" @if(isset($dataForm['field_date_search']) && $dataForm['field_date_search'] == 'casedate' ) selected="selected" @endif>Data transformou em caso</option>
                                        <option value="process" @if(isset($dataForm['field_date_search']) && $dataForm['field_date_search'] == 'process' ) selected="selected" @endif>Data transformou em precesso</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" name="date_start" id="date_start" class="form-control" @isset($dataForm['date_start']) value="{{ $dataForm['date_start'] }}" @endisset >
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" name="date_finish" id="date_finish" class="form-control" @isset($dataForm['date_finish']) value="{{ $dataForm['date_finish'] }}" @endisset >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <a href="javascript:void(0);" class="text-primary cancel-advanced">Cancelar</a>
                                    <button class="btn btn-sm btn-primary ml-2">Aplicar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }} 

    </div>
    <div class="col-sm-4 pl-0">
        <div class="box-options">
            <ul class="nav">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link btn-avanced2 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span data-toggle="tooltip" data-placement="bottom" title="Etapa">
                            <i class="fa fa-sitemap"></i> Etapa
                        </span>                                
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:void(0);" onclick="deselectSatrFilter('#stage_case', '#form-searh-case');" >Exibir todas</a>
                        <div class="dropdown-divider"></div>
                        @foreach ($stage_case_list as $stage_case_key => $stage_case_value)
                        <a class="dropdown-item" href="javascript:void(0);" onclick="addSatrFilter('#stage_case', '{{$stage_case_key}}','#form-searh-case');" >{{$stage_case_value}}</a>
                        @endforeach
                    </div>
                </li>
                
                <li class="nav-item dropdown">
                    <a id="navbarStatusDropdown" class="nav-link btn-avanced2 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span data-toggle="tooltip" data-placement="bottom" title="Status">
                            <i class="fa fa-credit-card"></i> Financeiro
                        </span>                                
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarStatusDropdown">
                        <a class="dropdown-item" href="javascript:void(0);" onclick="document.getElementById('paymentform').value='';document.getElementById('form-searh-case').submit();" >Exibir todas</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0);" onclick="document.getElementById('paymentform').value='gerencianet';document.getElementById('form-searh-case').submit();" >Carnês em dia</a>
                        <a class="dropdown-item" href="javascript:void(0);" onclick="document.getElementById('paymentform').value='gerencianet';document.getElementById('form-searh-case').submit();" >Inadimplentes</a>
                        <a class="dropdown-item" href="javascript:void(0);" onclick="document.getElementById('paymentform').value='deposito';document.getElementById('form-searh-case').submit();" >Depósito</a>
                        <a class="dropdown-item" href="javascript:void(0);" onclick="document.getElementById('paymentform').value='adexitum';document.getElementById('form-searh-case').submit();" >Êxito</a>                           
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarEtapaDropdown" class="nav-link btn-avanced2 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span data-toggle="tooltip" data-placement="bottom" title="Andamento">
                            Andamento
                        </span>                                
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarEtapaDropdown">
                       
                        <a class="dropdown-item" href="javascript:void(0);" onclick="deselectSatrFilter('#procedural_step', '#form-searh-case');">
                            Exibir todas
                        </a>
                        <div class="dropdown-divider"></div>
                        @foreach ($procedural_step_list as $key => $value)
                        <a class="dropdown-item" href="javascript:void(0);" onclick="addSatrFilter('#procedural_step', '{{$key}}','#form-searh-case');" >
                            {{$value}}
                        </a>
                        @endforeach
                        
                    </div>
                </li>
                
            </ul>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-12">

        @isset($dataForm['date_start'])
        @isset($dataForm['field_date_search'])
        <div class="alert alert-tag">
            <button type="button" class="close" aria-label="Close" onclick="document.getElementById('date_start').value='';document.getElementById('date_finish').value='';document.getElementById('form-searh-case').submit();">
                <i class="fa fa-times"></i>
            </button>
            <strong>
                @if ($dataForm['field_date_search'] == 'created_at')
                    Data de Criação
                @elseif ($dataForm['field_date_search'] == 'signed')
                    Data da assinatura
                @elseif ($dataForm['field_date_search'] == 'casedate')
                    Data transformou em caso
                @elseif ($dataForm['field_date_search'] == 'process')
                    Data transformou em caso
                @endif                
            </strong> 
            
            {{ date('d/m/Y', strtotime($dataForm['date_start'])) }} - {{ date('d/m/Y', strtotime($dataForm['date_finish'])) }}
        </div>
        @endisset
        @endisset
        
        @isset($dataForm['title'])
        <div class="alert alert-tag">
            <button type="button" class="close" aria-label="Close" onclick="document.getElementById('title').value='';document.getElementById('form-searh-case').submit();">
                <i class="fa fa-times"></i>
            </button>
            <strong>Contato</strong> {{ $dataForm['title'] }}
        </div>
        @endisset

       
        @isset($dataForm['stage_case'])
             @foreach ($dataForm['stage_case'] as $stage_case_item)
            <div class="alert alert-tag">
                <button type="button" class="close" aria-label="Close" onclick="deselectSatrItem('#stage_case', '{{$stage_case_item}}','#form-searh-case');">
                    <i class="fa fa-times"></i>
                </button>
                <strong>Etapa</strong> {{ $stage_case_list[$stage_case_item] }}
            </div>
            @endforeach
        @endisset

        @isset($dataForm['paymentform'])
        <div class="alert alert-tag">
            <button type="button" class="close" aria-label="Close" onclick="document.getElementById('paymentform').value='';document.getElementById('form-searh-case').submit();">
                <i class="fa fa-times"></i>
            </button>
            <strong>Status</strong> {{ $dataForm['paymentform'] }}
        </div>
        @endisset


        @isset($dataForm['procedural_step'])
             @foreach ($dataForm['procedural_step'] as $procedural_step_item)
            <div class="alert alert-tag">
                <button type="button" class="close" aria-label="Close" onclick="deselectSatrItem('#procedural_step', '{{$procedural_step_item}}','#form-searh-case');">
                    <i class="fa fa-times"></i>
                </button>
                <strong>Andamento</strong> {{ $procedural_step_list[$procedural_step_item] }}
            </div>
            @endforeach
        @endisset
        
    </div>
</div>