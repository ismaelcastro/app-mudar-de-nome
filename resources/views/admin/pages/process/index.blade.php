@extends('admin.layout.app')

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="slick-triagem">
            @include('admin.pages.process.widgets')
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
        <h1 class="h3 mb-0 text-gray-800">Processos</h1>
    </div>
</div>


@include('admin.pages.process._filter')

<div class="list-info-page">
    @if($calls instanceof \Illuminate\Pagination\LengthAwarePaginator )
        <p>Mostrando de {{ $calls->appends($dataForm)->firstItem() }} até {{ $calls->appends($dataForm)->lastItem() }} registros de um total de {{ $calls->appends($dataForm)->total() }}</p>
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
                <th scope="col" class="" width="110">
                    @if( isset($dataForm['ord']) && $dataForm['ord']=='reasons.name;desc')
                        <a href="javascript:void(0);" onclick="document.getElementById('ord').value='reasons.name;asc';document.getElementById('form-searh-case').submit();" class="text-primary ordenar-desc">Processo</a>
                    @else
                        <a href="javascript:void(0);" onclick="document.getElementById('ord').value='reasons.name;desc';document.getElementById('form-searh-case').submit();" class="text-primary ordenar">Processo</a>
                    @endif
                </th> 
                <th scope="col" class="" width="100">
                    @if( isset($dataForm['ord']) && $dataForm['ord']=='process;desc')
                        <a href="javascript:void(0);" onclick="document.getElementById('ord').value='process;asc';document.getElementById('form-searh-case').submit();" class="text-primary ordenar-desc">Duração</a>
                    @else
                        <a href="javascript:void(0);" onclick="document.getElementById('ord').value='process;desc';document.getElementById('form-searh-case').submit();" class="text-primary ordenar">Duração</a>
                    @endif
                </th> 
                <th scope="col" class="">
                    @if( isset($dataForm['ord']) && $dataForm['ord']=='clients.name;desc')
                        <a href="javascript:void(0);" onclick="document.getElementById('ord').value='clients.name;asc';document.getElementById('form-searh-case').submit();" class="text-primary ordenar-desc">Requerente</a>
                    @else
                        <a href="javascript:void(0);" onclick="document.getElementById('ord').value='clients.name;desc';document.getElementById('form-searh-case').submit();" class="text-primary ordenar">Requerente</a>
                    @endif
                </th> 
                <th scope="col" class="" width="50">
                    Status
                </th> 
                <th scope="col" class="" width="225" align="center">
                    Etapa Processual
                </th>  
                <th scope="col" class="" width="100">
                    Financeiro
                </th>        
                <th scope="col" width="65">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @forelse( $calls as $call )
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
    @if($calls instanceof \Illuminate\Pagination\LengthAwarePaginator )
        {{$calls->appends($dataForm)->links()}}
    @endif
</div>


@endsection