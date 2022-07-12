<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Instruções de envio {{$client->name}}</h4>
        </div>
        <div class="modal-body">
            <div class="p-t-40 p-b-40 p-l-40 p-r-40 fs-24">
                
                <div class="row gtr-uniform">
                    <div id='signature-div2'>                
                        <div class="col-12 ico_msg_contract">
                            <p>{{$item->subscription_info}}</p>
                            <p class="text-danger"> 
                                {{$item->subscription_info2}}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div id="lista-assinatura" class="ibox-content profile-content text-left">
                            @if(isset($item->subscribers))
                            <table class="table" style="margin-bottom: 0px;">
                                <tbody>
                                    @foreach ($item->subscribers as $subscriber)
                                    <tr>
                                        <td class="project-status text-center td_drag" style="border-bottom: 0px; width: 20px; padding-top: 10px;">
                                            <i class="fa fa-check fa-3x ico_signer_check @if($subscriber['status'] == 'ASSINOU') assinado @endif" aria-hidden="true"></i> 
                                            @if($subscriber['status'] == 'ASSINAR')
                                            <a href="javascript:void(0);" onclick="reenviar_assinatura(this,{{$subscriber['client_id']}},{{$item->cdid}});" class="text-primary d-none">
                                                <i class="fa fa-envelope" data-placement="right" aria-hidden="true"></i>
                                            </a>
                                            @endif
                                        </td>
                                        <td class="text-left" style="border-bottom: 0px;">
                                            <div style="width: 100%;" class="wrapww">
                                                {{$subscriber['name']}}
                                                <h5>
                                                    @if($subscriber['status'] == 'ASSINAR')
                                                    <a id="bounce_17700747" href="#">
                                                        <i class="fa fa-check fa-1x @if($subscriber['email_sent'] == '1') color-verde @endif" data-placement="top" data-toggle="tooltip" data-original-title="O e-mail foi entregue ao signatário" title="O e-mail foi entregue ao signatário" aria-hidden="true"></i>&nbsp;
                                                    </a>
                                                    @endif
                                                    {{$subscriber['email']}}
                                                </h5>
                                                <span class="label @if($subscriber['status'] == 'ASSINAR') label-assinar @else label-finalizado @endif" data-placement="top" data-toggle="tooltip" data-original-title="Assinar">
                                                    {{$subscriber['status']}}
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>