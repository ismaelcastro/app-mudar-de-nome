@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Histórico</h1>
    </div>
</div>


@include('admin.pages.call_registers._filter')

<div class="list-info-page">
    @if($call_registers instanceof \Illuminate\Pagination\LengthAwarePaginator )
        <p>Mostrando de {{ $call_registers->firstItem() }} até {{ $call_registers->lastItem() }} registros de um total de {{ $call_registers->total() }}</p>
    @endif
</div>

<div class="table-responsive"> 
    <table class="table table-bordered verticle-middle">
        <thead>
            <tr> 
                <th width="70">&nbsp;</th>       
                <th scope="col" class="" width="120">
                    @if( isset($dataForm['ord']) && $dataForm['ord']=='reasons.name;desc')
                        <a href="javascript:void(0);" onclick="document.getElementById('ord').value='reasons.name;asc';document.getElementById('form-searh-case').submit();" class="text-primary ordenar-desc">Data</a>
                    @else
                        <a href="javascript:void(0);" onclick="document.getElementById('ord').value='reasons.name;desc';document.getElementById('form-searh-case').submit();" class="text-primary ordenar">Data</a>
                    @endif
                </th> 
                <th scope="col" class="" width="100">
                    Descrição
                </th>                 
            </tr>
        </thead>
        <tbody>
            @forelse( $call_registers as $call_register )
                @include('admin.pages.call_registers._list')                            
            @empty
            <tr>
                <td colspan="3">
                    <p>Nenhum Resultado!</p>
                </td>
            </tr>
            @endforelse                      
        </tbody>
    </table>
    @if($call_registers instanceof \Illuminate\Pagination\LengthAwarePaginator )
        {{$call_registers->links()}}
    @endif
</div>


@endsection