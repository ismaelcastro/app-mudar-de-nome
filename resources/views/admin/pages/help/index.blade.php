@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Itens "<i>Como Podemos te Ajudar</i>"</h1>
        <a href="{{ route('admin.help.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
            ADICIONAR
        </a>
    </div>
</div>

{{ Form::open(['route' => 'admin.help.update_order' ]) }}
<div class="table-responsive"> 
    <table class="table table-bordered verticle-middle mb-5">
        <tbody>
            @forelse( $pages as $page_key => $page_value )
            <tr>                           
                <th colspan="3">
                    <h5>{{$page_value}}</h5>                         
                </th>                         
            </tr>  
            @foreach ($help->itens($page_key) as $item)
            <tr bgcolor="#F1F1F1">
                <td>
                    {{$item->name}}    
                </td>
                <td>
                    <div class="form-group">
                        {{ Form::label('order', 'Ordem') }}
                        {{ Form::number('order', $item->order, ['class' => $errors->has('order') ?  'form-control is-invalid' : 'form-control', 'style' => 'width:120px', 'name'=>'order['.$item->id.']']) }}
                        @include('admin.partials._help_block',['field' => 'order'])
                    </div>
                </td>
                <td width="130" >
                    <span class="action-table">
                        <a href="{{ route('admin.help.edit', ['help' => $item->id]) }}" title="" data-toggle="tooltip" data-placement="top" data-original-title="editar" class="mr-2">
                            <i class="fa fa-pencil m-r-5"></i>
                        </a>
                        
                        <a href="{{ route('admin.help.destroy', ['help' => $item->id]) }}" data-toggle="tooltip" data-placement="top" title="" 
                            data-original-title="Excluir" class="sweet-confirm" rid="25" onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete{{$item->id}}').submit();}">
                            <i class="fa fa-trash"></i>
                        </a>                        
                    </span>
                </td>
            </tr>  
            @endforeach                        
            @empty
            <tr>
                <td colspan="2">
                    <p>Nenhum Resultado!</p>
                </td>
            </tr>
            @endforelse                      
        </tbody>
    </table>
</div>

<footer class="footer fixed-bottom hor-footer bg-white py-3">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-md-12 col-sm-12 text-center">
                <div class="btn-list">

                    <button type="submit" class="btn btn-primary">ATUALIZAR</button>
                
                </div>
            </div>
        </div>
    </div>
</footer>
{{ Form::close() }}


@foreach( $pages as $page_key => $page_value )
    @foreach ($help->itens($page_key) as $item)
        {{ Form::open(['route' => ['admin.help.destroy',$item->id], 'method' => 'DELETE', 'id' => 'form-delete'.$item->id ]) }}
        {{ Form::close() }}
    @endforeach 
@endforeach 

@endsection