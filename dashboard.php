<?php include("functions/functions.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <title>Document</title>

</head>

<body>

    <h1 class="pb-2">Skydelis</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-dash specialistCard">
                    <div class="card-body-dash text-center">
                        <h5 class="card-title">Iš viso specialistų:</h5>
                        <?php
                        $dashboard_techn_query = "SELECT * FROM technicians";
                        $dashboard_techn_query_run = mysqli_query($db, $dashboard_techn_query);
                        if ($techn_total = mysqli_num_rows($dashboard_techn_query_run)) {
                            echo '<p>' . $techn_total . '</p>';
                        } else {
                            echo '<p>Nėra</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-dash clientCard">
                    <div class="card-body-dash text-center">
                        <h5 class="card-title">Iš viso vartotojų:</h5>
                        <?php
                        $dashboard_users_query = "SELECT * FROM users WHERE user_type='Vartotojas'";
                        $dashboard_users_query_run = mysqli_query($db, $dashboard_users_query);
                        if ($users_total = mysqli_num_rows($dashboard_users_query_run)) {
                            echo '<p>' . $users_total . '</p>';
                        } else {
                            echo '<p>Nėra</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-dash activeRepairsCard">
                    <div class="card-body-dash text-center">
                        <h5 class="card-title">Aktyvių taisymų kiekis:</h5>
                        <?php
                        $dashboard_active_orders = "SELECT * FROM orders where order_status='Aktyvus'";
                        $dashboard_act_order_query_run = mysqli_query($db, $dashboard_active_orders);
                        if($active_order_total = mysqli_num_rows($dashboard_act_order_query_run)) {
                            echo '<p>' . $active_order_total . '</p>';
                        } else {
                            echo '<p>Nėra</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-dash inactiveRepairsCard">
                    <div class="card-body-dash text-center">
                        <h5 class="card-title">Neaktyvių taisymų kiekis:</h5>
                        <?php
                        $dashboard_inactive_orders = "SELECT * FROM orders WHERE order_status='Neaktyvus'";
                        $dashboard_inac_order_query_run = mysqli_query($db, $dashboard_inactive_orders);
                        if($inact_order_total = mysqli_num_rows($dashboard_inac_order_query_run)) {
                            echo '<p>' . $inact_order_total . '</p>';
                        } else {
                            echo '<p>Nėra</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="chart-wrapper">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <?php
    $dashboard_inactive_orders = "SELECT * FROM orders WHERE order_status='Neaktyvus'";
    $dashboard_inac_order_query_run = mysqli_query($db, $dashboard_inactive_orders);
    $inact_order_total = mysqli_num_rows($dashboard_inac_order_query_run);

    $dashboard_active_orders = "SELECT * FROM orders where order_status='Aktyvus'";
    $dashboard_act_order_query_run = mysqli_query($db, $dashboard_active_orders);
    $active_order_total = mysqli_num_rows($dashboard_act_order_query_run);

    $dashboard_complete_orders = "SELECT * FROM orders WHERE order_status='Pabaigtas'";
    $dashboard_compl_order_query_run = mysqli_query($db, $dashboard_complete_orders);
    $complete_order_total = mysqli_num_rows($dashboard_compl_order_query_run);
    ?>
    <script>
        let myChart = document.getElementById('myChart').getContext('2d');

        let newChart = new Chart(myChart, {

            type: 'pie',
            data: {
                labels: ['Aktyvūs', 'Neaktyvūs', 'Pabaigti'],
                datasets: [{
                    label: 'Taisymų kiekis',
                    data: [
                        <?php echo $active_order_total ?>,
                        <?php echo $inact_order_total ?>,
                        <?php echo $complete_order_total ?>
                    ],
                    backgroundColor: [
                        'rgb(236, 217, 183)',
                        'rgb(253, 165, 165)',
                        'rgb(194, 238, 129)'
                    ],
                    borderWidth: 1,
                    borderColor: 'black'
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: "Taisymai"
                    }
                },
                responsive: true
            }
        });
    </script>


</body>

</html>