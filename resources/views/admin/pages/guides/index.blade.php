@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Guias</h1>
        <a href="{{ route('admin.guides.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
            ADICIONAR
        </a>
    </div>
</div>

<div class="list-info-page">
    @if($guides instanceof \Illuminate\Pagination\LengthAwarePaginator )
        <p>Mostrando de {{ $guides->firstItem() }} até {{ $guides->lastItem() }} registros de um total de {{ $guides->total() }}</p>
    @endif
</div>

<div class="table-responsive"> 
    <table class="table table-bordered verticle-middle">
        <thead>
            <tr>
                <th scope="col" width="40">
                    <input type="checkbox" class="checkItem0">
                </th>
                <th scope="col" class="">
                    Título
                </th> 
                <th scope="col" class="">
                    Categoria
                </th>         
                <th scope="col" width="65">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @forelse( $guides as $guide )
            <tr>
                <td>
                    <input type="checkbox" name="checkItem[]" class="checkItem" value="25">
                </td>                
                <td>
                    {{$guide->name}}                         
                </td> 
                <td>
                    {{$guide->guide_category->name}}                         
                </td>               
                <td>
                    <span class="action-table">
                        <a href="{{ route('admin.guides.edit', ['guide' => $guide->id]) }}" title="" data-toggle="tooltip" data-placement="top" data-original-title="editar" class="mr-2">
                            <i class="fa fa-pencil m-r-5"></i>
                        </a>
                        
                        <a href="{{ route('admin.guides.destroy', ['guide' => $guide->id]) }}" data-toggle="tooltip" data-placement="top" title="" 
                            data-original-title="Excluir" class="sweet-confirm" rid="25" onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete{{$guide->id}}').submit();}">
                            <i class="fa fa-trash"></i>
                        </a>
                        {{ Form::open(['route' => ['admin.guides.destroy',$guide->id], 'method' => 'DELETE', 'id' => 'form-delete'.$guide->id ]) }}
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
    @if($guides instanceof \Illuminate\Pagination\LengthAwarePaginator )
        {{$guides->links()}}
    @endif
</div>


@endsection