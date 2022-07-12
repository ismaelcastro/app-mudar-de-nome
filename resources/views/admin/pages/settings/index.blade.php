@extends('admin.layout.app')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Configurações</h1>
    </div>
</div>


<div class="row">
    <div class="col-sm-12">
        <div class="card p-3">
            
            <div class="card-block">
                <div class="nav-tabs-alt bg-white-only">
                    <ul class="nav nav-pills custom-pills">
                    @foreach ($config_array as $keyAbas => $valueAbas)
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link text-uppercase @if($keyAbas=='d4sign') active @endif" data-target="#tab-{{ $keyAbas }}" role="tab" data-toggle="tab" >
                                {{ $valueAbas['label'] }}
                            </a>
                        </li>
                    @endforeach
                    </ul>
                </div>                
                <div class="tab-content pt-25 p-3">
                    @foreach ($config_array as $keyAbas => $valueAbas)
                        <div id="tab-{{ $keyAbas }}" class="tab-pane @if($keyAbas=='d4sign') active @endif" role="tabpanel">
                            <div class="wrapper-md">
                                {{ Form::open(['route' => 'admin.settings.store' ]) }}
                                    <div class="row">
                                        @foreach ($valueAbas['fields'] as $fields)                                            
                                            @include('admin.partials._fields',['fields' => $fields])
                                        @endforeach
                                    </div>
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                {{ Form::close() }}
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection