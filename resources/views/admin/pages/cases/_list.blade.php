<tr>
    <td>
        {{$call->id}}
    </td>
    <td>
        <input type="checkbox" name="checkItem[]" class="checkItem" value="25">
    </td>                
    <td align="center">
        @if(isset($call->reason->name))                           
        <i class="fa fa-folder auto-lawsuit" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $call->reason->name }}" style="color:{{ $call->reason->color }};"></i>
        @endif
    </td>
    <td align="center">
        {!! $call->screening !!}
    </td>
    <td>
        <a href="{{ route('admin.cases.show', ['call' => $call->id]) }}" class="show text-dark">
            {{$call->client->name}}
        </a>
    </td>
    <td>
        <div class="progress rounded-round">											
            <div class="progress-bar bg-warning" style="width: {{$call->progress}}%;background-color:{{$call->progresscolor}} !important">
                <span>{{$call->progress}}%</span>
            </div>                                
        </div>
    </td>
    <td>                                
        @include('admin.pages.cases._case_stages', ['stages' => $call->stage_case])
    </td>
    <td align="center">
        @switch($call->paymentform)
            @case('gerencianet')
                <img src="{{asset('assets-adm/images/svgs/thumbs-up-hand-symbol.svg')}}" alt="gerencianet" height="18">
                @break

            @case('adexitum')
                <img src="{{asset('assets-adm/images/svgs/auction.svg')}}" alt="adexitum" height="18">
                @break

           @case('deposito') 
                <img src="{{asset('assets-adm/images/svgs/paper-in-an-envelope-to-make-a-deposit-in-a-bank.svg')}}" alt="deposito" height="18">
                @break
        @endswitch
    </td>               
    <td>
        <span class="action-table">
            <a href="#" data-toggle="dropdown" class="mr-2" id="navbaractionsDropdown">
                <i class="fa fa-ellipsis-v fa-lg"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbaractionsDropdown">                            
                <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_guias" class="dropdown-item">
                    <img src="{{asset('assets-adm/images/logoTjsp.png')}}" width="30" alt="Guias Juridicas" style="margin:14px 0px;">
                    Guias Juridicas
                </a>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_certidao" class="dropdown-item" >
                    <img src="{{asset('assets-adm/images/svgs/diploma.svg')}}" height="25" alt="Certidões Negativas">
                    Certidões Negativas
                </a>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_email" class="dropdown-item">
                    <img src="{{asset('assets-adm/images/svgs/mail-send.svg')}}" height="25" alt="Enviar E-mail">
                    Enviar E-mail
                </a>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#modal_peticao" class="dropdown-item">
                    <img src="{{asset('assets-adm/images/svgs/signing-the-contract.svg')}}" height="25" alt="Elaborar Petição">
                    Elaborar Petição
                </a>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#calltask-Modal" class="dropdown-item">
                    <img src="{{asset('assets-adm/images/svgs/confirm-schedule.svg')}}" height="25" alt="Nova Tarefa">
                    Nova Tarefa
                </a>
                <a href="https://web.whatsapp.com/send?phone=5511950755592&amp;text=Priscila,%20Tudo%20bom?" class="dropdown-item" target="WhatsApp">
                    <img src="{{asset('assets-adm/images/svgs/whatsapp-logo-variant.svg')}}" height="25" alt="Whatsapp">
                    Whatsapp
                </a>
            </div>
            
        </span>
    </td>
</tr>