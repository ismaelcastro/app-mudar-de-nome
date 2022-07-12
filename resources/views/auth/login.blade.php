@extends('admin.layout.login')

@section('content')
<div class="container">

    <di class="row pt-5" id="box_buttons">
        <div class="col-12 text-center pb-3">
            <img src="{{ asset('assets-adm/images/logo-ratsbone-magri.png') }}" alt="RatsboneMagri">
        </div>
        <div class="col-6 text-right">
            <a href="{{route('client.login.show')}}" class="btn btn-primary text-white">Sou Cliente</a>
        </div>
        <div class="col-6 text-left">
            <a href="javascript:void(0);" onclick="$('#box_buttons').hide();$('#box_login').show();" class="btn btn-primary text-white">Sou Advogado</a>
        </div>
    </di>


    <div class="row justify-content-center" style="display: none" id="box_login">
        <div class="col-md-5 pt-5">
            <div class="card mt-5">
                <div class="card-header">
                    <img src="{{ asset('assets-adm/images/logo-ratsbone-magri.png') }}" alt="RatsboneMagri">
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Digite seu email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Digite sua senha" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>                      

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    ENTRAR
                                </button>                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Manter conectado
                                </label>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Esqueceu sua senha?
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
