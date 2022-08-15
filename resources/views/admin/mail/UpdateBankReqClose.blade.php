<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update bank or UPI Request</title>
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
    <h1 class="banner__content">Bank or UPI Request Updated</h1>

   <p> Hi {{$user_name}},</p>

   <p> This is to confirm that your Bank or UPI request have been successfully {{$status}}. </p>
   <p>Please Check Your Account.</p>


   <p>Thanks & Regards</p>

   <p>Pride Games</p>


</body>
</html>
