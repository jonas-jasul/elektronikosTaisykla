
<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css" type="text/css">
    <title>ADMIN</title>
</head>

<body>
    <?php include("functions/adminLogin.php"); ?>
    <form method="POST" action="adminLogin.php"> 
        <div class="container register-cont">
        <?php echo display_error(); ?>
            <h1>ADMIN prisijungimas</h1>
            <label for="email">El. paštas</label>
            <input type="text" placeholder="Įveskite el. paštą" name="adminEmail" id="adminEmail" required>
            <br>
            <label for="password">Slaptažodis</label>
            <input type="password" placeholder="Įveskite slaptažodį" name="adminPassword" id="adminPassword" required>
            <br>
            <button type="submit" class="button btn btn-primary admin-login-btn" name="admin-login-btn">Prisijungti</button>
            <br>
        </div>
    </form>

</body>

</html>