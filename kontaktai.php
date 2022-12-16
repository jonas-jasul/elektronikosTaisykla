<?php include('functions/functions.php'); 
$puslapis="Kontaktai"?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/welcome.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Kontaktai</title>
</head>

<body>
    <?php if (isLoggedIn()) {
        include_once("loggedInHeader.php");
    } else
        include_once("welcomeHeader.php"); ?>
    <div class="flex-wrapper">
        <div class="container kontakt-info">
            <div class="row">
                <div class="col-6 contacts">
                    <h3>Mus rasite:</h3>
                    <br>
                    <p><i class="bi bi-envelope-at-fill"></i> Mūsų el. paštas: <b>taisymopaslaugos@elektronika.lt</b></p>
                    <p><i class="bi bi-telephone-fill"></i> Mūsų tel. nr.: <b>+37060521111</b></p>
                    <p><i class="bi bi-geo-alt-fill"></i> Mūsų adresas: <b>Pramonės pr. 20, Kaunas</b></p>
                </div>

                <div class="col-6">
                    <div class="contact-form">
                        <h3>Parašyk mums!</h3>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Jūsų el. paštas</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="vardas@pavyzdys.com">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Jūsų žinutė mums</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Siųsti</button>
                    </div>
                </div>
            </div>
        </div>

        <?php include("footer.php"); ?>
    </div>
</body>

</html>