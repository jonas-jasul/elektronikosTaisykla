<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/20bfdee84e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/welcome.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <title>Vartotojo panelė</title>
</head>

<body>
    <?php include_once("functions/functions.php");
    include("functions/selectServiceUser.php");
    include("functions/selectUserOrders.php");
    //include_once("functions/pagination.php");
    if (!isLoggedIn()) {
        $_SESSION['msg'] = "Jūs turite pirmiau prisijungti";
        header('location: login.php');
    }

    if (isEmployee()) {
        header('location: employeePage.php');
    }
    ?>
    <nav class="navbar navbar-expand-lg py-0 navbar-light bg-light shadow-sm">
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
                <ul class="navbar-nav ms-auto">
                    <div class="profile-info">
                        <div>
                            <?php if (isset($_SESSION['user'])) : ?>
                                <a href="userSettingsPage.php"><strong><?php echo $_SESSION['user']['name']; ?></strong></a>

                                <small>
                                    <i style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
                                    <br>
                                    <a href="login.php?logout='1'" style="color: red;">atsijungti</a>
                                </small>
                            <?php endif ?>
                        </div>
                    </div>
                </ul>
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

    <form action="functions/insertOrder.php" method="POST">

        <div class="modal fade" id="phoneRepairModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Telefonų taisymas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="order_item_specializ" value=1>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="order_user_id" value="<?php echo $_SESSION['user']['id'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="order_amount_to_pay">
                        </div>
                        <div class="form-group">
                            <label class="">Telefono gamintojas</label>
                            <select name="order_item_manufact" class="form-select" aria-label="Default select example">
                                <option value="Samsung">Samsung</option>
                                <option value="Apple">Apple</option>
                                <option value="Xiaomi">Xiaomi</option>
                                <option value="Huawei">Huawei</option>
                                <option value="Realme">Realme</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <br>
                            <label class="">Telefono modelis</label>
                            <input name="order_item_model" required="required" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <br>
                            <label class="">Pageidaujama paslauga</label>
                            <select class="form-select" id="order_service_id_phone" name="order_service_id" required>
                                <option value="" selected disabled>--</option>
                                <?php
                                while ($service = mysqli_fetch_array(
                                    $phone_services,
                                    MYSQLI_ASSOC
                                )) :;
                                ?>
                                    <option value="<?php echo $service['service_id'];
                                                    ?>">
                                        <?php echo $service["service_name"];
                                        ?>
                                    </option>
                                <?php
                                endwhile;
                                ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <br>
                            <label class="">Paslaugos kaina</label>
                            <br>
                            <div class="input-group">
                                <input id="order_item_price_phone" name="order_item_price" type="text" class="form-control" aria-describedby="basic-addon" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon">€</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Uždaryti</button>
                        <button type="submit" name="sendPhoneOrderRequest" class="btn btn-primary">Užsakyti</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="functions/insertOrder.php" method="POST">

        <div class="modal fade" id="desktopRepairModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Stacionarių kompiuterių taisymas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="order_item_specializ" value=1>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="order_user_id" value="<?php echo $_SESSION['user']['id'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="order_amount_to_pay" value="100">
                        </div>
                        <div class="form-group">
                            <label class="">Kompiuterio gamintojas</label>
                            <select name="order_item_manufact" class="form-select" aria-label="Default select example">
                                <option value="Dell">Dell</option>
                                <option value="Hp">HP</option>
                                <option value="Apple">Apple</option>
                                <option value="Microsoft">Microsoft</option>
                                <option value="Acer">Acer</option>
                                <option value="Lenovo">Lenovo</option>
                                <option value="Asus">Asus</option>
                                <option value="Asus">Kitas</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <br>
                            <label class="">Kompiuterio modelis</label>
                            <input name="order_item_model" required="required" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <br>
                            <label class="">Pageidaujama paslauga</label>
                            <select id="order_service_id_desktop" class="form-select" name="order_service_id" required>
                                <option value="" selected disabled>--</option>
                                <?php
                                while ($service = mysqli_fetch_array(
                                    $desktop_services,
                                    MYSQLI_ASSOC
                                )) :;
                                ?>
                                    <option value="<?php echo $service['service_id'];
                                                    ?>">
                                        <?php echo $service["service_name"];
                                        ?>
                                    </option>
                                <?php
                                endwhile;
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <br>
                            <label class="">Paslaugos kaina</label>
                            <br>
                            <div class="input-group">
                                <input id="order_item_price_desktop" name="order_item_price" type="text" class="form-control" aria-describedby="basic-addon" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon">€</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Uždaryti</button>
                        <button type="submit" name="sendDesktopOrderRequest" class="btn btn-primary">Užsakyti</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="functions/insertOrder.php" method="POST">

        <div class="modal fade" id="consoleRepairModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Žaidimų konsolių taisymas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="order_item_specializ" value=1>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="order_user_id" value="<?php echo $_SESSION['user']['id'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="order_amount_to_pay" value="100">
                        </div>
                        <div class="form-group">
                            <label class="">Konsolės gamintojas</label>
                            <select name="order_item_manufact" class="form-select" aria-label="Default select example">
                                <option value="Sony">Sony</option>
                                <option value="Microsoft">Microsoft</option>
                                <option value="Nintendo">Nintendo</option>
                                <option value="Kita">Kita</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <br>
                            <label class="">Konsolės modelis</label>
                            <input name="order_item_model" required="required" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <br>
                            <label class="">Pageidaujama paslauga</label>
                            <select id="order_service_id_console" class="form-select" name="order_service_id" required>
                                <option value="" selected disabled>--</option>

                                <?php
                                while ($service = mysqli_fetch_array(
                                    $console_services,
                                    MYSQLI_ASSOC
                                )) :;
                                ?>
                                    <option value="<?php echo $service['service_id'];
                                                    ?>">
                                        <?php echo $service["service_name"];
                                        ?>
                                    </option>
                                <?php
                                endwhile;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <br>
                            <label class="">Paslaugos kaina</label>
                            <br>
                            <div class="input-group">
                                <input id="order_item_price_console" name="order_item_price" type="text" class="form-control" aria-describedby="basic-addon" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon">€</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Uždaryti</button>
                        <button type="submit" name="sendConsoleOrderRequest" class="btn btn-primary">Užsakyti</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="functions/insertOrder.php" method="POST">

        <div class="modal fade" id="laptopRepairModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nešiojamų kompiuterių taisymas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="order_item_specializ" value=1>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="order_user_id" value="<?php echo $_SESSION['user']['id'] ?>">
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="order_amount_to_pay" value="100">
                        </div>
                        <div class="form-group">
                            <label class="">Nešiojamo kompiuterio gamintojas</label>
                            <select name="order_item_manufact" class="form-select" aria-label="Default select example">
                                <option value="Apple">Apple</option>
                                <option value="Hp">HP</option>
                                <option value="Samsung">Samsung</option>
                                <option value="Dell">Dell</option>
                                <option value="Microsoft">Microsoft</option>
                                <option value="Lenovo">Lenovo</option>
                                <option value="Kita">Kita</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <br>
                            <label class="">Nešiojamo kompiuterio modelis</label>
                            <input name="order_item_model" required="required" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <br>
                            <label class="">Pageidaujama paslauga</label>
                            <select class="form-select" id="order_service_id_laptop" name="order_service_id">
                                <option value="" selected disabled>--</option>
                                <?php
                                while ($service = mysqli_fetch_array(
                                    $laptop_services,
                                    MYSQLI_ASSOC
                                )) :;
                                ?>
                                    <option value="<?php echo $service['service_id'];
                                                    ?>">
                                        <?php echo $service["service_name"];
                                        ?>
                                    </option>
                                <?php
                                endwhile;
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <br>
                            <label class="">Paslaugos kaina</label>
                            <br>
                            <div class="input-group">
                                <input id="order_item_price_laptop" name="order_item_price" type="text" class="form-control" aria-describedby="basic-addon" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon">€</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Uždaryti</button>
                        <button type="submit" name="sendConsoleOrderRequest" class="btn btn-primary">Užsakyti</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="container">
        <h2>Vartotojo panelė</h2>
        <div class="row">
            <h5>Paslaugos pasirinkimas</h5>
            <div class="col">
                <div class="card h-100">
                    <div class="svgImg">
                        <img src="images/phone-svgrepo-com.svg" class="card-img-top mx-auto pt-2" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Telefonų taisymas</h5>
                        <p class="card-text">

                            <?php if (isLoggedIn(true)) { ?>
                        <div class="pirmyn">
                            <span>
                                <a data-bs-toggle="modal" href="#phoneRepairModal" class="pirmyn-link">Pasirinkti <i class="fa-solid fa-arrow-right"></i></a>
                            </span>
                        </div>
                    <?php }  ?>
                    </p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <div class="svgImg">
                        <img src="images/pc-svgrepo-com.svg" class="card-img-top mx-auto" id="card-img-computer" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Stacionarių kompiuterių taisymas</h5>
                        <p class="card-text">
                            <?php if (isLoggedIn(true)) { ?>
                        <div class="pirmyn">
                            <span>
                                <a data-bs-toggle="modal" href="#desktopRepairModal" class="pirmyn-link">Pasirinkti <i class="fa-solid fa-arrow-right"></i></a>

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
                    <div class="svgImg">
                        <img src="images/game-console-svgrepo-com.svg" class="card-img-top mx-auto" id="card-img-console" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Žaidimų konsolių taisymas</h5>
                        <p class="card-text">

                            <?php if (isLoggedIn(true)) { ?>
                        <div class="pirmyn">
                            <span>
                                <a data-bs-toggle="modal" href="#consoleRepairModal" class="pirmyn-link">Pasirinkti <i class="fa-solid fa-arrow-right"></i></a>

                            </span>
                        </div>
                    <?php }  ?>
                    </p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <div class="svgImg">
                        <img src="images/laptop-svgrepo-com.svg" class="card-img-top mx-auto" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Nešiojamų kompiuterių taisymas</h5>
                        <p class="card-text">

                            <?php if (isLoggedIn(true)) { ?>
                        <div class="pirmyn">
                            <span>
                                <a data-bs-toggle="modal" href="#laptopRepairModal" class="pirmyn-link">Pasirinkti <i class="fa-solid fa-arrow-right"></i></a>

                            </span>
                        </div>
                    <?php }  ?>
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pb-5">
        <div class="row">
            <div class="col">
                <h5 id="manoTaisymuPaslaug" class="pt-3">Mano taisymo paslaugų užsakymai</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <table id="userOrdersTable" class="table table-responsive table-bordered table-striped table-hover">
                    <thead>
                        <tr id="userTableTitleRow">
                            <th scope="col">#</th>
                            <th scope="col">Kodas</th>
                            <th scope="col">Sukūrimo data</th>
                            <th scope="col">Specializacija</th>
                            <th scope="col">Gamintojas</th>
                            <th scope="col">Modelis</th>
                            <th scope="col">Paslauga</th>
                            <th style="display:none;" scope="col">Specialistas</th>
                            <th scope="col">Statusas</th>
                            <th style="display:none;" scope="col">Numatoma pabaigimo data</th>
                            <th scope="col">Mokama kaina</th>
                            <th scope="col">Apmokėjimo statusas</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th style="display:none;" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($user_orders = mysqli_fetch_array(
                            $all_user_orders,
                            MYSQLI_ASSOC
                        )) :;
                        ?>
                            <tr id="userTableDataRow">
                                <td><?php echo $user_orders['order_id'] ?? ''; ?></th>
                                <td><?php echo $user_orders['order_code'] ?? ''; ?></td>
                                <td><?php echo $user_orders['order_request_date'] ?? ''; ?></td>
                                <td><?php echo $user_orders['specializ_name'] ?? ''; ?></td>
                                <td><?php echo $user_orders['order_item_manufact'] ?? ''; ?></td>
                                <td><?php echo $user_orders['order_item_model'] ?? ''; ?></td>
                                <td><?php echo $user_orders['service_name'] ?? ''; ?></td>
                                <td style="display: none;"><?php echo $user_orders['techn_name'] ?? ''; ?></td>
                                <td><?php echo $user_orders['order_status'] == "Aktyvus" ? ' <span class="badge bg-success">Aktyvus</span>' : ($user_orders['order_status'] == "Pabaigtas" ? ' <span class="badge bg-secondary">Pabaigtas</span>' : '<span class="badge bg-danger">Neaktyvus</span>') ?></td>
                                <td style="display: none;"><?php echo $user_orders['order_complet_date_est'] ?? ''; ?></td>
                                <td><?php echo $user_orders['order_amount_to_pay'] ?? ''; ?></td>
                                <td><?php
                                    echo $user_orders['is_paid'] == "0" ? '<span class="badge rounded-pill bg-warning text-dark">Neapmokėtas</span>' : '<span class="badge rounded-pill text-dark bg-info">Apmokėtas</span>'; ?>
                                </td>
                                <td style="display: none;"><?php echo $user_orders['order_descrip'] ?? ''; ?></td>
                                <td><button data-bs-toggle="modal" data-bs-target="#cancelOrderUser" class="cancelOrderBtn btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button></td>
                                <td><button data-bs-toggle="modal" data-bs-target="#moreInfoUserOrder" class="morInfoBtn btn btn-primary"><i class="fa fa-info-circle" aria-hidden="true"></i></button></td>
                                <td><button data-bs-toggle="modal" data-bs-target="#payOrderUser" class="payOrderBtn btn btn-success"><i class="fas fa-euro-sign"></i></button></td>

                            </tr>


                            <div class="modal fade" id="moreInfoUserOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Daugiau apie užsakymą</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="order_more_info_id" id="order_more_info_id">
                                            <label for="oder_more_info_code">Užsakymo kodas</label>
                                            <br>
                                            <input class="form-control modal-input-box" type="text" name="oder_more_info_code" id="oder_more_info_code" readonly>
                                            <label for="order_more_info_creat_date">Sukūrimo data</label>
                                            <br>
                                            <input class="form-control modal-input-box" type="text" name="order_more_info_creat_date" id="order_more_info_creat_date" readonly>

                                            <label for="order_more_info_specializ">Specializacija</label>
                                            <br>
                                            <input class="form-control modal-input-box" type="text" name="order_more_info_specializ" id="order_more_info_specializ" readonly>

                                            <label for="order_more_info_manufac">Gamintojas</label>
                                            <br>
                                            <input class="form-control modal-input-box" type="text" name="order_more_info_manufac" id="order_more_info_manufac" readonly>
                                            <label for="order_more_info_model">Modelis</label>
                                            <br>
                                            <input class="form-control modal-input-box" type="text" name="order_more_info_model" id="order_more_info_model" readonly>
                                            <label for="order_more_info_service">Paslauga</label>
                                            <br>
                                            <input class="form-control" type="text" name="order_more_info_service" id="order_more_info_service" readonly>

                                            <label for="order_more_info_techn">Specialistas</label>
                                            <br>
                                            <input class="form-control modal-input-box" type="text" name="order_more_info_techn" id="order_more_info_techn" readonly>

                                            <label for="order_more_info_est_compl_date">Numatoma pabaigimo data</label>
                                            <br>
                                            <input class="form-control" type="text" name="order_more_info_est_compl_date" id="order_more_info_est_compl_date" readonly>

                                            <label for="order_more_info_descrip">Pastabos/Aprašymas</label>
                                            <br>
                                            <textarea class="form-control" name="order_more_info_descrip" id="order_more_info_descrip" readonly></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Grįžti</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        ?>

                    </tbody>
                </table>


                <form action="functions/cancelOrder.php" method="POST" class="form">
                    <div class="modal fade" id="cancelOrderUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Atšaukti užsakymą</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="order_id_cancel" id="order_id_cancel">
                                    <h4>Ar tikrai norite atšaukti šį užsakymą?</h4>
                                    <label for="cancelOrderCode">Užsakymo kodas</label>
                                    <br>
                                    <input class="form-control modal-input-box" type="text" name="cancelOrderCode" id="cancelOrderCode" readonly>
                                    <label for="cancelOrderDate">Sukūrimo data</label>
                                    <br>
                                    <input class="form-control modal-input-box" type="text" name="cancelOrderDate" id="cancelOrderDate" readonly>
                                    <label for="cancelOrderManufac">Gamintojas</label>
                                    <br>
                                    <input class="form-control modal-input-box" type="text" name="cancelOrderManufac" id="cancelOrderManufac" readonly>
                                    <label for="cancelOrderModel">Modelis</label>
                                    <br>
                                    <input class="form-control modal-input-box" type="text" name="cancelOrderModel" id="cancelOrderModel" readonly>
                                    <label for="cancelOrderService">Paslauga</label>
                                    <br>
                                    <input class="form-control" type="text" name="cancelOrderService" id="cancelOrderService" readonly>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Grįžti</button>
                                    <button type="submit" name="acceptOrderCancellationBtn" class="btn btn-primary">Patvirtinti atšaukimą</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>



                <div class="modal fade" id="payOrderUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Užsakymo apmokėjimas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input style="display:none;" name="order_id_pay" id="order_id_pay">
                                <h4>Ar norite apmokėti šį užsakymą?</h4>
                                <label for="payOrderCode">Užsakymo kodas</label>
                                <br>
                                <input class="form-control modal-input-box" type="text" name="payOrderCode" id="payOrderCode" readonly>

                                <label for="payOrderService">Paslauga</label>
                                <br>
                                <input class="form-control" type="text" name="payOrderService" id="payOrderService" readonly>

                                <label for="payOrderPrice">Kaina</label>
                                <div class="input-group">
                                    <input id="payOrderPrice" name="payOrderPrice" type="text" class="form-control" aria-describedby="basic-addon" readonly>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon">€</span>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Grįžti</button>
                                <button type="button" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#userPaymentSecond" id="userProceedToPayment" name="userProceedToPayment" class="btn btn-primary">Tęsti apmokėjimą</button>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal fade" id="userPaymentSecond" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mokėjimo būdo pasirinkimas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container" id="paymentGroup">
                                    <div class="row">
                                        <input type="hidden" name="order_id_pay_2" id="order_id_pay_2">
                                        <h4 class="modalPayTotal">Iš viso mokėti:</h4>
                                        <br>
                                        <h3 id="payOrderPriceH"></h3>
                                        <div class="col-4">
                                            <h6 class="paymentPlatform">Mokėjimas banko kortele <i class="fa-regular fa-credit-card"></i></h6>
                                            <a class="btn" href="#bankCollapse" role="button" data-bs-parent="#paymentGroup" data-bs-toggle="collapse" data-bs-target="#bankCollapse" aria-expanded="false" aria-controls="bankCollapse"><img class="bankCardLogo img-fluid" src="images/Mastercard-logo.svg.png"></a>
                                            <a class="btn" href="#bankCollapse1" role="button" data-bs-parent="#paymentGroup" data-bs-toggle="collapse" data-bs-target="#bankCollapse1" aria-expanded="false" aria-controls="bankCollapse1"><img class="bankCardLogo img-fluid" src="images/Maestro_2016.svg.png"></a>
                                            <a class="btn" href="#bankCollapse2" role="button" data-bs-parent="#paymentGroup" data-bs-toggle="collapse" data-bs-target="#bankCollapse2" aria-expanded="false" aria-controls="bankCollapse2"><img class="bankCardLogo img-fluid" src="images/Visa_Inc._logo.svg.png"></a>
                                            <a class="btn" href="#bankCollapse3" role="button" data-bs-parent="#paymentGroup" data-bs-toggle="collapse" data-bs-target="#bankCollapse3" aria-expanded="false" aria-controls="bankCollapse3"><img class="bankCardLogo img-fluid" src="images/1200px-American_Express_logo_(2018).svg.webp"></a>
                                        </div>

                                        <div class="col-4">
                                            <h6 class="paymentPlatform">Mokėjimas per PayPal <i class="fa-brands fa-paypal"></i></h6>
                                            <a class="btn" href="#paypal-button-container" role="button" data-bs-parent="#paymentGroup" data-bs-toggle="collapse" data-bs-target="#paypal-button-container" aria-expanded="false" aria-controls="paypal-button-container"><img class="paypalLogo img-fluid" src="images/PayPal.svg.png"></a>
                                            <script src="https://www.paypal.com/sdk/js?client-id=AULCB_DZ9omjV7nQhkaRZr8NgvC0d_OoY1sb5252K-ytkr2wlwMnOhpbegGRRZU4I-S1PJkZorjcrkKI&currency=EUR&locale=en_LT"></script>
                                            <!-- Set up a container element for the button -->
                                            <div class="collapse in" id="paypal-button-container"></div>


                                            <script>
                                                paypal.Buttons({

                                                    // Sets up the transaction when a payment button is clicked
                                                    createOrder: (data, actions) => {
                                                        return actions.order.create({
                                                            purchase_units: [{
                                                                custom_id: paypalOrderPaymentId,
                                                                amount: {
                                                                    value: paypalOrderPrice // Can also reference a variable or function
                                                                }
                                                            }]
                                                        });
                                                    },
                                                    // Finalize the transaction after payer approval
                                                    onApprove: (data, actions) => {
                                                        return actions.order.capture().then(function(orderData) {
                                                            // Successful capture! For dev/demo purposes:
                                                            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                                                            const transaction = orderData.purchase_units[0].payments.captures[0];
                                                            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                                                            // When ready to go live, remove the alert and show a success message within this page. For example:
                                                            // const element = document.getElementById('paypal-button-container');
                                                            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                                                            // Or go to another URL:  actions.redirect('thank_you.html');

                                                            $.ajax({
                                                                url: "functions/payOrder.php",
                                                                type: 'post',
                                                                data: {
                                                                    'paymentID': paypalOrderPaymentId,
                                                                    'amountPaid':paypalOrderPrice
                                                                },
                                                                dataType: 'json',
                                                                cache: false,
                                                                success: function(msg) {
                                                                    alert(msg);
                                                                }
                                                            });
                                                            // return fetch('functions/payOrder.php', {
                                                            //     method: 'post',
                                                            //     headers: {
                                                            //         'content-type': 'application/json'
                                                            //     },
                                                            //     body: JSON.stringify({
                                                            //         paymentId: data.custom_id
                                                            //     })
                                                            // });

                                                        });
                                                    }
                                                }).render('#paypal-button-container');
                                            </script>
                                        </div>


                                        <div class="col-4">
                                            <h6 class="paymentPlatform">Atsiskaitymas grynais <i class="fa-regular fa-handshake"></i></h6>
                                            <a class="btn" href="#cashCollapse" role="button" data-bs-parent="#paymentGroup" data-bs-toggle="collapse" data-bs-target="#cashCollapse" aria-expanded="false" aria-controls="cashCollapse"><img class="paypalLogo img-fluid" src="images/money-svgrepo-com.svg"></a>

                                            <div class="collapse in" id="cashCollapse">
                                                <form>
                                                    <h6>Atsiskaitymas grynais taisykloje:</h6>
                                                    <label>Vardas ir pavardė </label>
                                                    <br>
                                                    <input class="form-control" type="text" required>
                                                </form>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="collapse in" id="bankCollapse">

                                                <form>
                                                    <h6>Mastercard kortėlės duomenys:</h6>
                                                    <label>Vardas ir pavardė</label>
                                                    <br>
                                                    <input class="form-control" type="text" required>
                                                    <label>Kortelės numeris</label>
                                                    <br>
                                                    <input class="form-control" type="text" required>
                                                    <label>Galioja iki</label>
                                                    <br>
                                                    <span class="expiration">
                                                        <input class="expirybox" type="text" name="month" placeholder="MM" maxlength="2" size="2" required />
                                                        <span>/</span>
                                                        <input class="expirybox" type="text" name="year" placeholder="YY" maxlength="2" size="2" required />
                                                    </span>
                                                    <br>
                                                    <label>CVC</label>
                                                    <br>
                                                    <input class="form-control" type="text" required>
                                                </form>

                                            </div>

                                            <div class="collapse in" id="bankCollapse1">

                                                <form>
                                                    <h6>Maestro kortėlės duomenys:</h6>
                                                    <label>Vardas ir pavardė</label>
                                                    <br>
                                                    <input class="form-control" type="text" required>
                                                    <label>Kortelės numeris</label>
                                                    <br>
                                                    <input class="form-control" type="text" required>
                                                    <label>Galioja iki</label>
                                                    <br>
                                                    <input class="form-control" type="text" required>
                                                    <label>CVC</label>
                                                    <br>
                                                    <input class="form-control" type="text" required>
                                                </form>

                                            </div>

                                            <div class="collapse in" id="bankCollapse2">

                                                <form>
                                                    <h6>VISA kortėlės duomenys:</h6>
                                                    <label>Vardas ir pavardė</label>
                                                    <br>
                                                    <input class="form-control" type="text" required>
                                                    <label>Kortelės numeris</label>
                                                    <br>
                                                    <input class="form-control" type="text" required>
                                                    <label>Galioja iki</label>
                                                    <br>
                                                    <input class="form-control" type="text" required>
                                                    <label>CVC</label>
                                                    <br>
                                                    <input class="form-control" type="text" required>
                                                </form>

                                            </div>

                                            <div class="collapse in" id="bankCollapse3">

                                                <form>
                                                    <h6>American Express kortėlės duomenys:</h6>
                                                    <label>Vardas ir pavardė</label>
                                                    <br>
                                                    <input class="form-control" type="text" required>
                                                    <label>Kortelės numeris</label>
                                                    <br>
                                                    <input class="form-control" type="text" required>
                                                    <label>Galioja iki</label>
                                                    <br>
                                                    <input class="form-control" type="text" required>
                                                    <label>CVC</label>
                                                    <br>
                                                    <input class="form-control" type="text" required>
                                                </form>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Grįžti</button>
                                <button type="submit" id="userProceedToPayment" name="userProceedToPayment" class="btn btn-primary">Apmokėti</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>

                <!-- <div class="pagination">
                    <?php
                    $pageLink = "";
                    if ($pageNr >= 2) {
                        echo "<a href='userPage.php?pageNr=" . ($pageNr - 1) . "'>  Ankstenis </a>";
                    }

                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($i == $pageNr) {
                            $pageLink .= "<a class='active' href='userPage.php?pageNr=" . $i . "'>" . $i . "</a>";
                        } else {
                            $pageLink .= "<a href='userPage.php?pageNr=" . $i . "'>" . $i . "</a>";
                        }
                    };
                    echo $pageLink;

                    if ($pageNr < $total_pages) {
                        echo "<a href='userPage.php?pageNr=" . ($pageNr + 1) . "'>Sekantis</a>";
                    }
                    ?>
                </div> -->
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {


            $('.morInfoBtn').on('click', function() {
                //$('#acceptOrderModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children('td').map(function() {

                    return $(this).text();
                }).get();

                $("#oder_more_info_code").val(data[1]);
                // var orderCreatDatFirst=new Date(data[2]);
                // var correctedDate=orderCreatDatFirst.toLocaleDateString();
                $("#order_more_info_creat_date").val(data[2]);
                $("#order_more_info_specializ").val(data[3]);
                $("#order_more_info_manufac").val(data[4]);
                $("#order_more_info_model").val(data[5]);
                $("#order_more_info_service").val(data[6]);
                $("#order_more_info_techn").val(data[7]);
                $("#order_more_info_est_compl_date").val(data[9]);
                $("#order_more_info_descrip").val(data[12]);
            });

            $('.cancelOrderBtn').on('click', function() {
                $tr = $(this).closest('tr');
                var data = $tr.children('td').map(function() {
                    return $(this).text();
                }).get();
                $("#order_id_cancel").val(data[0]);
                $("#cancelOrderCode").val(data[1]);
                $("#cancelOrderDate").val(data[2]);
                $("#cancelOrderManufac").val(data[4]);
                $("#cancelOrderModel").val(data[5]);
                $("#cancelOrderService").val(data[6]);
            });

            $('.payOrderBtn').on('click', function() {
                $tr = $(this).closest('tr');
                var data = $tr.children('td').map(function() {
                    return $(this).text();
                }).get();
                $("#order_id_pay").val(data[0]);
                $("#payOrderCode").val(data[1]);
                $("#payOrderService").val(data[6]);
                $("#payOrderPrice").val(data[10]);
                document.getElementById("payOrderPriceH").innerHTML = data[10];
                window.paypalOrderPrice = data[10];
                window.paypalOrderPaymentId = data[0];
                var $group = $('#paymentGroup');
                $group.on('show.bs.collapse', '.collapse', function() {
                    $group.find('.collapse.in').collapse('hide');
                });



            });


            function getPrice(typeId, typePrice) {
                $(typeId).on('change', function() {

                    $.ajax({
                        url: "functions/getServicePrice.php",
                        type: "POST",
                        dataType: "json",
                        data: {
                            'order_service_id': $(typeId).val()
                        },
                        success: function(data) {
                            $(typePrice).val(data[0].price);
                        }
                    });
                });
            }

            getPrice('#order_service_id_phone', '#order_item_price_phone');
            getPrice('#order_service_id_console', '#order_item_price_console');
            getPrice('#order_service_id_desktop', '#order_item_price_desktop');
            getPrice('#order_service_id_laptop', '#order_item_price_laptop');

            $("#userOrdersTable").DataTable({
                "language": {
                    "decimal": "",
                    "emptyTable": "Įrašų nėra",
                    "info": "Rodoma nuo _START_ iki _END_ iš _TOTAL_ įrašų",
                    "infoEmpty": "Rodoma nuo 0 iki 0 iš 0 įrašų  ",
                    "infoFiltered": "(Išfiltruota iš _MAX_ įrašų)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Rodyti _MENU_ įrašų",
                    "loadingRecords": "Kraunama...",
                    "processing": "",
                    "search": "Ieškoti:",
                    "zeroRecords": "Ieškomų įrašų nerasta",
                    "paginate": {
                        "first": '<i class="fa fa-step-backward"></i>',
                        "last": '<i class="fa fa-step-forward"></i>',
                        "next": '<i class="fa fa-forward"></i>',
                        "previous": '<i class="fa fa-backward"></i>'
                    },
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                },
                lengthMenu: [5, 10, 15, 20, 50],
            });




            //--Pakeista su getPrice() funkcija (kad nesikartotu)--

            // var service_id = $('#order_service_id_phone');
            // $("#order_service_id_phone").on('change', function() {

            //     $.ajax({
            //         url: "functions/getServicePrice.php",
            //         type: "POST",
            //         dataType: "json",
            //         data: {
            //             'order_service_id': $('#order_service_id_phone').val()
            //         },
            //         success: function(data) {
            //             $('#order_item_price_phone').val(data[0].price);
            //         }
            //     });
            // });

            // $("#order_service_id_console").on('change', function() {
            //     $.ajax({
            //         url: "functions/getServicePrice.php",
            //         type: "POST",
            //         dataType: "json",
            //         data: {
            //             'order_service_id': $('#order_service_id_console').val()
            //         },
            //         success: function(data) {
            //             $('#order_item_price_console').val(data[0].price);
            //         }
            //     });
            // });

            // $("#order_service_id_desktop").on('change', function() {
            //     $.ajax({
            //         url: "functions/getServicePrice.php",
            //         type: "POST",
            //         dataType: "json",
            //         data: {
            //             'order_service_id': $('#order_service_id_desktop').val()
            //         },
            //         success: function(data) {
            //             $('#order_item_price_desktop').val(data[0].price);
            //         }
            //     });
            // });

            // $("#order_service_id_laptop").on('change', function() {
            //     $.ajax({
            //         url: "functions/getServicePrice.php",
            //         type: "POST",
            //         dataType: "json",
            //         data: {
            //             'order_service_id': $('#order_service_id_laptop').val()
            //         },
            //         success: function(data) {
            //             $('#order_item_price_laptop').val(data[0].price);
            //         }
            //     });
            // });



        });
    </script>
    <?php include("footer.php") ?>
</body>

</html>