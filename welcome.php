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
    <title>Elektronikos taisyklos sistema</title>
</head>

<body>
    <?php include_once("functions/functions.php"); ?>

    <?php session_start();
    if (isLoggedIn(true) && !(isEmployee())) {
        include_once("loggedInHeader.php");
    } else if(isLoggedIn(true) ) {
        include_once("employeeHeader.php");
    }
    else {
        include_once("welcomeHeader.php");
    }
    ?>
    <div class="flex-wrapper">
        <div class="container position-relative">
            <div class="row">
                <div class="col">
                    <img src="images/welcomeImage.jpg" class="img-responsive welcomeImg">
                </div>
            </div>
            <div class="centered position-absolute top-50 start-50 translate-middle" id="welcomeDiv">
                <h1 class="welcomeText">Elektronikos taisymo paslaugos Vilkaviškyje!</h1>
                <a href="welcome.php#paslaugos-div"><button id="arrow-down-btn" class="arrow-down-btn"><i class="fa-solid fa-arrow-down fa-3x pt-2"></i></button></a>
                <br><br><br>
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
                    <div class="card h-100 ">
                        <div class="svgImg">
                            <!-- <img src="images/phone-svgrepo-com.svg" class="card-img-top mx-auto pt-2" alt="..."> -->

                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="110px" viewBox="0 0 544.49 544.489" style="enable-background:new 0 0 544.49 544.489;" xml:space="preserve">
                                <g>
                                    <g>
                                        <circle cx="243.92" cy="23.18" r="1.606" />
                                        <circle cx="248.616" cy="23.18" r="1.606" />
                                        <circle cx="253.301" cy="23.18" r="1.606" />
                                        <circle cx="257.987" cy="23.18" r="1.606" />
                                        <circle cx="262.682" cy="23.18" r="1.606" />
                                        <circle cx="267.377" cy="23.18" r="1.606" />
                                        <circle cx="272.063" cy="23.18" r="1.606" />
                                        <circle cx="276.749" cy="23.18" r="1.606" />
                                        <circle cx="281.434" cy="23.18" r="1.606" />
                                        <circle cx="286.149" cy="23.18" r="1.606" />
                                        <circle cx="290.834" cy="23.18" r="1.606" />
                                        <circle cx="295.52" cy="23.18" r="1.606" />
                                        <circle cx="300.206" cy="23.18" r="1.606" />
                                        <circle cx="304.901" cy="23.18" r="1.606" />
                                        <path d="M392.923,0H151.576c-19.508,0-35.314,15.807-35.314,35.314v473.86c0,19.507,15.807,35.314,35.314,35.314h241.338
			c19.508,0,35.314-15.808,35.314-35.314V35.314C428.238,15.807,412.431,0,392.923,0z M368.233,20.971
			c2.151,0,3.901,1.75,3.901,3.901c0,2.161-1.759,3.901-3.901,3.901c-2.161,0-3.901-1.75-3.901-3.901
			C364.322,22.721,366.072,20.971,368.233,20.971z M230.476,17.604h87.219c3.089,0,5.575,2.496,5.575,5.565
			c0,3.079-2.486,5.565-5.575,5.565h-87.219c-3.089,0-5.575-2.496-5.575-5.565C224.911,20.101,227.387,17.604,230.476,17.604z
			 M194.894,521.262h-8.587c-0.574,0-1.033-0.469-1.033-1.043c0-0.563,0.459-1.042,1.033-1.042h8.587
			c0.583,0,1.042,0.479,1.042,1.042C195.926,520.793,195.467,521.262,194.894,521.262z M194.894,517.073h-8.587
			c-0.574,0-1.033-0.459-1.033-1.033c0-0.573,0.459-1.042,1.033-1.042h8.587c0.583,0,1.042,0.469,1.042,1.042
			C195.926,516.614,195.467,517.073,194.894,517.073z M202.123,519.798c0,1.234-0.995,2.238-2.228,2.238
			c-1.234,0-2.238-1.004-2.238-2.238v-7.372h-14.124v7.372c0,1.234-0.994,2.238-2.228,2.238c-1.233,0-2.237-1.004-2.237-2.238
			v-9.601c0-1.233,1.004-2.237,2.237-2.237h18.59c1.233,0,2.228,1.004,2.228,2.237V519.798L202.123,519.798z M300.206,519.11
			c0,4.876-3.959,8.826-8.836,8.826h-38.623c-4.887,0-8.836-3.95-8.836-8.826v-7.727c0-4.877,3.949-8.826,8.836-8.826h38.623
			c4.877,0,8.836,3.949,8.836,8.826V519.11z M357.858,522.457h-7.01c-1.233,0-2.228-1.004-2.228-2.238
			c0-1.233,0.994-2.228,2.228-2.228h7.01c1.511,0,2.734-1.177,2.734-2.62c0-1.444-1.224-2.61-2.734-2.61h-5.91
			c-0.22,0.306-0.497,0.459-0.994,0.497c-0.124,0.066-0.335-0.029-0.487-0.096l-3.644-1.54c-0.44-0.191-0.736-0.621-0.736-1.1
			c0-0.478,0.287-0.918,0.727-1.1l3.644-1.539c0.439-0.191,0.966-0.086,1.31,0.258c0.048,0.048,0.096,0.096,0.134,0.153h5.958
			c3.969,0,7.19,3.184,7.19,7.086C365.048,519.282,361.827,522.457,357.858,522.457z M404.685,491.513H136.859V54.449h267.826
			V491.513z" />
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="card-body shadow-lg">
                            <h5 class="card-title">Telefonų taisymas</h5>
                            <p class="card-text">
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fa-sharp fa-solid fa-hammer"></i></span>
                                    Taisomi įvairių gamintojų (Samsung, Apple, Xiaomi ir kt.) išmanieji telefonai.
                                </li>
                                <li><span class="fa-li"><i class="fa-sharp fa-solid fa-hammer"></i></span>
                                    Atliekama techninė priežiūra.
                                </li>
                            </ul>
                            <!-- <?php if (isLoggedIn(true)) { ?>
                                <div class="pirmyn">
                                    <span>
                                        <a href="userRepairPhone.php" class="pirmyn-link">Daugiau! <i class="fa-solid fa-arrow-right"></i></a>

                                    </span>
                                </div>
                            <?php }  ?> -->
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="svgImg">
                            <img src="images/pc-svgrepo-com.svg" class="card-img-top mx-auto" id="card-img-computer" alt="...">
                        </div>
                        <div class="card-body shadow-lg">
                            <h5 class="card-title">Stacionarių kompiuterių taisymas</h5>
                            <p class="card-text">
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fa-sharp fa-solid fa-hammer"></i></span>
                                    Taisomi įvairūs stacionarūs kompiuteriai.
                                </li>
                                <li><span class="fa-li"><i class="fa-sharp fa-solid fa-hammer"></i></span>
                                    Vykdoma komponentų diagnostika.
                                </li>
                                <li><span class="fa-li"><i class="fa-sharp fa-solid fa-hammer"></i></span>
                                    Keičiami komponentai.
                                </li>
                            </ul>
                            <!-- <?php if (isLoggedIn(true)) { ?>
                                <div class="pirmyn">
                                    <span>
                                        <a href="#" class="pirmyn-link">Daugiau! <i class="fa-solid fa-arrow-right"></i></a>

                                    </span>
                                </div>
                            <?php }  ?> -->
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="svgImg">
                            <img src="images/game-console-svgrepo-com.svg" class="card-img-top mx-auto" id="card-img-console" alt="...">
                        </div>
                        <div class="card-body shadow-lg">
                            <h5 class="card-title">Žaidimų konsolių taisymas</h5>
                            <p class="card-text">
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fa-sharp fa-solid fa-hammer"></i></span>
                                    Taisomos Xbox, PlayStation ir Nintendo konsolės.
                                </li>
                                <li><span class="fa-li"><i class="fa-sharp fa-solid fa-hammer"></i></span>
                                    Keičiami konsolių kieteji diskai.
                                </li>
                            </ul>

                            <!-- <?php if (isLoggedIn(true)) { ?>
                                <div class="pirmyn">
                                    <span>
                                        <a href="#" class="pirmyn-link">Daugiau! <i class="fa-solid fa-arrow-right"></i></a>

                                    </span>
                                </div>
                            <?php }  ?> -->
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <div class="svgImg">
                            <img src="images/laptop-svgrepo-com.svg" class="card-img-top mx-auto" alt="...">
                        </div>
                        <div class="card-body shadow-lg">
                            <h5 class="card-title">Nešiojamų kompiuterių taisymas</h5>
                            <p class="card-text">
                            <ul class="fa-ul">
                                <li><span class="fa-li"><i class="fa-sharp fa-solid fa-hammer"></i></span>
                                    Taisomi nešiojamų kompiuterių gedimai.
                                </li>
                                <li><span class="fa-li"><i class="fa-sharp fa-solid fa-hammer"></i></span>
                                    Atliekama diagnostika.
                                </li>
                            </ul>
                            <!-- <?php if (isLoggedIn(true)) { ?>
                                <div class="pirmyn">
                                    <span>
                                        <a href="#" class="pirmyn-link">Daugiau! <i class="fa-solid fa-arrow-right"></i></a>

                                    </span>
                                </div>
                            <?php }  ?> -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div id="aboutUsDiv">
                        <div id="aboutUsH">
                            <h3>Apie mus:</h3>
                        </div>

                        <p>Mes esame elektronikos taisyklų tinklas, turintis padalinius visoje Lietuvoje!</p>
                        <p>Mūsų padalinių vietos: </p>

                        <!-- <ul class="fa-ul">

                            <li><span class="fa-li"><i class="fa-fw fa-solid fa-location-dot fa-bounce"></i></span>
                                Kaunas
                            </li>
                            <li><span class="fa-li"><i class="fa-solid fa-location-dot fa-bounce"></i></span>
                                Vilnius</li>
                            <li><span class="fa-li"><i class="fa-solid fa-location-dot fa-bounce"></i></span>
                                Marijampolė</li>
                            <li><span class="fa-li"><i class="fa-solid fa-location-dot fa-bounce"></i></span>
                                Vilkaviškis</li>
                            <li><span class="fa-li"><i class="fa-solid fa-location-dot fa-bounce"></i></span>
                                Alytus</li>
                            
                        </ul> -->
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-3">
                                    <b>Kaunas</b>
                                    <button class="btn btn-primary" id="btn-show-map1"><i class="fa-fw fa-solid fa-location-dot"></i></button></p>
                                    <div id="gmap1">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.59200545304!2d23.893931170267294!3d54.88853497766663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46e722147f481a21%3A0xdbd50df600de1c70!2zVUFCIMWgbWl0byBkaXJidHV2xJc!5e0!3m2!1sen!2slt!4v1668444702067!5m2!1sen!2slt" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <b>Vilnius</b>
                                    <button class="btn btn-primary" id="btn-show-map2"><i class="fa-fw fa-solid fa-location-dot"></i></button></p>
                                    <div id="gmap2">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24254.432250170474!2d25.238269821693795!3d54.72152987216756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd919d6fedc4b1%3A0x54791611bd50813f!2sLidl!5e0!3m2!1sen!2slt!4v1668447760199!5m2!1sen!2slt" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <b>Marijampolė</b>
                                    <button class="btn btn-primary" id="btn-show-map3"><i class="fa-fw fa-solid fa-location-dot"></i></button></p>
                                    <div id="gmap3">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7084.56144620135!2d23.338407103244272!3d54.559430627310064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46e12a2f31e11b97%3A0x90ca391779c771c3!2sDar%C5%BEo%2C%20Mi%C5%A1ko%20technika%20ir%20remontas!5e0!3m2!1sen!2slt!4v1669575830093!5m2!1sen!2slt" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <b>Vilkaviškis</b>
                                    <button class="btn btn-primary" id="btn-show-map4"><i class="fa-fw fa-solid fa-location-dot"></i></button></p>
                                    <div id="gmap4">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2056.6839996463636!2d23.010726277070244!3d54.64715091678666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46e135efbef6d739%3A0x3704e18c9b8ae00f!2sKOMPIUTERI%C5%B2%20TELEFON%C5%B2%20AUDIO%20APARAT%C5%AAROS%20GPS%20NAVIGACIJ%C5%B2%20REMONTAS!5e0!3m2!1sen!2slt!4v1669575953573!5m2!1sen!2slt" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>Kiekvienas mūsų padalinys pasižymi profesionalumu, kokybe ir efektyvumu, todėl pasirinkus mus, jūs tikrai nepasigailėsite!</p>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script src="scripts/showHideMap.js"></script>
        <script src="scripts/welcome.js">
        </script>
        <?php include("footer.php"); ?>
    </div>
</body>

</html>