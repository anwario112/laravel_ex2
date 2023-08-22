<!doctype html>
<html>
    <head>
     <link rel="stylesheet" href="{{asset('css/register.css')}}">
    </head>
    <body>
        <div class="container">
            <img src="svg/laravel.png" class="img"alt="">
            <div class="form">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="inputs">
                            <label for="name" class="name-label">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="name-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="inputs">
                            <label for="lastname" class="lastname-label">{{ __('lastname') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="lastname-input @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="off" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="inputs">
                            <label for="email" class="email-label">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="email-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="inputs">
                            <label for="username" class="username-label">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="username-input @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="off">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="inputs">
                            <label for="password" class="password-label">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="password-input @error('password') is-invalid @enderror" name="password" required autocomplete="off">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="inputs">
                            <label for="password-confirm" class="password-confirm">{{ __('Confirm Password') }}</label>

                            <div class="confirm">
                                <input id="password-confirm" type="password" class="confirm-input" name="password_confirmation" required autocomplete="off">
                            </div>
                        </div>

                        <div class="inputs">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="register-input">
                                    {{ __('Register') }}
                                </button>
                                <p class="login-link">Have already an account? <a href="{{ route('login') }}"
                                    class="fw-bold text-body"><u>Login here</u></a></p>
                                 </div>
                                </div>
                               </div>
                            </div>
                        </div>
                    </form>
                </div>



            </div>

        </div>
    </body>
</html>
