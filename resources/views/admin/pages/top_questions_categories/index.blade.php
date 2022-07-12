@extends('admin.layout.app')

@section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categorias de Principais Duvidas</h1>
            <a href="{{ route('admin.top_questions_categories.create') }}"
               class="d-none d-sm-inline-block btn btn-primary shadow-sm">
                ADICIONAR
            </a>
        </div>
    </div>

    <div class="list-info-page">
        @if($topQuestionCategory instanceof \Illuminate\Pagination\LengthAwarePaginator )
            <p>Mostrando de {{ $topQuestionCategory->firstItem() }} até {{ $topQuestionCategory->lastItem() }}
                registros de um total de {{ $topQuestionCategory->total() }}</p>
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
                    Descrição
                </th>
                <th scope="col" width="65">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @forelse( $topQuestionCategory as $top_question_category )
                <tr>
                    <td>
                        <input type="checkbox" name="checkItem[]" class="checkItem" value="25">
                    </td>
                    <td>
                        {{$top_question_category->name}}
                    </td>
                    <td>
                        {{$top_question_category->description}}
                    </td>
                    <td>
                    <span class="action-table">
                        <a href="{{ route('admin.top_questions_categories.edit', ['top_question_category' => $top_question_category->id]) }}"
                           title="" data-toggle="tooltip" data-placement="top" data-original-title="editar"
                           class="mr-2">
                            <i class="fa fa-pencil m-r-5"></i>
                        </a>
                        
                        <a href="{{ route('admin.top_questions_categories.destroy', ['top_question_category' => $top_question_category->id]) }}"
                           data-toggle="tooltip" data-placement="top" title=""
                           data-original-title="Excluir" class="sweet-confirm" rid="25"
                           onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){
                                   document.getElementById('form-delete{{$top_question_category->id}}').submit();}">
                            <i class="fa fa-trash"></i>
                        </a>
                        {{ Form::open(['route' => ['admin.top_questions_categories.destroy',$top_question_category->id], 'method' => 'DELETE', 'id' => 'form-delete'.$top_question_category->id ]) }}
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
        @if($topQuestionCategory instanceof \Illuminate\Pagination\LengthAwarePaginator )
            {{$topQuestionCategory->links()}}
        @endif
    </div>


@endsection