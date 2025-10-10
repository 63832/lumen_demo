<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
     <style>
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .err {
            background-color: pink;
            color: darkred;
            width: 12%;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Login</h1>
    <form method="post">
        <label>
            Epost:
            <input type="email" name="epost" placeholder="Ange epost" required>
        </label>
        <label>
            Lösenord:
            <input type="password" name="losenord" placeholder="Ange lösenord" required>
        </label>
        <p class="err">{{$message ?? ''}}</p>
        <input type="submit" value="Logga in">
    </form>
</body>
</html>