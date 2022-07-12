@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">FAQ</h1>
        <a href="{{ route('admin.faqs.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
            ADICIONAR
        </a>
    </div>
</div>

<div class="list-info-page">
    @if($faqs instanceof \Illuminate\Pagination\LengthAwarePaginator )
        <p>Mostrando de {{ $faqs->firstItem() }} até {{ $faqs->lastItem() }} registros de um total de {{ $faqs->total() }}</p>
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
            @forelse( $faqs as $faq )
            <tr>
                <td>
                    <input type="checkbox" name="checkItem[]" class="checkItem" value="25">
                </td>                
                <td>
                    {{$faq->name}}                         
                </td> 
                <td>
                    {{$faq->faq_category->name}}                         
                </td>                
                <td>
                    <span class="action-table">
                        <a href="{{ route('admin.faqs.edit', ['faq' => $faq->id]) }}" title="" data-toggle="tooltip" data-placement="top" data-original-title="editar" class="mr-2">
                            <i class="fa fa-pencil m-r-5"></i>
                        </a>
                        
                        <a href="{{ route('admin.faqs.destroy', ['faq' => $faq->id]) }}" data-toggle="tooltip" data-placement="top" title="" 
                            data-original-title="Excluir" class="sweet-confirm" rid="25" onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete{{$faq->id}}').submit();}">
                            <i class="fa fa-trash"></i>
                        </a>
                        {{ Form::open(['route' => ['admin.faqs.destroy',$faq->id], 'method' => 'DELETE', 'id' => 'form-delete'.$faq->id ]) }}
                        {{ Form::close() }}
                    </span>
                </td>
            </tr>                            
            @empty
            <tr>
                <td colspan="4">
                    <p>Nenhum Resultado!</p>
                </td>
            </tr>
            @endforelse                      
        </tbody>
    </table>
    @if($faqs instanceof \Illuminate\Pagination\LengthAwarePaginator )
        {{$faqs->links()}}
    @endif
</div>


@endsection