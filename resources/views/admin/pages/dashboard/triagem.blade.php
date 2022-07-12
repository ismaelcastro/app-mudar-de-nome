@extends('admin.layout.app')

@section('content')



<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Casos</h1>
    </div>
</div>

@include('admin.pages.cases._filter')

<div class="list-info-page">
    @if($calls instanceof \Illuminate\Pagination\LengthAwarePaginator )
        <p>Mostrando de {{ $calls->firstItem() }} até {{ $calls->lastItem() }} registros de um total de {{ $calls->total() }}</p>
    @endif
</div>

<div class="table-responsive"> 
    <table class="table table-bordered verticle-middle">
        <thead>
            <tr>
                <th scope="col" width="40">
                    ID
                </th>
                <th scope="col" width="40">
                    <input type="checkbox" class="checkItem0">
                </th>                
                <th scope="col" class="" width="70">
                    @if( isset($dataForm['ord']) && $dataForm['ord']=='reasons.name;desc')
                        <a href="javascript:void(0);" onclick="document.getElementById('ord').value='reasons.name;asc';document.getElementById('form-searh-case').submit();" class="text-primary ordenar-desc">Caso</a>
                    @else
                        <a href="javascript:void(0);" onclick="document.getElementById('ord').value='reasons.name;desc';document.getElementById('form-searh-case').submit();" class="text-primary ordenar">Caso</a>
                    @endif
                </th> 
                <th scope="col" class="" width="100">
                    @if( isset($dataForm['ord']) && $dataForm['ord']=='casedate;desc')
                        <a href="javascript:void(0);" onclick="document.getElementById('ord').value='casedate;asc';document.getElementById('form-searh-case').submit();" class="text-primary ordenar-desc">Triagem</a>
                    @else
                        <a href="javascript:void(0);" onclick="document.getElementById('ord').value='casedate;desc';document.getElementById('form-searh-case').submit();" class="text-primary ordenar">Triagem</a>
                    @endif
                </th> 
                <th scope="col" class="">
                    @if( isset($dataForm['ord']) && $dataForm['ord']=='clients.name;desc')
                        <a href="javascript:void(0);" onclick="document.getElementById('ord').value='clients.name;asc';document.getElementById('form-searh-case').submit();" class="text-primary ordenar-desc">Requerente</a>
                    @else
                        <a href="javascript:void(0);" onclick="document.getElementById('ord').value='clients.name;desc';document.getElementById('form-searh-case').submit();" class="text-primary ordenar">Requerente</a>
                    @endif
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
            @forelse( $calls as $call )
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
    @if($calls instanceof \Illuminate\Pagination\LengthAwarePaginator )
        {{$calls->links()}}
    @endif
</div>


@endsection