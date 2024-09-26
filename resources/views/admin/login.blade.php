
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link  rel="icon" href="{{ asset('img/logo.jpg') }}">
    <link rel="stylesheet" href="{{ asset('style/css') . '/auth.css' }}">
    <link rel="stylesheet" href="{{ asset('style/css') . '/main.css' }}">
    <title>Document</title>
</head>

<body>
    <main>
        <section class="log-in-bg">
            <div class="login-content">
                <form method="POST" action="{{ route('admin.login') }}" class="login">
                    @csrf
                    <div class="login-img">
                        <img src="{{ asset('images/user.png') }}" />
                    </div>
                    <h2>admin login</h2>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" autocomplete="current-password">
                    <div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input class="btn" type="submit" value="Login" />
                </form>
            </div>
        </section>
    </main>
</body>

</html>
