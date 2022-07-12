<div class="box-upload m-b-25">
    <div class="row">
        <div class="col-9 col-12-xsmall">
            @if(isset($item->type) && $item->type == 'd4sign')
                <a href="javascript:void(0);" data-toggle="modal" data-target="#d4signDoc{{$item->cdid}}{{$has_modal}}Modal" class="box-input-file">
                    
                </a>
                <h3 data-toggle="modal" data-target="#d4signDoc{{$item->cdid}}{{$has_modal}}Modal" class="cursor-pointer">{{$item->cdtitle}}</h3>
            @elseif (is_null($item->file))
                <a href="javascript:void(0);" data-toggle="modal" data-target="#uploadDoc{{$item->cdid}}{{$has_modal}}Modal" class="box-input-file">
                    
                </a>
                <h3 data-toggle="modal" data-target="#uploadDoc{{$item->cdid}}{{$has_modal}}Modal" class="cursor-pointer">{{$item->cdtitle}}</h3>
            @else
                <div @if($item->cdstatus == 'approved') title="arquivo aprovado" class="box-upload-success" @elseif($item->cdstatus == 'disapproved') title="arquivo reprovado" class="box-upload-error" @else title="Aguardando revisão"  class="box-upload-wait" @endif>
                    
                </div>
                <h3>{{$item->cdtitle}}</h3>
            @endif
            
            @if($item->cdstatus == 'disapproved')
                <p class="text-danger">{{$item->reason}}</p>
            @endif
            @if (!is_null($item->file))
                <button type="button" class="btn btn-default mb-10 iverse" onclick="location.href='{{route('client.document_client', ['call_document' => $item->cdid])}}';">Visualizar</button>
            @endif
        </div>
        @if (!is_null($item->file))
        <div class="col-3 col-12-xsmall text-right alignbuttom">
            @if($item->cdstatus != 'approved')
            {{ Form::open(['route' => ['client.documentos.document_remove',$item->cdid], 'method' => 'DELETE', 'id' => 'frm-delete-'.$item->cdid ]) }}
                <a href="javascript:void(0);" data-toggle="modal" data-target="#uploadDoc{{$item->cdid}}{{$has_modal}}Modal" class="text-uppercase dis-block w-full">Substituir</a>
            {{ Form::close() }}
            @endif
        </div>
        @endif
    </div>
    
</div>