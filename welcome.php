<!DOCTYPE html>
<html lang="en">

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
    <?php include("functions/functions.php"); ?>

    <?php session_start();
    if (isLoggedIn(true)) {
        include("loggedInHeader.php");
    } else {
        include("welcomeHeader.php");
    }
    ?>
    <div class="container position-relative">
        <div class="row">
            <div class="col">
                <img src="images/welcomeImage2.jpg" class="img-responsive welcomeImg">
            </div>
        </div>
        <div class="centered position-absolute top-50 start-50 translate-middle" id="welcomeDiv">
            <h1 class="welcomeText">Elektronikos taisymo paslaugos Vilkaviškyje!</h1>
            <a href="#paslaugos-div"><button id="arrow-down-btn" class="arrow-down-btn"><i class="fa-solid fa-arrow-down fa-3x pt-2"></i></button></a>
        </div>
    </div>

    <div id="paslaugos-div" class="container welcome-paslaugos">
        <h3 class="teikiamosPaslaugos">Teikiamos paslaugos</h3>
        <!-- <div class="row">
            <div class="col">
                <ul>
                    <li>Stacionarių, nešiojamų kompiuterių taisymas <i class="fa-solid fa-computer"></i></li>
                    <li>Planšetinių kompiuterių taisymas <span class="repair-icon1"><img src="images/tablet.png"></span></li>
                    <li>Telefonų taisymas <span class="repair-icon2"><img src="images/cell-phone.png"></span></li>
                    <li>Žaidimų konsolių taisymas <span class="repair-icon3"><img src="images/console.png"></span></li>
                </ul>
            </div>
        </div> -->

        <div class="row row-cols-1 row-cols-md-4 pb-2 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="images/cell-phone.png" class="card-img-top mx-auto pt-2" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Telefonų taisymas</h5>
                        <p class="card-text">
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fa-solid fa-spinner fa-pulse"></i></span>
                                Taisomi įvairių gamintojų (Samsung, Apple, Xiaomi ir kt.) išmanieji telefonai.
                            </li>
                            <li><span class="fa-li"><i class="fa-solid fa-spinner fa-pulse"></i></span>
                                Atliekama techninė priežiūra.
                            </li>
                        </ul>
                        <?php if (isLoggedIn(true)) { ?>
                            <div class="pirmyn"> 
                                <span>
                                <a href="userRepairPhone.php" class="pirmyn-link">Pirmyn! <i class="fa-solid fa-arrow-right"></i></a>
                                
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
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fa-solid fa-spinner fa-pulse"></i></span>
                                Taisomi įvairūs stacionarūs kompiuteriai.
                            </li>
                            <li><span class="fa-li"><i class="fa-solid fa-spinner fa-pulse"></i></span>
                                Vykdoma komponentų diagnostika.
                            </li>
                            <li><span class="fa-li"><i class="fa-solid fa-spinner fa-pulse"></i></span>
                                Keičiami komponentai.
                            </li>
                        </ul>
                        <?php if (isLoggedIn(true)) { ?>
                            <div class="pirmyn"> 
                                <span>
                                <a href="#" class="pirmyn-link">Pirmyn! <i class="fa-solid fa-arrow-right"></i></a>
                                
                                </span>                                                           
                            </div>
                        <?php }  ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="images/console.png" class="card-img-top mx-auto" id="card-img-console" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Žaidimų konsolių taisymas</h5>
                        <p class="card-text">
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fa-solid fa-spinner fa-pulse"></i></span>
                                Taisomos Xbox, PlayStation ir Nintendo konsolės.
                            </li>
                            <li><span class="fa-li"><i class="fa-solid fa-spinner fa-pulse"></i></span>
                                Keičiami konsolių kieteji diskai.
                            </li>
                        </ul>

                        <?php if (isLoggedIn(true)) { ?>
                            <div class="pirmyn"> 
                                <span>
                                <a href="#" class="pirmyn-link">Pirmyn! <i class="fa-solid fa-arrow-right"></i></a>
                                
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
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fa-solid fa-spinner fa-pulse"></i></span>
                                Taisomi nešiojamų kompiuterių gedimai.
                            </li>
                            <li><span class="fa-li"><i class="fa-solid fa-spinner fa-pulse"></i></span>
                                Atliekama diagnostika.
                            </li>
                        </ul>
                        <?php if (isLoggedIn(true)) { ?>
                            <div class="pirmyn"> 
                                <span>
                                <a href="#" class="pirmyn-link">Pirmyn! <i class="fa-solid fa-arrow-right"></i></a>
                                
                                </span>                                                           
                            </div>
                        <?php }  ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="scripts/welcome.js">        
    </script>
    <?php include("footer.php"); ?>
</body>

</html>