<?php include('functions/functions.php')?>
<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css" type="text/css">
    <title>Document</title>
</head>

<body>
    <?php include("welcomeHeader.php"); ?>
    
    <form method="POST" action="registration.php">
    <?php echo display_error(); ?>
        <div class="container register-cont">
            <h1>Registracija</h1>
            <label for="email">El. paštas</label>
            <input type="text" placeholder="Įveskite el. paštą" name="email" id="email" required>
            <br>
            <label for="name">Vardas ir Pavardė</label>
            <input type="name" placeholder="Įveskite savo vardą ir pavardę" name="name" id="name" required>
            <br>
            <label for="phone">Tel. nr.</label>
            <input type="phone" placeholder="Įveskite savo kontaktinį tel. nr." name="phone" id="phone" required>
            <br>
            <label for="password">Slaptažodis</label>
            <input type="password" placeholder="Įveskite slaptažodį" name="password_1" id="password_1" required></label>
            <br>
            <label for="password-repeat">Pakartokite slaptažodį</label>
            <input type="password" placeholder="Pakartokite slaptažodį" name="password_2" id="password_2" required></label>
            <br>
            <button type="submit" class="register-btn" name="register-btn">Registruotis</button>
            <br>
            <p id="alreadyReg">Jau turite paskyrą? <a id="alreadyRegLogin" href="login.php">Prisijunkite!</a></p>
        </div>
    </form>

</body>

</html>