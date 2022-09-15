<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/welcome.css" type="text/css">
    <title>Document</title>
</head>

<body>
<?php include("welcomeHeader.php"); ?>
    <div class="container contact-form">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Jūsų el. paštas</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="vardas@pavyzdys.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Jūsų žinutė mums</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit">Siųsti</button>
    </div>
</body>

</html>