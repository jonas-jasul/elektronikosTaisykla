<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/welcome.css" type="text/css">
    <title>Admin</title>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg py-0 navbar-light bg-light shadow-sm">
        <div class="container">
            <a href="welcome.php" class="navbar-brand">
                <img src="images/logo.png" alt="" class="img-responsive d-inline-block align-middle" width="80">
                <span class="text-uppercase font-weight-bold">Elektronikos taisykla</span>
            </a>

            <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item <?php if($puslapis=="Pagrindinis"){echo 'active';}?>"><a href="welcome.php" class="nav-link">Pagrindinis puslapis</a></li>
                    <li class="nav-item"><a href="welcome.php#paslaugos-div" class="nav-link">Paslaugos</a></li>
                    <li class="nav-item"><a href="welcome.php#aboutUsDiv" class="nav-link">Apie mus</a></li>
                    <li class="nav-item <?php if($puslapis=="Kontaktai"){echo 'active';}?>"><a href="kontaktai.php" class="nav-link">Kontaktai</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item <?php if($puslapis=="Registracija"){echo 'active';}?>"><a href="registration.php" class="nav-link">Registruotis</a></li>
                    <li class="nav-item <?php if($puslapis=="Prisijungimas"){echo 'active';}?>"><a href="login.php" class="nav-link">Prisijungti</a></li>
                </ul>                

            </div>
        </div>
    </nav>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js" integrity="sha512-PqRelaJGXVuQ81N6wjUrRQelCDR7z8RvKGiR9SbSxKHPIt15eJDmIVv9EJgwq0XvgylszsjzvQ0+VyI2WtIshQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('.navbar-nav li').click(function() {
            $('.navbar-nav li').removeClass('active');
            $(this).addClass('active');
        })
    })
</script>
</body>

</html>