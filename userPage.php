<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/20bfdee84e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/welcome.css" type="text/css">
    <title>Document</title>
</head>

<body>
    <?php include("functions/functions.php");
    if (!isLoggedIn()) {
        $_SESSION['msg'] = "Jūs turite pirmiau prisijungti";
        header('location: login.php');
    }
    ?>
    <nav class="navbar navbar-expand-lg py-3 navbar-light bg-light shadow-sm">
        <div class="container">
            <a href="welcome.php" class="navbar-brand">
                <img src="images/logo.png" alt="" class="img-responsive d-inline-block align-middle" width="80">
                <span class="text-uppercase font-weight-bold">Elektronikos taisykla</span>
            </a>

            <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="welcome.php" class="nav-link">Pagrindinis puslapis</a></li>
                    <li class="nav-item"><a href="welcome.php#paslaugos-div" class="nav-link">Paslaugos</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Apie mus</a></li>
                    <li class="nav-item"><a href="kontaktai.php" class="nav-link">Kontaktai</a></li>
                    <li class="nav-item"><a href="userPage.php" class="nav-link">Vartotojo panelė</a></li>
                    <!-- <li class="nav-item"><a href="registration.php" class="nav-link">Registruotis</a></li>
                    <li class="nav-item"><a href="login.php" class="nav-link">Prisijungti</a></li> -->
                </ul>
                <div class="profile-info">
                    <div>
                        <?php if (isset($_SESSION['user'])) : ?>
                            <strong><?php echo $_SESSION['user']['name']; ?></strong>

                            <small>
                                <i style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
                                <br>
                                <a href="login.php?logout='1'" style="color: red;">atsijungti</a>
                            </small>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container log-success">
        <div class="row">
            <div class="col">
                <?php if (isset($_SESSION['success'])) : ?>
                    <div class="error success er-suc-log">
                        <h3>
                            <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                            ?>
                        </h3>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>

    <div class="container">
        <h2>Vartotojo panelė</h2>
        <div class="row">
            <h5>Paslaugos pasirinkimas</h5>
            <div class="col">
                <div class="card h-100">
                    <img src="images/cell-phone.png" class="card-img-top mx-auto pt-2" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Telefonų taisymas</h5>
                        <p class="card-text">

                            <?php if (isLoggedIn(true)) { ?>
                        <div class="pirmyn">
                            <span>
                                <a href="userRepairPhone.php" class="pirmyn-link">Pasirinkti <i class="fa-solid fa-arrow-right"></i></a>

                            </span>
                        </div>
                    <?php }  ?>
                    </p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <img src="images/computer.png" class="card-img-top mx-auto" id="card-img-computer" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Stacionarių kompiuterių taisymas</h5>
                        <p class="card-text">
                            <?php if (isLoggedIn(true)) { ?>
                        <div class="pirmyn">
                            <span>
                                <a href="#" class="pirmyn-link">Pasirinkti <i class="fa-solid fa-arrow-right"></i></a>

                            </span>
                        </div>
                    <?php }  ?>
                    </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card h-100">
                    <img src="images/console.png" class="card-img-top mx-auto" id="card-img-console" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Žaidimų konsolių taisymas</h5>
                        <p class="card-text">

                            <?php if (isLoggedIn(true)) { ?>
                        <div class="pirmyn">
                            <span>
                                <a href="#" class="pirmyn-link">Pasirinkti <i class="fa-solid fa-arrow-right"></i></a>

                            </span>
                        </div>
                    <?php }  ?>
                    </p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <img src="images/laptop.png" class="card-img-top mx-auto" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nešiojamų kompiuterių taisymas</h5>
                        <p class="card-text">

                            <?php if (isLoggedIn(true)) { ?>
                        <div class="pirmyn">
                            <span>
                                <a href="#" class="pirmyn-link">Pasirinkti <i class="fa-solid fa-arrow-right"></i></a>

                            </span>
                        </div>
                    <?php }  ?>
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h5 class="pt-2">Mano taisymo paslaugų užsakymai</h5>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
</body>

</html>