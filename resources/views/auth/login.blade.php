@extends('template-login')

@section('content')

<form class="form-signin" method="POST" action="{{ asset('/auth/login') }}">

    {!! csrf_field() !!}
    <h2 class="form-signin-heading">Área Restrita</h2>


        <input type="email" class="input-block-level" placeholder="Email" value="{{ old('email')  }}" name="email"  />


        <input type="password" placeholder="Senha" class="input-block-level" value="{{ old('password')  }}" name="password"  />


        <label class="checkbox">
            <input type="checkbox"  name="remember"  />
            Lembrar-me
        </labe>



    <div>

        <button class="btn btn-large btn-primary" type="submit"> ENTRAR </button>
    </div>
</form>



@endsection