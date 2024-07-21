<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login & Register Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('style/loginstyle.css') }}" />
    <link rel="shortcut icon" href="{{ asset('/assets/img/favicon.ico') }}" type="image/x-icon">
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="{{route('login')}}" method="post">
                @csrf
                <h1>Sign In</h1>
                <div class="social-container">
                    <a onclick="alert('Belum berfungsi')" class="social"><em class="fa fa-facebook"></em></a>
                    <a onclick="alert('Belum berfungsi')" class="social"><em class="fa fa-google"></em></a>
                    <a onclick="alert('Belum berfungsi')" class="social"><em class="fa fa-linkedin"></em></a>
                </div>
                <span>Form Login</span>
            
                <input type="text" name="username" placeholder="Username" />
                <input type="password" name="password" placeholder="Password" />
                <a style="cursor: pointer;" onclick="alert('Belum Berfungsi')">Lupa password</a>
                <div class="button-form">
                    <a href="{{ url('/') }}" class="button-back">
                        <button class="danger" type="button" id="signUp">Kembali</button>
                    </a>
                    <button type="submit">Login</button>
                </div>

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="email" name="email" tabindex="1" autofocus>
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Tips</h1>
                    <p>Jangan beritahukan data pribadi anda, termasuk username dan password saat menggunakan semua
                        sistem informasi</p>
                    <a href="{{ url('/') }}">
                        <button class="ghost" id="signUp">Kembali</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
