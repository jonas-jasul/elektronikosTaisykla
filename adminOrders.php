<?php
session_start();
include('functions/selectAdminOrders.php');
include_once('functions/selectTechn.php');
$page = "Taisymai";
if(!($_SESSION['admin'])) {
    header("location: welcome.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Visi taisymai</title>
</head>

<body>

    <?php include("head.php");
    //include_once("functions/pagination.php");
    ?>
    <div class="page-content p-5" id="content">
        <div class="row">
            <div class="col">
                <h1>Taisymai</h1>

            </div>
        </div>


        <div class="row">
            <div class="col">
                <table id="adminOrdersTable" class="table table-responsive table-light table-striped table-hover">
                    <thead class="table-success">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kodas</th>
                            <th scope="col">Sukūrimo data</th>
                            <th scope="col">Specializacija</th>
                            <th scope="col">Gamintojas</th>
                            <th scope="col">Modelis</th>
                            <th scope="col">Paslauga</th>
                            <th scope="col">Vartotojas</th>
                            <th scope="col">Specialistas</th>
                            <th scope="col">Statusas</th>
                            <th scope="col">Numatoma pabaigimo data</th>
                            <!-- <th scope="col">Mokama kaina</th> -->
                            <th style="display: none;" scope="col"></th>
                            <th style="display: none;" scope="col">Aprašas</th>
                            <!-- <th scope="col"></th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($admin_orders = mysqli_fetch_array(
                            $all_admin_orders,
                            MYSQLI_ASSOC
                        )) :;
                        ?>
                            <tr class="clickable-row" data-bs-toggle="modal" data-bs-target="#editOrderModal">
                                <td><?php echo $admin_orders['order_id'] ?? ''; ?></th>
                                <td><?php echo $admin_orders['order_code'] ?? ''; ?></td>
                                <td><?php echo $admin_orders['order_request_date'] ?? ''; ?></td>
                                <td><?php echo $admin_orders['specializ_name'] ?? ''; ?></td>
                                <td><?php echo $admin_orders['order_item_manufact'] ?? ''; ?></td>
                                <td><?php echo $admin_orders['order_item_model'] ?? ''; ?></td>
                                <td><?php echo $admin_orders['service_name'] ?? ''; ?></td>
                                <td><?php echo $admin_orders['name'] ?? ''; ?></td>
                                <td><?php echo $admin_orders['techn_name'] ?? '<i>Nėra</i>'; ?></td>
                                <td><?php echo $admin_orders['order_status'] == "Aktyvus" ? '<span class="badge bg-success">Aktyvus</span>' : ($admin_orders['order_status'] == "Pabaigtas" ? '<span class="badge bg-secondary">Pabaigtas</span>' : '<span class="badge bg-danger">Neaktyvus</span>'); ?></td>
                                <td><?php echo $admin_orders['order_complet_date_est'] == '0000-00-00' ? "<i>Nėra</i>" : $admin_orders['order_complet_date_est']; ?></td>
                                <!-- <td><?php echo $admin_orders['order_amount_to_pay'] ?? ''; ?></td> -->
                                <td style="display: none;"><?php echo $admin_orders['techn_id'] ?? ''; ?></td>
                                <td style="display: none;"><?php echo $admin_orders['order_descrip'] ?? ''; ?></td>

                                <!-- <td data-bs-toggle="modal" data-bs-target="#editOrderModal"><button class="btn btn-primary editBtn">Redaguoti</button></td> -->
                            </tr>
                        <?php
                        endwhile;
                        ?>
                    </tbody>

                </table>

                <form action="functions/editOrderAdmin.php" method="POST" class="form">
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
                                    <input class="form-control modal-input-box" type="text" name="editOrderCode" id="editOrderCode">
                                    <label for="editOrderDate">Sukūrimo data</label>
                                    <br>
                                    <input data-date-format="yyyy/mm/dd" data-provide="datepicker" class="form-control" type="text" name="editOrderDate" id="editOrderDate">
                                    <!-- <label for="editOrderManufac">Gamintojas</label>
                                    <br>
                                    <input class="form-control modal-input-box" type="text" name="editOrderManufac" id="editOrderManufac" readonly> -->
                                    <label for="editOrderModel">Modelis</label>
                                    <br>
                                    <input class="form-control modal-input-box" type="text" name="editOrderModel" id="editOrderModel">
                                    <label for="editOrderService">Paslauga</label>
                                    <br>
                                    <input class="form-control" type="text" name="editOrderService" id="editOrderService" readonly>
                                    <label for="editOrderEstComplDate">Numatoma pabaigimo data</label>
                                    <br>
                                    <input data-date-format="yyyy/mm/dd" data-provide="datepicker" class="form-control" type="text" name="editOrderEstComplDate" id="editOrderEstComplDate" min="2000-01-01" required>
                                    <!-- <input type="hidden" name="order_edit_techn" id="order_edit_techn" value="<?php echo $_SESSION['user']['id'] ?>"> -->
                                    <label for="editOrderDesc">Pastabos/Aprašymas</label>
                                    <textarea class="form-control" name="editOrderDesc" id="editOrderDesc"></textarea>
                                    <label for="editOrderAdminTechn">Specialistas</label>
                                    <br>
                                    <select class="js-example-responsive form-select" style="width: 100%;" id="editOrderAdminTechn" name="editOrderAdminTechn" required>
                                        <?php foreach ($all_technicians as $techn_select) { ?>
                                            <option value="<?php echo $techn_select["techn_id"] ?>"><?php echo $techn_select["techn_name"] ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="editOrderAdminStatus">Statusas</label>
                                    <select class="form-control" id="editOrderAdminStatus" name="editOrderAdminStatus">
                                        <option value="Neaktyvus">Neaktyvus</option>
                                        <option value="Aktyvus">Aktyvus</option>
                                        <option value="Pabaigtas">Pabaigtas</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Atšaukti</button>
                                    <button type="submit" name="editOrderBtn" class="btn btn-primary">Redaguoti</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


                <!-- <div class="pagination">
                    <?php
                    $pageLink = "";
                    if ($pageNr >= 2) {
                        echo "<a href='adminOrders.php?pageNr=" . ($pageNr - 1) . "'>  Ankstenis </a>";
                    }

                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($i == $pageNr) {
                            $pageLink .= "<a class='active' href='adminOrders.php?pageNr=" . $i . "'>" . $i . "</a>";
                        } else {
                            $pageLink .= "<a href='adminOrders.php?pageNr=" . $i . "'>" . $i . "</a>";
                        }
                    };
                    echo $pageLink;

                    if ($pageNr < $total_pages) {
                        echo "<a href='adminOrders.php?pageNr=" . ($pageNr + 1) . "'>Sekantis</a>";
                    }
                    ?>
                </div> -->
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" integrity="sha512-TQQ3J4WkE/rwojNFo6OJdyu6G8Xe9z8rMrlF9y7xpFbQfW5g8aSWcygCQ4vqRiJqFsDsE1T6MoAOMJkFXlrI9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="scripts/showHideForm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/date-1.2.0/r-2.4.0/sp-2.1.0/sl-1.5.0/datatables.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/date-1.2.0/r-2.4.0/sp-2.1.0/sl-1.5.0/datatables.js"></script>
    <script>
        $(document).ready(function() {


            $('.clickable-row').on('click', function() {
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
                $("#editOrderManufac").val(data[4]);
                $("#editOrderModel").val(data[5]);
                $("#editOrderService").val(data[6]);
                var orderEstComplDatFirst = new Date(data[10]);
                //var correctedDate2 = orderEstComplDatFirst.toLocaleDateString();
                //console.log(correctedDate2);
                $("#editOrderEstComplDate").datepicker('update', orderEstComplDatFirst);
                $("#editOrderDesc").val(data[12]);
                $("#editOrderAdminStatus").val(data[9]);
                //$("#editOrderAdminTechn").val(data[12]);
                var testing = data[12];
                //console.log(data[11]);
                $('.js-example-responsive').val(data[11]);
                $('.js-example-responsive').select2();
                console.log(testing);
                $('.js-example-responsive').select2({
                    dropdownParent: $('#editOrderModal'),
                    language: {
                        noResults: function() {
                            return "Specialistų nerasta";
                        }
                    }
                });

            });


            $("#adminOrdersTable").DataTable({
                dom: 'Plfrtip',
                searchPanes: {
                    columns: [3, 4, 7, 8],
                    initCollapsed: true,
                    threshold: 1,

                },
                stateSave: true,

                "language": {
                    "decimal": "",
                    "emptyTable": "Įrašų nerasta",
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
                    },
                    searchPanes: {
                        clearMessage: 'Išvalyti filtrus',
                        showMessage: 'Rodyti filtrus',
                        collapseMessage: 'Suskleisti filtrus',
                        title: {
                            _: 'Pasirinkta filtrų - %d',
                            0: 'Filtras nepasirinktas',
                            1: 'Pasirinktas vienas filtras',
                        }

                    }
                },


            });


        });
    </script>


    <!-- 
    <script>
        $(document).ready(function() {
            $('.editBtn').on('click', function() {
                $('#editSpecModal').modal('show');


                $tr = $(this).closest('tr');

                var data = $tr.children('td').map(function() {

                    return $(this).text();
                }).get();



                $('#techn_id_edit').val(data[0]);
                $('#techn_name_edit').val(data[1]);
                $('#techn_email_edit').val(data[2]);
                $('#techn_phone_num_edit').val(data[3]);
                $('#techn_spec_edit').val(data[4]);

            });
        });
    </script> -->
</body>

</html>