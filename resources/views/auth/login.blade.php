@extends('layouts.app')

@section('content')
<div class="text-center">
    <main class="form-signin">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <img class="mb-4" src="https://i.imgur.com/mSUPR6T.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Login</h1>
            <div class="card">
                <div class="form-floating">
                    <input type="email" class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label for="floatingInput">Email</label>
                    </div>
                    @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                    <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <label for="floatingPassword">Senha</label>
                    </div>
                    @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                
                    <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Lembrar-se
                    </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Logar-se</button>
                    @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Esqueceu sua senha?') }}
                                            </a>
                                        @endif
            </div>
            
            <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
        </form>
    </main>
</div>
@endsection




