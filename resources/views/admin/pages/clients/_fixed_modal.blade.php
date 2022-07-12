<div class="modal fade" id="fixed-cliente{{$client->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <span class="text-primary fs-14">{{$client->profile}}</span> <br/>
                    {{$client->name}}
                </h4>
                <a href="{{ route('admin.clients.edit', ['client' => $client->id]) }}" class="pull-right">
                    <i class="fa fa-pencil e19v1yl80 css-cyngeh-IconComponent fs-14" data-test="icon"
                       data-testid="icon-fa-pencil"></i>
                </a>
            </div>
            <div class="modal-body">

                <div class="row pb-1">
                    <div class="col-sm-3 text-right text-uppercase">
                        Nome
                    </div>
                    <div class="col-sm-9 text-left fs-14">                       
                        <input type="text" value="{{$client->name ?? ' '}}" id="cp_name_{{$client->id}}" readonly style="border: 0;color: #6c757d;min-width: 450px;">                       
                        <a href="javascript:void(0);" class="pull-right" onclick="copy_field('cp_name_{{$client->id}}');">
                            <i class="fa fa-copy"></i>
                        </a>
                    </div>
                </div>

                <div class="row pb-1">
                    <div class="col-sm-3 text-right text-uppercase">
                        Nacionalidade
                    </div>
                    <div class="col-sm-9 text-left fs-14">
                        <a href="javascript:void(0);">
                            {{$client->nacionality ?? ' '}}
                        </a>
                    </div>
                </div>

                <div class="row pb-1">
                    <div class="col-sm-3 text-right text-uppercase">
                        ESTADO CIVIL
                    </div>
                    <div class="col-sm-9 text-left fs-14">
                        <a href="javascript:void(0);">
                            {{$client->marital_status ?? ' '}}
                        </a>
                    </div>
                </div>

                <span class="css-divider"></span>
                <div class="row pb-1">
                    <div class="col-sm-3 text-right text-uppercase">
                        CPF
                    </div>
                    <div class="col-sm-9 text-left fs-14"> 
                        <input type="text" value="{{$client->cpf_formated ?? '  '}}" id="cp_cpf_{{$client->id}}" readonly style="border: 0;color: #6c757d;min-width: 450px;">                       
                        <a href="javascript:void(0);" class="pull-right" onclick="copy_field('cp_cpf_{{$client->id}}');">
                            <i class="fa fa-copy"></i>
                        </a>
                    </div>
                </div>

                <div class="row pb-1">
                    <div class="col-sm-3 text-right text-uppercase">
                        RG
                    </div>
                    <div class="col-sm-9 text-left fs-14">
                        <input type="text" value="{{$client->rg ?? '  '}}" id="cp_rg_{{$client->id}}" readonly style="border: 0;color: #6c757d;min-width: 450px;">                       
                        <a href="javascript:void(0);" class="pull-right" onclick="copy_field('cp_rg_{{$client->id}}');">
                            <i class="fa fa-copy"></i>
                        </a>
                    </div>
                </div>

                <div class="row pb-1">
                    <div class="col-sm-3 text-right text-uppercase">
                        DATA DE EXPEDIÇÃO
                    </div>
                    <div class="col-sm-9 text-left fs-14">
                        <a href="javascript:void(0);">
                            {{$client->expeditiondate_br ?? '  '}}
                        </a>
                    </div>
                </div>

                <span class="css-divider"></span>
                <div class="row pb-1">
                    <div class="col-sm-3 text-right text-uppercase">
                        ENDEREÇO
                    </div>
                    <div class="col-sm-9 text-left fs-14">
                        @if($client->addressstreet)
                            @php
                                $addr = $client->addressstreet.', '.$client->addressnumber.' '.$client->addresscomplement.' - '.$client->addressdistrict.' - '.$client->addresscity.'/'.$client->addressstate.' - '.$client->addresscep;
                            @endphp
                        @endif
                        <input type="text" value="{{$addr ?? '  '}}" id="cp_address_{{$client->id}}" readonly style="border: 0;color: #6c757d;min-width: 450px;">                       
                        <a href="javascript:void(0);" class="pull-right" onclick="copy_field('cp_address_{{$client->id}}');">
                            <i class="fa fa-copy"></i>
                        </a>
                    </div>
                </div>

                <div class="row pb-1">
                    <div class="col-sm-3 text-right text-uppercase">
                        Maior de Idade
                    </div>
                    <div class="col-sm-9 text-left fs-14">
                        <a href="javascript:void(0);">
                            {{$client->is_adulthood ? "Sim" : "Não"}}
                        </a>
                    </div>
                </div>
                @if($client->email)
                    <div class="row pb-1">
                        <div class="col-sm-3 text-right text-uppercase">
                            EMAIL
                        </div>
                        <div class="col-sm-9 text-left fs-14">
                            <a href="mailto:{{$client->email}}" >
                                <input type="text" value="{{$client->email ?? '  '}}" id="cp_mail_{{$client->id}}" readonly style="border: 0;color: #6c757d;min-width: 450px;">                       
                            </a>
                            <a href="javascript:void(0);" class="pull-right" onclick="copy_field('cp_mail_{{$client->id}}');">
                                <i class="fa fa-copy"></i>
                            </a>
                        </div>
                    </div>
                @endif

                @if($client->phone)
                    <div class="row pb-1">
                        <div class="col-sm-3 text-right text-uppercase">
                            Telefone
                        </div>
                        <div class="col-sm-9 text-left fs-14">
                            <input type="text" value="{{$client->phone}} {{$client->operator}}" id="cp_phone_{{$client->id}}" readonly style="border: 0;color: #6c757d;min-width: 450px;">                       
                            <a href="javascript:void(0);" class="pull-right" onclick="copy_field('cp_phone_{{$client->id}}');">
                                <i class="fa fa-copy"></i>
                            </a>
                        </div>
                    </div>
                @endif

                @if($client->ctps)
                    <div class="row pb-1">
                        <div class="col-sm-3 text-right text-uppercase">
                            CTPS
                        </div>
                        <div class="col-sm-9 text-left fs-14">
                            <a href="javascript:void(0);">
                                {{$client->ctps}}
                            </a>
                        </div>
                    </div>
                @endif

                @if($client->cnh)
                    <div class="row pb-1">
                        <div class="col-sm-3 text-right text-uppercase">
                            CNH
                        </div>
                        <div class="col-sm-9 text-left fs-14">
                            <a href="javascript:void(0);">
                                {{$client->cnh}}
                            </a>
                        </div>
                    </div>
                @endif

                @if($client->voterdocument)
                    <div class="row pb-1">
                        <div class="col-sm-3 text-right text-uppercase">
                            Título de eleitor
                        </div>
                        <div class="col-sm-9 text-left fs-14">
                            <a href="javascript:void(0);">
                                {{$client->voterdocument}}
                            </a>
                        </div>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <a href="{{ route('admin.clients.show', ['client' => $client->id]) }}" class="text-primary fs-13">
                    VER DETALHES
                    <i class="fa fa-external-link-square css-d9cyux-Icon-style ml-1 fs-14" content="Ver detalhes"></i>
                </a>
            </div>
        </div>
    </div>
</div>