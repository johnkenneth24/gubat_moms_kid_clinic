<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <style>
    p, h4{
      color: #000000;
    }
  </style>
</head>
<h4><b>AN APPOINTMENT HAS BEEN CANCELLED</b></h4>
<br>
<h4><b>YOUR APPOINTMENT INFORMATION</b></h4>
<p><b>NAME OF PATIENT:</b> {{ $name }}</p>
<p><b>EMAIL:</b> {{ $email }}</p>
<p><b>TYPE OF CONSULTATION:</b> {{ $type }}</p>
<p><b>DATE APPOINTMENT:</b> {{ $date }}</p>
<p><b>TIME APPOINTMENT:</b> {{ $time }}</p>
<p><b>REASON:</b> {{ $reason }}</p>

<p>Thank you! Have a nice day!</p>


<body>
</body>
</html>
