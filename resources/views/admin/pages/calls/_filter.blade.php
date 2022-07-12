<div class="row mb-3">
    <div class="col-sm-3 pr-0">
        {{ Form::open(['route' => 'admin.calls.index', 'id' => 'form-searh-interno' ]) }}
            <input type="hidden" name="occupation_area" id="occupation_area" @if(isset($dataForm['occupation_area'])) value="{{$dataForm['occupation_area']}}" @endif >
            <select name="stars[]" id="stars" class="d-none" multiple>
                <option value="1"
                        @if (isset($dataForm['stars']) && in_array(1, $dataForm['stars']) ) selected="selected" @endif>1
                </option>
                <option value="2"
                        @if (isset($dataForm['stars']) && in_array(2, $dataForm['stars']) ) selected="selected" @endif>2
                </option>
                <option value="3"
                        @if (isset($dataForm['stars']) && in_array(3, $dataForm['stars']) ) selected="selected" @endif>3
                </option>
                <option value="4"
                        @if (isset($dataForm['stars']) && in_array(4, $dataForm['stars']) ) selected="selected" @endif>4
                </option>
                <option value="5"
                        @if (isset($dataForm['stars']) && in_array(5, $dataForm['stars']) ) selected="selected" @endif>5
                </option>
            </select>

            <select name="status_call[]" id="status_call" class="d-none" multiple>
                @foreach ($status_list as $status_key => $status_value)
                    <option value="{{$status_key}}"
                            @if (isset($dataForm['status_call']) && in_array($status_key, $dataForm['status_call']) ) selected="selected" @endif >{{$status_value}}
                    </option>
                @endforeach
            </select>

            <select name="position[]" id="position" class="d-none" multiple>
                @foreach ($changes_type as $key => $value)
                    <option value="{{$key}}"
                            @if (isset($dataForm['position']) && in_array($key, $dataForm['position']) ) selected="selected" @endif >{{$value}}
                    </option>
                @endforeach
            </select>

            <select name="reason[]" id="reason" class="d-none" multiple>
                @foreach ($reasons as $key => $value)
                    <option value="{{$key}}"
                            @if (isset($dataForm['reason']) && in_array($key, $dataForm['reason']) ) selected="selected" @endif >{{$value}}
                    </option>
                @endforeach
            </select>

            <select name="stage_call[]" id="stage_call" class="d-none" multiple>
                @foreach ($stage_call as $key => $value)
                    <option value="{{$key}}"
                            @if (isset($dataForm['stage_call']) && in_array($key, $dataForm['stage_call']) ) selected="selected" @endif >{{$value}}
                    </option>
                @endforeach
            </select>

            <select name="states[]" id="states" class="d-none" multiple>
                @foreach ($states as $key => $value)
                    <option value="{{$key}}"
                            @if (isset($dataForm['states']) && in_array($key, $dataForm['states']) ) selected="selected" @endif >{{$value}}
                    </option>
                @endforeach
            </select>

            <select name="call_state[]" id="call_state" class="d-none" multiple>
                @foreach ($call_state as $key => $value)
                    <option value="{{$key}}"
                            @if (isset($dataForm['call_state']) && in_array($key, $dataForm['call_state']) ) selected="selected" @endif >{{$value}}
                    </option>
                @endforeach
            </select>

            <div class="box-filter filter-bar">
                <ul class="nav navbar-nav">
                    <li class="nav-item box-filter-search">
                        <button type="button" class="btn btn-avanced mr-0">
                            <i class="fa fa-caret-down au-button__icon au-button__icon--only"></i>
                        </button>
                        <input type="text" name="title" id="title" class="filter-field" placeholder="Encontre um contato"
                               @isset($dataForm['title']) value="{{ $dataForm['title'] }}" @endisset>
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
                                            <option value="">Data de Criação</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" name="date_start" id="date_start" class="form-control"
                                               @isset($dataForm['date_start']) value="{{ $dataForm['date_start'] }}" @endisset >
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" name="date_finish" id="date_finish" class="form-control"
                                               @isset($dataForm['date_finish']) value="{{ $dataForm['date_finish'] }}" @endisset >
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

    <div class="col-sm-8 pl-0">
        <div class="box-options">
            <ul class="nav">
                @if(isset($areas_list))
                <li class="nav-item dropdown">
                    <a id="navbarEtapaDropdown" class="nav-link btn-avanced2 dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span data-toggle="tooltip" data-placement="bottom" title="Adicionar">
                            <i class="fa fa-book"></i> Áreas
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarEtapaDropdown">
                        <a class="dropdown-item" href="javascript:void(0);" onclick="window.document.getElementById('occupation_area').value='';window.document.getElementById('form-searh-interno').submit();">
                            Todas
                        </a>
                        @foreach ($areas_list as $areas_key => $area_value)
                            <a class="dropdown-item" href="javascript:void(0);" onclick="window.document.getElementById('occupation_area').value='{{$areas_key}}';window.document.getElementById('form-searh-interno').submit();">
                                {{$area_value}}
                            </a>
                        @endforeach
                        
                    </div>
                </li>
                @endif
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link btn-avanced2 dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span data-toggle="tooltip" data-placement="bottom" title="Adicionar">
                            <i class="fa fa-star"></i> Estrelas
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:void(0);"
                           onclick="deselectSatrFilter('#stars', '#form-searh-interno');">Exibir todas</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0);"
                           onclick="addSatrFilter('#stars', 1,'#form-searh-interno');">
                            <i class="fa fa-star"></i>
                        </a>
                        <a class="dropdown-item" href="javascript:void(0);"
                           onclick="addSatrFilter('#stars', 2,'#form-searh-interno');">
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </a>
                        <a class="dropdown-item" href="javascript:void(0);"
                           onclick="addSatrFilter('#stars', 3,'#form-searh-interno');">
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </a>
                        <a class="dropdown-item" href="javascript:void(0);"
                           onclick="addSatrFilter('#stars', 4,'#form-searh-interno');">
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                    class="fa fa-star"></i>
                        </a>
                        <a class="dropdown-item" href="javascript:void(0);"
                           onclick="addSatrFilter('#stars', 5,'#form-searh-interno');">
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                    class="fa fa-star"></i> <i class="fa fa-star"></i>
                        </a>

                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a id="navbarEtapaDropdown" class="nav-link btn-avanced2 dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span data-toggle="tooltip" data-placement="bottom" title="Adicionar">
                            <i class="fa fa-sitemap"></i> Etapa
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarEtapaDropdown">
                        <a class="dropdown-item" href="javascript:void(0);"
                           onclick="addSatrFilter('#stage_call', 'dados','#form-searh-interno');"> Dados</a>
                        <a class="dropdown-item" href="javascript:void(0);"
                           onclick="addSatrFilter('#stage_call', 'emissao','#form-searh-interno');"> Emissão</a>
                        <a class="dropdown-item" href="javascript:void(0);"
                           onclick="addSatrFilter('#stage_call', 'assinatura','#form-searh-interno');"> Assinatura</a>
                        <a class="dropdown-item" href="javascript:void(0);"
                           onclick="addSatrFilter('#stage_call', 'assinado','#form-searh-interno');"> Assinado</a>
                        <a class="dropdown-item" href="javascript:void(0);"
                           onclick="addSatrFilter('#stage_call', 'cancelado','#form-searh-interno');"> Cancelado</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a id="navbarStatusDropdown" class="nav-link btn-avanced2 dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span data-toggle="tooltip" data-placement="bottom" title="Adicionar">
                            <i class="fa fa-line-chart"></i> Status
                        </span>
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarStatusDropdown">
                        <!--
                        <a class="dropdown-item" href="javascript:void(0);"
                           onclick="selectAllFilter('#status_call', '#form-searh-interno');"  >Exibir todas</a>
                           <div class="dropdown-divider"></div>
                        -->                        
                        <a class="dropdown-item" href="javascript:void(0);"
                           onclick="deselectAllFilter('#status_call', '#form-searh-interno');">Exibir todas</a>
                        <div class="dropdown-divider"></div>
                        @foreach ($status_list as $status_key => $status_value)
                            <a class="dropdown-item" href="javascript:void(0);"
                               onclick="addSatrFilter('#status_call', '{{$status_key}}','#form-searh-interno');">
                                {{$status_value}}
                            </a>
                        @endforeach
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a id="navbarUFDropdown" class="nav-link btn-avanced2 dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span data-toggle="tooltip" data-placement="bottom" title="Adicionar">
                            <i class="fa fa-map-marker"></i> Estado
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUFDropdown">
                        <a class="dropdown-item" href="javascript:void(0);"
                           onclick="selectAllFilter('#states', '#form-searh-interno');">Exibir todas</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="javascript:void(0);"
                           onclick="deselectAllFilter('#states', '#form-searh-interno');">Remover todas</a>
                        <div class="dropdown-divider"></div>

                        @foreach ($states as $key => $value)
                            <a class="dropdown-item" href="javascript:void(0);"
                               onclick="addSatrFilter('#states', '{{$key}}','#form-searh-interno');">{{$value}}
                            </a>
                        @endforeach
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a id="navbarUFDropdown" class="nav-link btn-avanced2 dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span data-toggle="tooltip" data-placement="bottom" title="Adicionar">
                            Posição
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUFDropdown">
                        <a class="dropdown-item" href="javascript:void(0);"
                           onclick="deselectSatrFilter('#position', '#form-searh-interno');">
                            Exibir todos
                        </a>
                        <div class="dropdown-divider"></div>
                        @foreach ($changes_type as $key => $value)
                            <a class="dropdown-item" href="javascript:void(0);"
                               onclick="addSatrFilter('#position', '{{$key}}','#form-searh-interno');">
                                {{$value}}
                            </a>
                        @endforeach
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a id="navbarUFDropdown" class="nav-link btn-avanced2 dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span data-toggle="tooltip" data-placement="bottom" title="Adicionar">
                            Motivo
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUFDropdown">
                        <a class="dropdown-item" href="javascript:void(0);"
                           onclick="deselectSatrFilter('#reason', '#form-searh-interno');">
                            Exibir todos
                        </a>
                        <div class="dropdown-divider"></div>
                        @foreach ($reasons as $key => $value)
                            <a class="dropdown-item" href="javascript:void(0);"
                               onclick="addSatrFilter('#reason', '{{$key}}','#form-searh-interno');">
                                {{$value}}
                            </a>
                        @endforeach
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a id="navbarStatusDropdown" class="nav-link btn-avanced2 dropdown-toggle" href="#" role="button"
                       style="margin-right: 80px"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span data-toggle="tooltip" data-placement="bottom">
                            <i class="fa fa-line-chart"></i> Progresso
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarStatusDropdown">
                        @foreach ($call_state as $key => $value)
                            <a class="dropdown-item" href="javascript:void(0);"
                               onclick="addSatrFilter('#call_state', '{{$key}}','#form-searh-interno');">
                                {{$value}}
                            </a>
                        @endforeach
                    </div>
                </li>

                <li class="nav-item">
                    <a id="navbarUFDropdown" class="nav-link btn-avanced2" href="#" role="button">
                        Exportar &nbsp;
                        <span data-toggle="tooltip" data-placement="bottom" title="Exportar Atendimentos">
                            <i class="fa fa-file-excel-o"></i></span>
                    </a>
                </li>

                <li class="nav-item">
                    <a id="" class="nav-link btn-avanced2" href=""
                       onclick="document.getElementsByClassName('alert-tag');" role="button">
                        Limpar Filtros &nbsp;
                        <span data-toggle="tooltip" data-placement="bottom" title="Remover todos">
                           <i class="fa fa-trash"></i>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

{{-- filtros selecionados --}}
<div class="row">
    <div class="col-sm-12" id="seleted-filters">
        @isset($dataForm['date_start'])
            <div class="alert alert-tag">
                <button type="button" class="close" aria-label="Close"
                        onclick="document.getElementById('date_start').value='';document.getElementById('date_finish').value='';document.getElementById('form-searh-interno').submit();">
                    <i class="fa fa-times"></i>
                </button>
                <strong>Data de Criação</strong> {{ date('d/m/Y', strtotime($dataForm['date_start'])) }}
                - {{ date('d/m/Y', strtotime($dataForm['date_finish'])) }}
            </div>
        @endisset

        @isset($dataForm['title'])
            <div class="alert alert-tag">
                <button type="button" class="close" aria-label="Close"
                        onclick="document.getElementById('title').value='';document.getElementById('form-searh-interno').submit();">
                    <i class="fa fa-times"></i>
                </button>
                <strong>Contato</strong> {{ $dataForm['title'] }}
            </div>
        @endisset

        @isset($dataForm['occupation_area'])
            <div class="alert alert-tag">
                <button type="button" class="close" aria-label="Close"
                        onclick="document.getElementById('occupation_area').value='';document.getElementById('form-searh-interno').submit();">
                    <i class="fa fa-times"></i>
                </button>
                <strong>Área</strong> {{ $areas_list[$dataForm['occupation_area']] }}
            </div>
        @endisset

        @isset($dataForm['stars'])
            @foreach ($dataForm['stars'] as $star_item)
                <div class="alert alert-tag">
                    <button type="button" class="close" aria-label="Close"
                            onclick="deselectSatrItem('#stars', {{$star_item}},'#form-searh-interno');">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Estrelas</strong> {{$star_item}}
                </div>
            @endforeach
        @endisset

        @isset($dataForm['stage_call'])
            @foreach ($dataForm['stage_call'] as $item)
                <div class="alert alert-tag">
                    <button type="button" class="close" aria-label="Close"
                            onclick="deselectSatrItem('#stage_call', '{{$item}}','#form-searh-interno');">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Etapa</strong> {{ $item }}
                </div>
            @endforeach
        @endisset

        @isset($dataForm['status_call'])
            @foreach ($dataForm['status_call'] as $status_call_item)
                <div class="alert alert-tag">
                    <button type="button" class="close" aria-label="Close"
                            onclick="deselectSatrItem('#status_call', '{{$status_call_item}}','#form-searh-interno');">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Status</strong> {{ $status_call_item }}
                </div>
            @endforeach
        @endisset

        @isset($dataForm['states'])
            @foreach ($dataForm['states'] as $key => $value)
                <div class="alert alert-info alert-tag">
                    <button type="button" class="close" aria-label="Close"
                            onclick="deselectSatrItem('#states', '{{$key}}','#form-searh-interno');">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Estado</strong> {{ $value }}
                </div>
            @endforeach
        @endisset

        @isset($dataForm['position'])
            @foreach ($dataForm['position'] as $position_item)
                <div class="alert alert-tag">
                    <button type="button" class="close" aria-label="Close"
                            onclick="deselectSatrItem('#position', '{{$position_item}}','#form-searh-interno');">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Posição</strong> {{ $changes_type[$position_item] }}
                </div>
            @endforeach
        @endisset

        @isset($dataForm['reason'])
            @foreach ($dataForm['reason'] as $reason_item)
                <div class="alert alert-tag">
                    <button type="button" class="close" aria-label="Close"
                            onclick="deselectSatrItem('#reason', '{{$reason_item}}','#form-searh-interno');">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Motivo</strong> {{ $reasons[$reason_item] }}
                </div>
            @endforeach
        @endisset

        @isset($dataForm['call_state'])
            @foreach ($dataForm['call_state'] as $call_state_item)
                <div class="alert alert-tag">
                    <button type="button" class="close" aria-label="Close"
                            onclick="deselectSatrItem('#call_state', '{{$call_state_item}}','#form-searh-interno');">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Motivo</strong> {{ $call_state[$call_state_item] }}
                </div>
            @endforeach
        @endisset

    </div>
</div>