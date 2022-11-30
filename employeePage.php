<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/user.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <title>Darbuotojo panelė</title>
</head>

<body>

    <?php
    include('employeeHeader.php');
    include('functions/selectTechnOrders.php');
    include('functions/getDateFromDatetime.php');

    //if (!isLoggedIn() && !isEmployee() || isLoggedIn() &&!isEmployee())
    if (!isLoggedIn()) {
        $_SESSION['msg'] = "Jūs turite pirmiau prisijungti";
        header('location: login.php');
    }
    if (!isEmployee()) {
        header('location: userPage.php');
    }
    ?>
    <div class="flex-wrapper">
        <div class="container">
            <h2>Darbuotojo panelė</h2>

            <div id="chart-wrapper">
                <canvas id="myChart"></canvas>
            </div>
            <div class="row">
                <div class="col">
                    <h5>Neaktyvūs taisymai</h5>
                    <table id="employeeInactiveOrders" class="table table-dark table-responsive table-bordered table-striped table-hover">
                        <thead class="table bg-danger ">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kodas</th>
                                <th scope="col">Sukūrimo data</th>
                                <th scope="col">Gamintojas</th>
                                <th scope="col">Modelis</th>
                                <th scope="col">Vartotojas</th>
                                <th scope="col">Paslauga</th>
                                <th scope="col">Statusas</th>
                                <th scope="col">Numatoma pabaigimo data</th>
                                <th scope="col"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($inactive_techn_orders = mysqli_fetch_array(
                                $all_inactive_techn_orders,
                                MYSQLI_ASSOC
                            )) :;
                            ?>
                                <tr>
                                    <td><?php echo $inactive_techn_orders['order_id'] ?? ''; ?></td>
                                    <td><?php echo $inactive_techn_orders['order_code'] ?? ''; ?></td>
                                    <td><?php echo $inactive_techn_orders['order_request_date'] ?? ''; ?></td>
                                    <td><?php echo $inactive_techn_orders['order_item_manufact'] ?? ''; ?></td>
                                    <td><?php echo $inactive_techn_orders['order_item_model'] ?? ''; ?></td>
                                    <td><?php echo $inactive_techn_orders['name'] ?? ''; ?></td>
                                    <td><?php echo $inactive_techn_orders['service_name'] ?? ''; ?></td>
                                    <td><?php echo $inactive_techn_orders['order_status'] ?? ''; ?></td>
                                    <td><?php echo $inactive_techn_orders['order_complet_date_est'] ?? ''; ?></td>
                                    <!-- <td><?php echo $inactive_techn_orders['order_techn_id'] ?? ''; ?></td> -->
                                    <td><button data-bs-toggle="modal" data-bs-target="#acceptOrderModal" class="acceptBtn button btn btn-light">Priimti</button></td>

                                </tr>
                            <?php
                            endwhile
                            ?>

                        </tbody>
                    </table>

                    <form action="functions/acceptOrder.php" method="POST" class="form">
                        <div class="modal fade" id="acceptOrderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Priimti užsakymą</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="order_id_accept" id="order_id_accept">
                                        <h4>Ar tikrai norite priimti šį užsakymą?</h4>
                                        <label for="acceptOrderCode">Užsakymo kodas</label>
                                        <br>
                                        <input class="form-control modal-input-box" type="text" name="acceptOrderCode" id="acceptOrderCode" readonly>
                                        <label for="acceptOrderDate">Sukūrimo data</label>
                                        <br>
                                        <input data-date-format="yyyy/mm/dd" data-provide="datepicker" class="form-control" type="text" name="acceptOrderDate" id="acceptOrderDate" readonly>
                                        <label for="acceptOrderManufac">Gamintojas</label>
                                        <br>
                                        <input class="form-control modal-input-box" type="text" name="acceptOrderManufac" id="acceptOrderManufac" readonly>
                                        <label for="acceptOrderModel">Modelis</label>
                                        <br>
                                        <input class="form-control modal-input-box" type="text" name="acceptOrderModel" id="acceptOrderModel" readonly>
                                        <label for="acceptOrderService">Paslauga</label>
                                        <br>
                                        <input class="form-control" type="text" name="acceptOrderService" id="acceptOrderService" readonly>
                                        <label for="acceptOrderEstComplDate">Numatoma pabaigimo data</label>
                                        <br>
                                        <input data-date-format="yyyy/mm/dd" data-provide="datepicker" class="form-control" type="text" name="acceptOrderEstComplDate" id="acceptOrderEstComplDate" min="2000-01-01" required>
                                        <input type="hidden" name="order_accept_techn" id="order_accept_techn" value="<?php echo $_SESSION['user']['id'] ?>">
                                        <label for="acceptOrderDesc">Pastabos/Aprašymas</label>
                                        <textarea class="form-control" name="acceptOrderDesc" id="acceptOrderDesc"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Atšaukti</button>
                                        <button type="submit" name="acceptOrderBtn" class="btn btn-primary">Priimti</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- <div class="pagination">
                        <?php
                        $pageLink = "";
                        if ($pageNr >= 2) {
                            echo "<a href='employeePage.php?pageNr=" . ($pageNr - 1) . "'>  Ankstenis </a>";
                        }

                        for ($i = 1; $i <= $total_pages; $i++) {
                            if ($i == $pageNr) {
                                $pageLink .= "<a class='active' href='employeePage.php?pageNr=" . $i . "'>" . $i . "</a>";
                            } else {
                                $pageLink .= "<a href='employeePage.php?pageNr=" . $i . "'>" . $i . "</a>";
                            }
                        };
                        echo $pageLink;

                        if ($pageNr < $total_pages) {
                            echo "<a href='employeePage.php?pageNr=" . ($pageNr + 1) . "'>Sekantis</a>";
                        }
                        ?>
                    </div> -->
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h5>Aktyvūs taisymai</h5>
                    <table id="employeeActiveOrders" class="table table-dark table-responsive table-bordered table-striped table-hover">
                        <thead class="table bg-warning ">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kodas</th>
                                <th scope="col">Sukūrimo data</th>
                                <th scope="col">Gamintojas</th>
                                <th scope="col">Modelis</th>
                                <th scope="col">Vartotojas</th>
                                <th style="display: none;" scope="col">Vartotojas</th>
                                <th scope="col">Paslauga</th>
                                <th scope="col">Statusas</th>
                                <th scope="col">Numatoma pabaigimo data</th>
                                <th scope="col"></th>
                                <th style="display:none;" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            while ($active_techn_orders = mysqli_fetch_array(
                                $all_active_techn_orders,
                                MYSQLI_ASSOC
                            )) :;
                            ?>
                                <tr>
                                    <td><?php echo $active_techn_orders['order_id'] ?? ''; ?></td>
                                    <td><?php echo $active_techn_orders['order_code'] ?? ''; ?></td>
                                    <td><?php echo $active_techn_orders['order_request_date'] ?? ''; ?></td>
                                    <td><?php echo $active_techn_orders['order_item_manufact'] ?? ''; ?></td>
                                    <td><?php echo $active_techn_orders['order_item_model'] ?? ''; ?></td>
                                    <td><?php echo $active_techn_orders['name'] ?? ''; ?></td>
                                    <td><?php echo $active_techn_orders['service_name'] ?? ''; ?></td>
                                    <td style="display: none;"><?php echo $active_techn_orders['order_techn_id'] ?? ''; ?></td>
                                    <td><?php echo $active_techn_orders['order_status'] ?? ''; ?></td>
                                    <td><?php echo $active_techn_orders['order_complet_date_est'] ?? ''; ?></td>
                                    <!-- <td><?php echo $active_techn_orders['order_techn_id'] ?? ''; ?></td> -->
                                    <td><button data-bs-toggle="modal" data-bs-target="#editOrderModal" class="button btn btn-light editBtn">Redaguoti</button></td>
                                    <td style="display: none;"><?php echo $active_techn_orders['order_descrip'] ?? ''; ?></td>

                                </tr>
                            <?php
                            endwhile
                            ?>


                        </tbody>
                    </table>

                    <form action="functions/completeOrder.php" method="POST" class="form">
                        <div class="modal fade" id="editOrderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Redaguoti užsakymą</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="order_id_edit" id="order_id_edit">
                                        <label for="editOrderCode">Užsakymo kodas</label>
                                        <br>
                                        <input class="form-control modal-input-box" type="text" name="editOrderCode" id="editOrderCode" readonly>
                                        <label for="editOrderDate">Sukūrimo data</label>
                                        <br>
                                        <input data-date-format="yyyy/mm/dd" data-provide="datepicker" class="form-control" type="text" name="editOrderDate" id="editOrderDate" readonly>
                                        <label for="editOrderManufac">Gamintojas</label>
                                        <br>
                                        <input class="form-control modal-input-box" type="text" name="editOrderManufac" id="editOrderManufac" readonly>
                                        <label for="editOrderModel">Modelis</label>
                                        <br>
                                        <input class="form-control modal-input-box" type="text" name="editOrderModel" id="editOrderModel" readonly>
                                        <label for="editOrderService">Paslauga</label>
                                        <br>
                                        <input class="form-control" type="text" name="editOrderService" id="editOrderService" readonly>
                                        <label for="editOrderEstComplDate">Numatoma pabaigimo data</label>
                                        <br>
                                        <input data-date-format="yyyy/mm/dd" data-provide="datepicker" class="form-control" type="text" name="editOrderEstComplDate" id="editOrderEstComplDate" min="2000-01-01" required>
                                        <input type="hidden" name="order_edit_techn" id="order_edit_techn" value="<?php echo $_SESSION['user']['id'] ?>">
                                        <label for="editOrderDesc">Pastabos/Aprašymas</label>
                                        <textarea class="form-control" name="editOrderDesc" id="editOrderDesc"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="completeOrderBtn" class="me-auto btn btn-success">Pabaigti užsakymą</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Atšaukti</button>
                                        <button formaction="functions/editOrder.php" type="submit" name="editOrderBtn" class="btn btn-primary">Redaguoti</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" integrity="sha512-TQQ3J4WkE/rwojNFo6OJdyu6G8Xe9z8rMrlF9y7xpFbQfW5g8aSWcygCQ4vqRiJqFsDsE1T6MoAOMJkFXlrI9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.datepicker').datepicker({
                    format: 'yyyy/mm/dd',
                });
                $('.acceptBtn').on('click', function() {
                    $('#acceptOrderModal').modal('show');

                    $tr = $(this).closest('tr');
                    var data = $tr.children('td').map(function() {

                        return $(this).text();
                    }).get();

                    $("#order_id_accept").val(data[0]);
                    $("#acceptOrderCode").val(data[1]);
                    var orderCreatDatFirst = new Date(data[2]);
                    //var correctedDate = orderCreatDatFirst.toLocaleDateString();
                    $("#acceptOrderDate").datepicker('update', orderCreatDatFirst);
                    $("#acceptOrderManufac").val(data[3]);
                    $("#acceptOrderModel").val(data[4]);
                    $("#acceptOrderService").val(data[6]);
                });

                $('.editBtn').on('click', function() {
                    $('#editOrderModal').modal('show');

                    $tr = $(this).closest('tr');
                    var data = $tr.children('td').map(function() {

                        return $(this).text();
                    }).get();

                    $("#order_id_edit").val(data[0]);
                    $("#editOrderCode").val(data[1]);
                    var orderCreatDatFirst = new Date(data[2]);
                    var correctedDate = orderCreatDatFirst.toLocaleDateString();
                    //console.log(correctedDate);
                    $("#editOrderDate").datepicker('update', orderCreatDatFirst);
                    $("#editOrderManufac").val(data[3]);
                    $("#editOrderModel").val(data[4]);
                    $("#editOrderService").val(data[6]);
                    var orderEstComplDatFirst = new Date(data[9]);
                    //var correctedDate2 = orderEstComplDatFirst.toLocaleDateString();
                    //console.log(correctedDate2);
                    $("#editOrderEstComplDate").datepicker('update', orderEstComplDatFirst);
                    $("#editOrderDesc").val(data[11]);
                });


                $("#employeeInactiveOrders").DataTable({
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
                $("#employeeActiveOrders").DataTable({
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
            });
        </script>

        <?php

        $ordersQuery = "SELECT derived.mm AS month, count(ord.order_request_date) AS count FROM (
            SELECT 1 mm UNION ALL SELECT 2 UNION ALL SELECT 3 
            UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7  
            UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 
            UNION ALL SELECT 12
        ) derived
        LEFT JOIN orders ord
        ON derived.mm = month(order_request_Date) 
        AND YEAR(ord.order_request_date) = year(curdate())
        GROUP BY derived.mm";

        //SQL alternatyva, jei nori, kad rodytu viso laikotarpio uzsakymus (panasu i trenda)
        //AND ord.order_request_date > LAST_DAY(DATE_SUB(curdate(),INTERVAL 1 YEAR))

        // $numRows = mysqli_num_rows($executeOrderQuery);
        //$arrayMonth = mysqli_fetch_array($executeOrderQuery);
        $executeOrderQuery = mysqli_query($db, $ordersQuery);
        $rows = [];
        while ($row = mysqli_fetch_array($executeOrderQuery)) {
            $rows[] = $row;
        }

        $array = json_encode($rows);

        ?>

        <script>
            let myChart = document.getElementById('myChart').getContext('2d');
            <?php
            echo "var js_array = " . $array . ";\n";
            ?>

            console.log(js_array);

            // delete js_array['0']['0'];
            // delete js_array['0']['1'];

            var data = js_array.map(function(e) {
                return e.count;
            });


            let newChart = new Chart(myChart, {

                type: 'line',
                data: {
                    labels: ["Sausis", "Vasaris", "Kovas", "Balandis", "Gegužė", "Birželis", "Liepa", "Rugpjūtis", "Rugsėjis", "Spalis", "Lapkritis", "Gruodis"],
                    // labels: Object.keys(js_array),
                    datasets: [{
                        label: "Bendras taisymų kiekis",
                        data: data
                    }],
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: "Taisymai"
                        },

                        legend: {
                            display: true
                        }
                    },
                    responsive: true,
                    scales: {
                        y: {
                            ticks: {
                                precision: 0
                            }
                        }
                    }
                }
            });
        </script>
        <?php include("footer.php") ?>
    </div>
</body>

</html>