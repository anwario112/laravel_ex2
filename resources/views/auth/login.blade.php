
<!doctype html>
<html>
    <head>
   <link rel="stylesheet" href="{{asset('css/login.css')}}">
    </head>
    <body>
      <div class="container">
        <img src="svg/laravel.png" class="img"alt="">

        <div class="form">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="inputs">
                        <label for="email" class="label-email">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="email-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="inputs">
                        <label for="password" class="label-password">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="password-input @error('password') is-invalid @enderror" name="password" required autocomplete="off">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="input-check">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-labl" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="inputs">
                        <div class="login-btns">
                            <button type="submit" class="login-btn">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="forget-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            <p class="register-btn"> <a href="{{ route('register') }}"
                                class="register-btns"><u>Register now</u></a></p>
                        </div>
                    </div>

      </div>
    </body>
</html>

