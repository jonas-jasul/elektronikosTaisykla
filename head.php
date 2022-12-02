
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <title>Document</title>
</head>

<body>

    <div class="vertical-nav bg-white" id="sidebar">

        <div class="media d-flex align-items-center"><img src="images/logo.png" alt="..." width="100">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle pe-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Admin
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="login.php">Atsijungti</a></li>

                </ul>
            </div>
        </div>

        <ul class="nav flex-column bg-white mb-0">

            <li class="<?php if($page=="Skydelis"){echo 'active';}?> nav-item">
                <a href="index.php" class="nav-link text-dark">
                    <i class="fa-solid fa-gauge"></i> Skydelis
                </a>
            </li>
            <li class="<?php if($page=="Specialistai"){echo 'active';}?> nav-item">
                <a href="specialistai.php" class="nav-link text-dark ">
                    <i class="fa-solid fa-helmet-safety"></i> Specialistai
                </a>
            </li>
            <li class="<?php if($page=="Paslaugos"){echo 'active';}?> nav-item">
                <a href="services.php" class="nav-link text-dark">
                    <i class="fa-solid fa-gears"></i> Paslaugos
                </a>
            </li>
            <li class="<?php if($page=="Vartotojai"){echo 'active';}?> nav-item">
                <a href="adminUsers.php" class="nav-link text-dark">
                    <i class="fa-solid fa-user"></i> Vartotojai
                </a>
            </li>

            <li class="<?php if($page=="Taisymai"){echo 'active';}?> nav-item">
                <a href="adminOrders.php" class="nav-link text-dark">
                    <i class="fa-solid fa-screwdriver-wrench"></i> Taisymai
                </a>
            </li>

            <li class="<?php if($page=="Apmokėjimai"){echo 'active';}?> nav-item">
                <a href="adminPayments.php" class="nav-link text-dark">
                    <i class="fa-solid fa-euro-sign"></i> Apmokėjimai
                </a>
            </li>
            <!-- 
            <li class="nav-item">
                <a href="#" class="nav-link text-dark">
                    Prietaisai
                </a>
            </li> -->
        </ul>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>