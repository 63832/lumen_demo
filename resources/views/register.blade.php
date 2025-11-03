<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        label {
            display: block;
            margin: 1em;
        }
         .error {
            background-color: pink;
            color: darkred;
            width: 12%;
            text-align: center;
        }
    </style>
</head>

<body>
    @if($meddelande)
    <p class="error">{{$meddelande}}</p>
    @endif
    <h1>Registrera ny användare</h1>
    <form method="post">
        <label>Namn: <input name="namn" type="text" required placeholder="Ange namn"> </label>
        <label>Epost: <input name="epost" type="email" required placeholder="Ange epost"> </label>
        <label>Lösenord: <input name="losenord" type="password" required placeholder="Ange lösenord"> </label>
        <input type="submit" value="Registrera!">
    </form>
   
</body>

</html>