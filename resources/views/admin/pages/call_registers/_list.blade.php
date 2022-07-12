<tr>          
    <td align="center">        
        <i class="fa fa-lg color-info @if($call_register->user_id ||$call_register->client_id ) fa-user @else fa-cloud @endif"></i>
    </td>
    <td>
        {{$call_register->created_date}}        
    </td>
    <td>
        {!! $call_register->description !!} <br>
        <a href="javascript:void(0);" class="text-primary">{{ $call_register->call->client->name }}</a>
    </td> 
</tr>