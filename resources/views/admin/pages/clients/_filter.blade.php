<div class="row">
    <div class="col-sm-8 pr-0">
        {{ Form::open(['route' => 'admin.clients.search', 'id' => 'form-searh-interno' ]) }}
        <input type="hidden" name="char" id="char" @isset($dataForm['char']) value="{{ $dataForm['char'] }}" @endisset>
        <input type="hidden" name="state" id="state" @isset($dataForm['state']) value="{{ $dataForm['state'] }}" @endisset>
        <input type="hidden" name="ord" id="ord" @isset($dataForm['ord']) value="{{ $dataForm['ord'] }}" @endisset>
        <input type="hidden" name="profile" id="profile" @isset($dataForm['profile']) value="{{ $dataForm['profile'] }}" @endisset>

        <div class="box-filter filter-bar">
            <ul class="nav navbar-nav pl-4">
                <li class="nav-item filter-char">                    
                    <a href="javascript:void(0);" @if (!isset($dataForm['char'])) class="active" @endif onclick="document.getElementById('char').value='';document.getElementById('form-searh-interno').submit();">Todos</a>
                    @foreach (range('A', 'Z') as $char)
                        <a href="javascript:void(0);" @if(@isset($dataForm['char']) && $dataForm['char'] == $char ) class="active" @endif onclick="document.getElementById('char').value='{{ $char }}';document.getElementById('form-searh-interno').submit();">{{ $char }}</a>
                    @endforeach
                </li>
                <li class="nav-item box-filter-search">
                   <input type="text" name="searh-interno" id="searh-interno" @isset($dataForm['searh-interno']) value="{{ $dataForm['searh-interno'] }}" @endisset class="filter-field" placeholder="Encontre um contato">
                   <button class="btn-search" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </li>
            </ul>
        </div>       
        {{ Form::close() }}

    </div>
    <div class="col-sm-4 pl-0">
        <div class="box-options">
            <ul class="nav">
                <li class="nav-item dropdown">
                    <a id="navbarUFDropdown" class="nav-link btn-avanced2 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span data-toggle="tooltip" data-placement="bottom" title="Adicionar">
                            <i class="fa fa-user"></i> Perfil
                        </span>                                
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUFDropdown">
                        <a class="dropdown-item" href="javascript:void(0);" 
                        onclick="document.getElementById('profile').value='';document.getElementById('form-searh-interno').submit();">
                        Exibir todos
                        </a>
                        <div class="dropdown-divider"></div>
                        @foreach ($profile_color as $key => $value)
                        <a class="dropdown-item" href="javascript:void(0);" 
                        onclick="document.getElementById('profile').value='{{$key}}';document.getElementById('form-searh-interno').submit();">
                            {{$key}}
                        </a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarUFDropdown" class="nav-link btn-avanced2 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span data-toggle="tooltip" data-placement="bottom" title="Adicionar">
                            <i class="fa fa-map-marker"></i> Estados
                        </span>                                
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUFDropdown">
                        <a class="dropdown-item" href="javascript:void(0);" 
                        onclick="document.getElementById('state').value='';document.getElementById('form-searh-interno').submit();">
                        Exibir todos
                        </a>
                        <div class="dropdown-divider"></div>
                        @foreach ($states as $key => $value)
                        <a class="dropdown-item" href="javascript:void(0);" 
                        onclick="document.getElementById('state').value='{{$key}}';document.getElementById('form-searh-interno').submit();">
                            {{$value}}
                        </a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <a id="navbarUFDropdown" class="nav-link btn-avanced2" href="#" role="button" >
                        <span data-toggle="tooltip" data-placement="bottom" title="Adicionar">
                            <i class="fa fa-file-excel-o"></i> Exportar Contatos
                        </span>                                
                    </a>
                </li>
                @if(auth()->user()->id == 1 || auth()->user()->id == 4)
                <li class="nav-item">
                    <a id="navbarUFDropdown" class="nav-link btn-avanced2" href="{{route('admin.clients.sinc_mautic')}}" role="button" target="_blank" >
                        <span data-toggle="tooltip" data-placement="bottom" title="Sincronizar Mautic">
                            Sinc. Mautic
                        </span>                                
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>





<div class="row">
    <div class="col-sm-12 pt-2">

        @isset($dataForm['searh-interno'])
        <div class="alert alert-info alert-tag">
            <button type="button" class="close" aria-label="Close" onclick="document.getElementById('searh-interno').value='';document.getElementById('form-searh-interno').submit();">
                <i class="fa fa-times"></i>
            </button>
            <strong>Palavra</strong> {{ $dataForm['searh-interno'] }}
        </div>
        @endisset

        @isset($dataForm['char'])
        <div class="alert alert-info alert-tag">
            <button type="button" class="close" aria-label="Close" onclick="document.getElementById('char').value='';document.getElementById('form-searh-interno').submit();">
                <i class="fa fa-times"></i>
            </button>
            <strong>Letra</strong> {{ $dataForm['char'] }}
        </div>
        @endisset

        @isset($dataForm['profile'])
        <div class="alert alert-info alert-tag">
            <button type="button" class="close" aria-label="Close" onclick="window.document.getElementById('profile').value = '';document.getElementById('form-searh-interno').submit();">
                <i class="fa fa-times"></i>
            </button>
            <strong>Perfil</strong> {{ $dataForm['profile'] }}
        </div>
        @endisset

        @isset($dataForm['state'])
        <div class="alert alert-info alert-tag">
            <button type="button" class="close" aria-label="Close" onclick="document.getElementById('state').value='';document.getElementById('form-searh-interno').submit();">
                <i class="fa fa-times"></i>
            </button>
            <strong>Estado</strong> {{ $states[$dataForm['state']] }}
        </div>
        @endisset


    </div>
</div>