<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/login.css') }}">
    <link rel="stylesheet" href="{{ url('css/fonts.css') }}">
    <title>SIM Klinik | Login </title>
</head>
<body>
    <div class="container">
        <div class="box-container">
            <div class="header-container">
                <div class="logo-container">
                    <img src="{{ url('img/LogoKlinik.png') }}" width="150px" alt="">
                </div>
                <br>
                <br>
                <h1><strong>Sistem Informasi Manajemen Klinik</strong></h1>
            </div>
            <div class="body-container">
                <form action="{{ url('loginAction') }}" method="post">
                    @csrf
                    <div class="username-container">
                        <span>Username :</span>
                        <br>
                        <input name="username" type="text">
                    </div>
                    <div class="password-container">
                        <span>Password :</span>
                        <br>
                        <input type="password" name="password" type="text">
                    </div>
                    <div class="button-container">
                        <button type="submit">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
