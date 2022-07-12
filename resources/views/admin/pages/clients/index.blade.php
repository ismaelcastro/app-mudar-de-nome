@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Contatos</h1>
        <a href="{{ route('admin.clients.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
            ADICIONAR
        </a>
    </div>
</div>

@include('admin.pages.clients._filter')

<div class="list-info-page">
    @if($clients instanceof \Illuminate\Pagination\LengthAwarePaginator )
        <p>Mostrando de {{ $clients->appends($dataForm)->firstItem() }} até {{ $clients->appends($dataForm)->lastItem() }} registros de um total de {{ $clients->appends($dataForm)->total() }}</p>
    @endif
</div>

<div class="table-responsive"> 
    <table class="table table-bordered verticle-middle">
        <thead>
            <tr>
                <th scope="col" width="40">
                    <input type="checkbox" class="checkItem0">
                </th>
                <th scope="col" width="55">Tipo</th>
                @if(auth()->user()->id == 1 || auth()->user()->id == 4)
                <th scope="col" width="100">Mautic ID</th>
                @endif
                <th scope="col" class="" data-original-title="Ordenar pelo nome" data-toggle="tooltip" data-placement="bottom">
                    @if( isset($dataForm['ord']) && $dataForm['ord']=='name;desc')
                        <a href="javascript:void(0);" onclick="document.getElementById('ord').value='name;asc';document.getElementById('form-searh-interno').submit();" class="text-primary ordenar-desc">Nome</a>
                    @else
                        <a href="javascript:void(0);" onclick="document.getElementById('ord').value='name;desc';document.getElementById('form-searh-interno').submit();" class="text-primary ordenar">Nome</a>
                    @endif 
                </th>
                <th scope="col" width="40">DDI</th>
                <th scope="col" width="40">DDD</th>
                <th scope="col">Telefone</th>
                <th scope="col">E-mail</th>                          
                <th scope="col" width="65">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @forelse( $clients as $client )
            <tr>
                <td>
                    <input type="checkbox" name="checkItem[]" class="checkItem" value="25">
                </td>
                <td>
                    <i class="fa fa-user fa-lg color-lead white-tooltip" title="" data-original-title="{{ $client->profile}}" data-toggle="tooltip" data-placement="right" style="color:{{ $profile_color[$client->profile] }}"></i>
                </td>
                @if(auth()->user()->id == 1 || auth()->user()->id == 4)
                <td>
                    {{$client->mautic_id}}
                </td>
                @endif
                <td>
                    <a href="{{ route('admin.clients.show', ['client' => $client->id]) }}" title="{{$client->name}}" class="text-primary-inverse">
                        {{$client->name}}
                    </a>                    
                    {{$client->job}}                                
                </td>
                <td>
                    @if (!is_null($client->ddi))
                        {{$client->ddi}}
                    @else
                        55
                    @endif                    
                </td>
                <td>{{$client->ddd}}</td>
                <td>  
                    <a href="https://web.whatsapp.com/send?phone=+55{{$client->ddd}}{{$client->phone_clean2}}&text=Olá, gostaria de mais informações" class="text-dark">                                   
                        {{$client->phone_clean}}
                    </a>
                    <span class="badge-xs">{{$client->type_enum}}</span>
                </td>
                <td>
                    <a href="mailto:{{$client->email}}" class="text-dark">
                        {{$client->email}}
                    </a>
                </td>
                <td>
                    <span class="action-table">
                        <a href="{{ route('admin.clients.edit', ['client' => $client->id]) }}" title="" data-toggle="tooltip" data-placement="top" data-original-title="editar" class="mr-2">
                            <i class="fa fa-pencil m-r-5"></i>
                        </a>
                        
                        <a href="{{ route('admin.clients.destroy', ['client' => $client->id]) }}" data-toggle="tooltip" data-placement="top" title="" 
                            data-original-title="Excluir" class="sweet-confirm" rid="25" onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete{{$client->id}}').submit();}">
                            <i class="fa fa-trash"></i>
                        </a>
                        {{ Form::open(['route' => ['admin.clients.destroy',$client->id], 'method' => 'DELETE', 'id' => 'form-delete'.$client->id ]) }}
                        {{ Form::close() }}
                    </span>
                </td>
            </tr>                            
            @empty
            <tr>
                <td colspan="7">
                    <p>Nenhum Resultado!</p>
                </td>
            </tr>
            @endforelse                      
        </tbody>
    </table>
    @if($clients instanceof \Illuminate\Pagination\LengthAwarePaginator )
        {{$clients->appends($dataForm)->links()}}
    @endif
</div>


@endsection