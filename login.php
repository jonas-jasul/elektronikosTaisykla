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
    <?php include("functions/functions.php"); ?>
    <form method="POST" action="login.php">
    <?php echo display_error(); ?>
        <div class="container register-cont">
            <h1>Prisijungimas</h1>
            <label for="email">El. paštas</label>
            <input type="text" placeholder="Įveskite el. paštą" name="email" id="email" required>
            <br>
            <label for="password">Slaptažodis</label>
            <input type="password" placeholder="Įveskite slaptažodį" name="password" id="password" required>
            <br>
            <button type="submit" class="login-btn" name="login-btn">Prisijungti</button>
            <br>
            <p id="noReg">Neturite paskyros? <a id="noRegRegister" href="registration.php">Registruokitės!</a></p>
        </div>
    </form>

</body>

</html>