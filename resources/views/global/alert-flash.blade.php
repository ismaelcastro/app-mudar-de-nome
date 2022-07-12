@if (count($errors) > 0)
    <script>
        window.onload = function() {
            @foreach ($errors->all() as $error) 
                toastr["error"]("Error!", "{{$error}}");
            @endforeach
        };
    </script> 
@endif

@if (Session::has('success'))
    <script>
        window.onload = function() {
            toastr["success"]("Sucesso!", "{{Session::get('success')}}");
        };
    </script>
@endif

@if (Session::has('error'))
    <script>
        window.onload = function() {
            toastr["error"]("Error!", "{{Session::get('error')}}");
        };
    </script>
@endif

@if (Session::has('warning'))
    <script>
        window.onload = function() {
            toastr["warning"]("Warning!", "{{Session::get('warning')}}");
        };
    </script>
@endif

@if (Session::has('info'))
    <script>
        window.onload = function() {
            toastr["info"]("Info!", "{{Session::get('info')}}");
        };
    </script>
@endif
