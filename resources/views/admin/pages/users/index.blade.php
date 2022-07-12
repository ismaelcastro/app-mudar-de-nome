@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Usuários</h1>
        <a href="{{ route('admin.users.create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
            ADICIONAR
        </a>
    </div>
</div>

<div class="list-info-page">
    @if($users instanceof \Illuminate\Pagination\LengthAwarePaginator )
        <p>Mostrando de {{ $users->firstItem() }} até {{ $users->lastItem() }} registros de um total de {{ $users->total() }}</p>
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
                    Usuário
                </th>
                <th scope="col">Assuntos Permitidos</th> 
                <th scope="col" class="">
                    Cargos
                </th>         
                <th scope="col" width="65">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @forelse( $users as $user )
            <tr>
                <td>
                    <input type="checkbox" name="checkItem[]" class="checkItem" value="25">
                </td>                
                <td>
                    {{$user->name}}     
                    <br /> 
                    <span>{{$user->email}}</span>                                                   
                </td> 
                <td>
                    @if(is_null($user->occupation_area)) Todos @else {{$user->occupation_area}} @endif
                </td>
                <td>
                    @foreach ($user->roles()->get() as $role)
                        <label class="label bg-primary text-white small">{{$role->label}}</label>
                    @endforeach                         
                </td>                
                <td>
                    <span class="action-table">
                        <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}" title="" data-toggle="tooltip" data-placement="top" data-original-title="editar" class="mr-2">
                            <i class="fa fa-pencil m-r-5"></i>
                        </a>
                        
                        <a href="{{ route('admin.users.destroy', ['user' => $user->id]) }}" data-toggle="tooltip" data-placement="top" title="" 
                            data-original-title="Excluir" class="sweet-confirm" rid="25" onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete{{$user->id}}').submit();}">
                            <i class="fa fa-trash"></i>
                        </a>
                        {{ Form::open(['route' => ['admin.users.destroy',$user->id], 'method' => 'DELETE', 'id' => 'form-delete'.$user->id ]) }}
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
    @if($users instanceof \Illuminate\Pagination\LengthAwarePaginator )
        {{$users->links()}}
    @endif
</div>


@endsection