@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categorias de documentos</h1>
        <a href="{{ route('admin.guide_categories.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
            ADICIONAR
        </a>
    </div>
</div>

<div class="list-info-page">
    @if($guide_categories instanceof \Illuminate\Pagination\LengthAwarePaginator )
        <p>Mostrando de {{ $guide_categories->firstItem() }} até {{ $guide_categories->lastItem() }} registros de um total de {{ $guide_categories->total() }}</p>
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
                <th scope="col" width="65">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @forelse( $guide_categories as $guide_category )
            <tr>
                <td>
                    <input type="checkbox" name="checkItem[]" class="checkItem" value="25">
                </td>                
                <td>
                    {{$guide_category->name}}                         
                </td>             
                <td>
                    <span class="action-table">
                        <a href="{{ route('admin.guide_categories.edit', ['guide_category' => $guide_category->id]) }}" title="" data-toggle="tooltip" data-placement="top" data-original-title="editar" class="mr-2">
                            <i class="fa fa-pencil m-r-5"></i>
                        </a>
                        
                        <a href="{{ route('admin.guide_categories.destroy', ['guide_category' => $guide_category->id]) }}" data-toggle="tooltip" data-placement="top" title="" 
                            data-original-title="Excluir" class="sweet-confirm" rid="25" onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete{{$guide_category->id}}').submit();}">
                            <i class="fa fa-trash"></i>
                        </a>
                        {{ Form::open(['route' => ['admin.guide_categories.destroy',$guide_category->id], 'method' => 'DELETE', 'id' => 'form-delete'.$guide_category->id ]) }}
                        {{ Form::close() }}
                    </span>
                </td>
            </tr>                            
            @empty
            <tr>
                <td colspan="3">
                    <p>Nenhum Resultado!</p>
                </td>
            </tr>
            @endforelse                      
        </tbody>
    </table>
    @if($guide_categories instanceof \Illuminate\Pagination\LengthAwarePaginator )
        {{$guide_categories->links()}}
    @endif
</div>


@endsection