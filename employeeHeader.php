<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/welcome.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <?php include_once("functions/functions.php"); ?>
    <nav class="navbar fixed-top navbar-expand-lg py-0 navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="welcome.php" class="navbar-brand">
                <img src="images/logo.png" alt="" class="img-responsive d-inline-block align-middle" width="80">
                <span class="text-uppercase font-weight-bold">Elektronikos taisykla</span>
            </a>

            <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item <?php if ($puslapis=="DarbuotojoPanele"){echo 'activeEmp';}?>"><a href="employeePage.php" class="nav-link">Darbuotojo panelė</a></li>
                    <li class="nav-item <?php if($puslapis=="DarbuotojoPanelNustatymai"){echo 'activeEmp';}?>"><a href="employeePageSettings.php" class="nav-link">Darbuotojo nustatymai</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <div class="profile-info">
                            <div>
                                <?php if (isEmployee()) : ?>
                                    <a href="employeePageSettings.php"><strong style="color:white;"><?php echo $_SESSION['user']['name']; ?></strong></a>

                                    <small>
                                        <i style="color: white;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
                                        <br>
                                        <a href="login.php?logout='1'" style="color: red;">atsijungti</a>
                                    </small>
                                <?php endif ?>
                            </div>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </nav>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js" integrity="sha512-PqRelaJGXVuQ81N6wjUrRQelCDR7z8RvKGiR9SbSxKHPIt15eJDmIVv9EJgwq0XvgylszsjzvQ0+VyI2WtIshQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>