@extends('admin.layout.app')

@section('content')





<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Atendimentos</h1>
    </div>
</div>


@include('admin.pages.calls._filter')

<div class="list-info-page">
    @if($calls instanceof \Illuminate\Pagination\LengthAwarePaginator )
        <p>Mostrando de {{ $calls->appends($dataForm)->firstItem() }} até {{ $calls->appends($dataForm)->lastItem() }} registros de um total de {{ $calls->appends($dataForm)->total() }}</p>
    @endif
</div>

<div class="card-border-primary">
    <div class="card-block">
    @forelse( $calls as $call )
        @include('admin.pages.calls._list')
    @empty
        <div class="card-header">
            <h5>Nenhum Resultado! </h5>               
        </div>
    @endforelse
    </div>
</div>

@if($calls instanceof \Illuminate\Pagination\LengthAwarePaginator )
    {{$calls->appends($dataForm)->links()}}
@endif

<form method="POST" id="form-star" >{!! csrf_field() !!} <input type="hidden" name="stars" id="starsChange"> </form>
<form method="POST" id="form-action" >{!! csrf_field() !!} <input type="hidden" name="caseaction" id="caseaction"> </form>
<form method="POST" id="form-changetype" >{!! csrf_field() !!} <input type="hidden" name="changetype_id" id="changetype_id"> </form>
<form method="POST" id="form-reason" >{!! csrf_field() !!} <input type="hidden" name="reason_id" id="reason_id"> </form>
@endsection

@section('scriptjs')

@endsection