@extends('admin.layout.app')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Etapa Processual</h1>
            <a href="{{ route('admin.process_category.create') }}"
               class="d-none d-sm-inline-block btn btn-primary shadow-sm">
                ADICIONAR
            </a>
        </div>
    </div>

    <div class="list-info-page">
        @if($processCategory instanceof \Illuminate\Pagination\LengthAwarePaginator )
            <p>Mostrando de {{ $processCategory->firstItem() }} até {{ $processCategory->lastItem() }} registros de um
                total
                de {{ $processCategory->total() }}</p>
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
                <th scope="col" class="">
                    Cor
                </th>
                <th scope="col" width="65">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @forelse( $processCategory as $category )
                <tr>
                    <td>
                        <input type="checkbox" name="checkItem[]" class="checkItem" value="25">
                    </td>
                    <td>
                        {{$category->name}}
                    </td>
                    <td>
                        {{$category->process_type->name ?? ''}}
                    </td>
                    <td>
                        <input type="color" value="{{ $category->color }}" disabled>
                    </td>
                    <td>
                    <span class="action-table">
                        <a href="{{ route('admin.process_category.edit', ['category' => $category->id]) }}" title=""
                           data-toggle="tooltip" data-placement="top" data-original-title="editar" class="mr-2">
                            <i class="fa fa-pencil m-r-5"></i>
                        </a>
                        
                        <a href="{{ route('admin.process_category.destroy', ['category' => $category->id]) }}"
                           data-toggle="tooltip" data-placement="top" title=""
                           data-original-title="Excluir" class="sweet-confirm" rid="25"
                           onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){
                                   document.getElementById('form-delete{{$category->id}}').submit();}">
                            <i class="fa fa-trash"></i>
                        </a>
                        {{ Form::open(['route' => ['admin.process_category.destroy',$category->id], 'method' => 'DELETE', 'id' => 'form-delete'.$category->id ]) }}
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
        @if($processCategory instanceof \Illuminate\Pagination\LengthAwarePaginator )
            {{$processCategory->links()}}
        @endif
    </div>
@endsection