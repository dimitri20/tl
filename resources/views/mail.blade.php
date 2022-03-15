<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    Message from: {{ $data["email"] }}

    <br><br><br>

    Name: {{ $data["name"] }}
    <br>
    Subject: {{$data["subject"]}}
    <br>
    Message: {{$data["message"]}}


</body>
</html>
