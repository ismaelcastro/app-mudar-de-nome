@php
    $categoryOpen = [];
    session('categoryOpen',[]);
@endphp

@foreach ($documentCategories as $docCategory)
    @if ($docCategory->by_contact)
        @include('admin.partials._extras_accordion_item')
        @foreach ($call->Affiliations as $affiliation)
            @include('admin.partials._extras_accordion_item')
            @php
                unset($affiliation);
            @endphp
        @endforeach
    @else
        @include('admin.partials._extras_accordion_item')
    @endif
@endforeach

@if (session()->has('categoryOpen'))
    <script>
        window.onload = function () {
            @foreach (session('categoryOpen') as $item)
            document.getElementById('cbox-category{{$item}}').click();
            @endforeach
        };
    </script>
@endif