@extends('admin.layout.app')

@section('content')

<div class="container-fluid">    
    <div class="row">
        <div class="col-sm-4 text-left fs-12">
            <strong class="fs-24">{{$client->name}}</strong>
            <p class="mb-1">Criado em {{$client->created_at}}</p>
            <span class="label bg-gray">{{$client->profile}}</span> 

        </div> 
        <div class="col-sm-4 text-right">
            <a href="{{ url()->previous() }}" class="text-primary pr-3" title="Voltar">Voltar</a>

            <a href="{{ route('admin.clients.edit', ['client' => $client->id]) }}" title="" data-toggle="tooltip" data-placement="top" data-original-title="editar" class="mr-2">
                <i class="fa fa-pencil m-r-5"></i>
            </a>
            
            <a href="{{ route('admin.clients.destroy', ['client' => $client->id]) }}" data-toggle="tooltip" data-placement="top" title="" 
                data-original-title="Excluir" class="sweet-confirm" rid="25" onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete{{$client->id}}').submit();}">
                <i class="fa fa-trash"></i>
            </a>
            {{ Form::open(['route' => ['admin.clients.destroy',$client->id], 'method' => 'DELETE', 'id' => 'form-delete'.$client->id ]) }}
            {{ Form::close() }}
        </div>   
    </div>  
</div>

                      
<div class="col-sm-8 text-right page-show pt-5">
    <ul class="nav nav-tabs md-tabs" role="tablist">
        <li class="nav-item active">
            <a class="nav-link active" data-toggle="tab" href="#info-client" role="tab">
                Cadastro
                <div class="slide"></div>
            </a>            
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#info-call" role="tab">
                Atendimento
                <div class="slide"></div>
            </a>            
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#info-case" role="tab">
                Casos
                <div class="slide"></div>
            </a>            
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#info-process" role="tab">
                Processos
                <div class="slide"></div>
            </a>            
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#info-fees" role="tab">
                Honorários
                <div class="slide"></div>
            </a>            
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#info-notification" role="tab">
                Notificações
                <div class="slide"></div>
            </a>            
        </li>
    </ul>

    <div class="tab-content card-block">
        <div class="tab-pane active fs-12" id="info-client" role="tabpanel">
            <div class="row pb-1">
                <div class="col-sm-3 text-right text-uppercase">
                    FOTO DO PERFIL
                </div>
                <div class="col-sm-9 text-left fs-14">
                    {{ Form::file('attachment', ['class' => 'ifileico', 'onchange' => 'upload_user(this,"'.route('upload-image').'","#box-imaguser", "clients", "'.$client->id.'");']) }}
                    <label size="70" class="css-1jlwb56 e1se5yzp1 mr-3 pull-left">
                        <div id="box-imaguser">
                        @if (is_null($client->image))
                            <div id="box-image-profile" userid="{{$client->id}}">
                                <i class="fa-camera e1se5yzp2 css-bq3ljn-IconComponent e11c20nv0"></i>
                            </div>  
                        @else
                            <img src="{{ url("storage/clients/".$client->image) }}" alt="{{$client->name}}" width="70" height="70">
                        @endif
                        </div>                         
                    </label>                     
                    <i class="text-primary fs-13">
                        Enviar nova foto<br /> 
                        <span class="text-grey">ou</span>                        
                    </i><br />
                    <i class="text-primary fs-13 lk-removeimage">
                        <a href="{{ route('admin.clients.remove.picture', ['client' => $client->id]) }}" class="text-primary" onclick="event.preventDefault();if(confirm('Deseja excluir esta foto?')){document.getElementById('form-delete.picture{{$client->id}}').submit();}">
                            Remover foto atual
                        </a>
                    </i>
                    {{ Form::open(['route' => ['admin.clients.remove.picture',$client->id], 'method' => 'POST', 'id' => 'form-delete.picture'.$client->id ]) }}
                    {{ Form::close() }}
                </div>
            </div>
            <span class="css-divider"></span>
            <div class="row pb-1">
                <div class="col-sm-3 text-right text-uppercase">
                    Apelido
                </div>
                <div class="col-sm-9 text-left fs-14">
                    {{$client->nickname}}
                </div>
            </div>
            <div class="row pb-1">
                <div class="col-sm-3 text-right text-uppercase">
                    NASCIMENTO
                </div>
                <div class="col-sm-9 text-left fs-14">
                    {{$client->date_birth_br}}
                </div>
            </div>
            <div class="row pb-1">
                <div class="col-sm-3 text-right text-uppercase">
                    ESTADO CIVIL
                </div>
                <div class="col-sm-9 text-left fs-14">
                    {{$client->marital_status}}
                </div>
            </div>
            <span class="css-divider"></span>
            <div class="row pb-1">
                <div class="col-sm-3 text-right text-uppercase">
                    EMAIL
                </div>
                <div class="col-sm-9 text-left fs-14">
                    <a href="mailto:{{$client->email}}">{{$client->email}}</a>
                </div>
            </div>
            <div class="row pb-1">
                <div class="col-sm-3 text-right text-uppercase">
                    Telefone
                </div>
                <div class="col-sm-9 text-left fs-14">
                    {{$client->ddi ?? '55'}} {{$client->phone_formated}} {{$client->operator}}
                </div>
            </div>
            <span class="css-divider"></span>
            <div class="row pb-1">
                <div class="col-sm-3 text-right text-uppercase">
                    ENDEREÇO
                </div>
                <div class="col-sm-9 text-left fs-14">
                    {{$client->addressstreet}}, {{$client->addressnumber}} {{$client->addresscomplement}} - {{$client->addressdistrict}} - {{$client->addresscity}}/{{$client->addressstate}} - {{$client->addresscep}}
                </div>
            </div>
            <span class="css-divider"></span>
            <div class="row pb-1">
                <div class="col-sm-3 text-right text-uppercase">
                    CPF
                </div>
                <div class="col-sm-9 text-left fs-14">
                    {{$client->cpf_formated}}
                </div>
            </div>
            <div class="row pb-1">
                <div class="col-sm-3 text-right text-uppercase">
                    RG
                </div>
                <div class="col-sm-9 text-left fs-14">
                    {{$client->rg}}
                </div>
            </div>
            <div class="row pb-1">
                <div class="col-sm-3 text-right text-uppercase">
                    DATA DE EXPEDIÇÃO
                </div>
                <div class="col-sm-9 text-left fs-14">
                    {{$client->expeditiondate_br}}
                </div>
            </div>
            <div class="row pb-1">
                <div class="col-sm-3 text-right text-uppercase">
                    CTPS
                </div>
                <div class="col-sm-9 text-left fs-14">
                    {{$client->ctps}}
                </div>
            </div>
            <div class="row pb-1">
                <div class="col-sm-3 text-right text-uppercase">
                    CNH
                </div>
                <div class="col-sm-9 text-left fs-14">
                    {{$client->cnh}}
                </div>
            </div>
            <div class="row pb-1">
                <div class="col-sm-3 text-right text-uppercase">
                    Título de eleitor
                </div>
                <div class="col-sm-9 text-left fs-14">
                    {{$client->voterdocument}}
                </div>
            </div>
            <span class="css-divider"></span>
            <div class="row pb-1">
                <div class="col-sm-3 text-right text-uppercase">
                    Profissão
                </div>
                <div class="col-sm-9 text-left fs-14">
                    {{$client->job}}
                </div>
            </div>
            <div class="row pb-1">
                <div class="col-sm-3 text-right text-uppercase">
                    Nacionalidade
                </div>
                <div class="col-sm-9 text-left fs-14">
                    {{$client->nacionality}}
                </div>
            </div>
            <div class="row pb-1">
                <div class="col-sm-3 text-right text-uppercase">
                    Nome do pai
                </div>
                <div class="col-sm-9 text-left fs-14">
                    {{$client->fathersname}}
                </div>
            </div>
            <div class="row pb-1">
                <div class="col-sm-3 text-right text-uppercase">
                    Nome da mãe
                </div>
                <div class="col-sm-9 text-left fs-14">
                    {{$client->mothersname}}
                </div>
            </div>
            <span class="css-divider"></span>
            <div class="row pb-1">
                <div class="col-sm-3 text-right text-uppercase">
                    Comentários
                </div>
                <div class="col-sm-9 text-left fs-14">
                    {{$client->note}}
                </div>
            </div>

        </div>
        <div class="tab-pane text-left pl-2 pr-2" id="info-call" role="tabpanel">
            @forelse( $calls as $call )
                @include('admin.pages.calls._list')
            @empty
                <div class="card-header">
                    <h5>Nenhum Resultado! </h5>               
                </div>
            @endforelse
        </div>
        <div class="tab-pane text-left pl-2 pr-2" id="info-case" role="tabpanel">
            <table class="table table-bordered verticle-middle">
                <thead>
                    <tr>
                        <th scope="col" width="40">
                            #
                        </th> 
                        <th scope="col" width="40">
                            <input type="checkbox" class="checkItem0">
                        </th>                
                        <th scope="col" class="" width="70">
                            Caso
                        </th> 
                        <th scope="col" class="" width="100">
                            Triagem
                        </th> 
                        <th scope="col" class="">
                            Requerente
                        </th> 
                        <th scope="col" class="" width="150">
                            Progresso
                        </th> 
                        <th scope="col" class="" width="185">
                            Etapa Documental
                        </th>  
                        <th scope="col" class="" width="100">
                            Financeiro
                        </th>        
                        <th scope="col" width="65">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                @forelse( $cases as $call )
                    @include('admin.pages.cases._list')
                @empty
                    <tr>
                        <td colspan="4">
                            <p>Nenhum Resultado!</p>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="tab-pane text-left pl-2 pr-2" id="info-process" role="tabpanel">
            <table class="table table-bordered verticle-middle">
                <thead>
                    <tr>
                        <th scope="col" width="40">
                            #
                        </th> 
                        <th scope="col" width="40">
                            <input type="checkbox" class="checkItem0">
                        </th>                
                        <th scope="col" class="" width="110">
                            Processo
                        </th> 
                        <th scope="col" class="" width="100">
                            Duração
                        </th> 
                        <th scope="col" class="">
                            Requerente
                        </th> 
                        <th scope="col" class="" width="50">
                            Status
                        </th> 
                        <th scope="col" class="" width="185">
                            Andamento
                        </th>  
                        <th scope="col" class="" width="100">
                            Financeiro
                        </th>        
                        <th scope="col" width="65">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                @forelse( $process as $call )
                    @include('admin.pages.process._list')
                @empty
                    <tr>
                        <td colspan="8">
                            <p>Nenhum Resultado!</p>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="info-fees" role="tabpanel">

        </div>
        <div class="tab-pane" id="info-notification" role="tabpanel">

        </div>
    </div>
</div>


@endsection