<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget password mail</title>
    <style>
        .banner__content{
        font-size: 1.325rem;
        text-shadow: 2px 2px 2px rgb(195 15 243 / 90%);
        margin-top: 0;
        margin-bottom: 15px;
        font-weight: 700;
        color: #fff;
        font-family: "Oswald", sans-serif;
        text-transform: uppercase;
    }
    </style>
</head>
<body style="background-color:rgb(4,0,1);color: #fff;">
    <div style="text-align: center;">
        <img src="{{asset('assets/images/logo/logow.png')}}" width="150px;" alt="logo">
    </div>
    <h1 class="banner__content">Forget Password Email</h1>

    You can reset password from bellow link:
    <a href="{{ route('reset.password.get',$token) }}">Reset Password</a>
</body>
</html>
