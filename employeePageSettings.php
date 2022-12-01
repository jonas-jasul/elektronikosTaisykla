<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darbuotojo panelės nustatymai</title>
    <link rel="stylesheet" href="css/user.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
</head>

<body>
    <?php
    include('employeeHeader.php');
    include_once('functions/selectSpecialization.php');
    include_once('functions/selectEmployeeSettings.php');
    ?>
    <div class="container">
        <div class="row">
            <h2>Darbuotojo panelės nustatymai</h2>
            <div class="col-4 mx-auto">
                <form class="form" method="POST" action="functions/updateTechn.php">
                    <input style="display: none;" name="employeeSettingsId" value="<?php echo $_SESSION['user']['id']?>">
                    <label for="employeeSettingsName">Vardas ir pavardė</label>
                    <input class="form-control" name="employeeSettingsName" id="employeeSettingsName" value="<?php echo $_SESSION['user']['name'] ?>">
                    <label for="employeeSettingsEmail">Email</label>
                    <input class="form-control" name="employeeSettingsEmail" id="employeeSettingsEmail" value="<?php echo $_SESSION['user']['email'] ?>">
                    <label for="employeeSettingsTelNr">Tel. nr.</label>
                    <input class="form-control" name="employeeSettingsTelNr" id="employeeSettingsTelNr" value="<?php echo $_SESSION['user']['phone'] ?>">
                    <label for="employeeSettingsSpecializ">Specializacija</label>
                    <?php
                    while ($row = $settings_specializ->fetch_assoc()) {
                        $id = $row['techn_spec_id'];
                    }
                    ?>

                    <select name="employeeSettingsSpecializ" class="form-select">
                        <?php while ($row = mysqli_fetch_array($all_specializations)) { ?>
                            <option value="<?= $row['specializ_id']; ?>" <?= $row['specializ_id'] == $id ? ' selected' : ''; ?>>
                                <?= $row['specializ_name']; ?>
                            </option>
                        <?php } ?>
                    </select>

                    <button class="mt-2 btn btn-primary submit" type="submit" name="employeeSettingsSave">Išsaugoti</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>