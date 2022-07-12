@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Documentos</h1>
        <a href="{{ route('admin.documents.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
            ADICIONAR
        </a>
    </div>
</div>

<div class="list-info-page">
    @if($documents instanceof \Illuminate\Pagination\LengthAwarePaginator )
        <p>Mostrando de {{ $documents->firstItem() }} até {{ $documents->lastItem() }} registros de um total de {{ $documents->total() }}</p>
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
            @forelse( $documents as $document )
            <tr>
                <td>
                    <input type="checkbox" name="checkItem[]" class="checkItem" value="25">
                </td>                
                <td>
                    {{$document->name}}                         
                </td> 
                <td>
                    @isset($document->document_category->name)
                        {{$document->document_category->name}}
                    @endisset
                                             
                </td>               
                <td>
                    <span class="action-table">
                        <a href="{{ route('admin.documents.edit', ['document' => $document->id]) }}" title="" data-toggle="tooltip" data-placement="top" data-original-title="editar" class="mr-2">
                            <i class="fa fa-pencil m-r-5"></i>
                        </a>
                        
                        <a href="{{ route('admin.documents.destroy', ['document' => $document->id]) }}" data-toggle="tooltip" data-placement="top" title="" 
                            data-original-title="Excluir" class="sweet-confirm" rid="25" onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete{{$document->id}}').submit();}">
                            <i class="fa fa-trash"></i>
                        </a>
                        {{ Form::open(['route' => ['admin.documents.destroy',$document->id], 'method' => 'DELETE', 'id' => 'form-delete'.$document->id ]) }}
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
    @if($documents instanceof \Illuminate\Pagination\LengthAwarePaginator )
        {{$documents->links()}}
    @endif
</div>


@endsection