<div class="row mb-3">
    <div class="col-sm-10 pr-0">

        {{ Form::open(['route' => 'admin.historics.search', 'id' => 'form-searh-case' ]) }}
        
        <input type="hidden" name="who_create" id="who_create" @isset($dataForm['who_create']) value="{{ $dataForm['who_create'] }}" @endisset>
        <input type="hidden" name="forwardingagent" id="forwardingagent" >
        <input type="hidden" name="ord" id="ord" @isset($dataForm['ord']) value="{{ $dataForm['ord'] }}" @endisset>
        <input type="hidden" name="call_id" id="call_id" @isset($dataForm['call_id']) value="{{ $dataForm['call_id'] }}" @endisset>
       


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
    <div class="col-sm-2 pl-0">
        <div class="box-options">
            <ul class="nav">               
                
                <li class="nav-item dropdown">
                    <a id="navbarStatusDropdown" class="nav-link btn-avanced2 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span data-toggle="tooltip" data-placement="bottom" title="Financeiro">
                            Todos
                        </span>                                
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarStatusDropdown">
                        <a class="dropdown-item" href="javascript:void(0);" onclick="document.getElementById('who_create').value='';document.getElementById('form-searh-case').submit();" >Exibir todas</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0);" onclick="document.getElementById('who_create').value='automatico';document.getElementById('form-searh-case').submit();" >Automático</a>
                        <a class="dropdown-item" href="javascript:void(0);" onclick="document.getElementById('who_create').value='usuario';document.getElementById('form-searh-case').submit();" >Usuários</a>
                        <a class="dropdown-item" href="javascript:void(0);" onclick="document.getElementById('who_create').value='cliente';document.getElementById('form-searh-case').submit();" >Cliente</a>                      
                    </div>
                </li>
                
            </ul>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-12">

        @isset($dataForm['date_start'])
        <div class="alert alert-tag">
            <button type="button" class="close" aria-label="Close" onclick="document.getElementById('date_start').value='';document.getElementById('date_finish').value='';document.getElementById('form-searh-case').submit();">
                <i class="fa fa-times"></i>
            </button>       
            
            {{ date('d/m/Y', strtotime($dataForm['date_start'])) }} - {{ date('d/m/Y', strtotime($dataForm['date_finish'])) }}
        </div>
        @endisset
        
        @isset($dataForm['title'])
        <div class="alert alert-tag">
            <button type="button" class="close" aria-label="Close" onclick="document.getElementById('title').value='';document.getElementById('form-searh-case').submit();">
                <i class="fa fa-times"></i>
            </button>
            <strong>Contato</strong> {{ $dataForm['title'] }}
        </div>
        @endisset


        @isset($dataForm['call_id'])
        <div class="alert alert-tag">
            <button type="button" class="close" aria-label="Close" onclick="document.getElementById('call_id').value='';document.getElementById('form-searh-case').submit();">
                <i class="fa fa-times"></i>
            </button>
            {{ $call_title }}
        </div>
        @endisset

       

        @isset($dataForm['who_create'])
        <div class="alert alert-tag">
            <button type="button" class="close" aria-label="Close" onclick="document.getElementById('who_create').value='';document.getElementById('form-searh-case').submit();">
                <i class="fa fa-times"></i>
            </button>
            <strong>Status</strong> {{ $dataForm['who_create'] }}
        </div>
        @endisset


        
    </div>
</div>