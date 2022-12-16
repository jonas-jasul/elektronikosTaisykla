<?php include_once('functions/functions.php');
$puslapis = "Registracija"; ?>
<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css" type="text/css">
    <script src="scripts/validation.js"></script>

    <title>Registracija</title>
</head>

<body>
    <?php include("welcomeHeader.php"); ?>

    <form id="rgstrForm" method="POST" action="registration.php" onsubmit="return validateForm()">
        <div class="container register-cont">
                <?php echo display_error(); ?>
                <h1>Registracija</h1>
                <label for="email">El. paštas</label>
                <input type="text" placeholder="Įveskite el. paštą" name="email" id="email" required>
                <span class="reg_error" id="email_error"></span><br>
                <label for="name">Vardas ir Pavardė</label>
                <input type="name" placeholder="Įveskite savo vardą ir pavardę" name="name" id="name" required>
                <span class="reg_error" id="name_error"></span><br>
                <label for="tel">Tel. nr.</label>
                <input type="tel" placeholder="Įveskite savo kontaktinį tel. nr." name="phone" id="phone" required>
                <span class="reg_error" id="tel_error"></span><br>
                <label for="password">Slaptažodis</label>
                <input minlength="6" type="password" placeholder="Įveskite slaptažodį" name="password_1" id="password_1" required></label>
                <label for="password-repeat">Pakartokite slaptažodį</label>
                <input minlength="6" type="password" placeholder="Pakartokite slaptažodį" name="password_2" id="password_2" required></label>
                <button type="submit" class="button btn btn-primary register-btn" name="register-btn">Registruotis</button>
                <p id="alreadyReg">Jau turite paskyrą? <button type="button" class="btn btn-secondary"><a id="noRegRegister" href="login.php">Prisijunkite</a></button></p>
        </div>  
    </form>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $("#rgstrForm input[type=password]").on('change invalid', function() {
        var textfield = $(this).get(0);

        textfield.setCustomValidity('');
        if (!textfield.validity.valid) {
            textfield.setCustomValidity("Slaptažodis per trumpas! Naudokite bent 6 simbolius.");
        }
    })
</script>

</html>