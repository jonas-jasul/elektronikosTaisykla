<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/20bfdee84e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/user.css" type="text/css">
</head>

<body>
    <?php include("functions/functions.php"); ?>
    <?php include("functions/selectServiceUser.php"); ?>

    <?php
    
    if (isLoggedIn(true)) {       
        include("loggedInHeader.php");
    } else {
        include("welcomeHeader.php");
    }
    ?>
    <div class="container phone-form-div">
        <div class="row">
            <div class="col">
                <h3 class="h3">Telefonų taisymas</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-2 phone-form">
                <form action="" method="POST">
                    <div class="form-group">
                        <label class="">Telefono gamintojas</label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1">Samsung</option>
                            <option value="2">Apple</option>
                            <option value="3">Xiaomi</option>
                            <option value="4">Huawei</option>
                            <option value="5">Realme</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <br>
                        <label class="">Telefono modelis</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <br>
                        <label class="">Pageidaujama paslauga</label>
                        <select class="form-select" name="service">
                            <?php                            
                            while ($service = mysqli_fetch_array(
                                $phone_services,
                                MYSQLI_ASSOC
                            )) :;
                            ?>
                                <option value="<?php echo $service['service_name'];
                                                ?>">
                                    <?php echo $service["service_name"];
                                    ?>
                                </option>
                            <?php
                            endwhile;
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mt-2">Siųsti užklausą
                </form>
            </div>
        </div>

    </div>

</body>

</html>