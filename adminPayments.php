<?php
include('functions/selectAdminPayments.php');

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>Visi apmokėjimai</title>
</head>

<body>

    <?php include("head.php");
    //include_once("functions/pagination.php");
    ?>
    <div class="page-content p-5" id="content">
        <div class="row">
            <div class="col">
                <h1>Apmokėjimai</h1>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <table id="adminOrdersTable" class="table table-responsive table-light table-striped table-hover">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kodas</th>
                            <th scope="col">Sukūrimo data</th>
                            <th scope="col">Gamintojas</th>
                            <th scope="col">Modelis</th>
                            <th scope="col">Paslauga</th>
                            <th scope="col">Vartotojas</th>
                            <th scope="col">Specialistas</th>
                            <th scope="col">Statusas</th>
                            <th scope="col">Numatoma pabaigimo data</th>
                            <th scope="col">Mokama kaina</th>
                            <th style="display: none;" scope="col"></th>
                            <th style="display: none;" scope="col">Aprašas</th>
                            <!-- <th scope="col"></th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($admin_payments = mysqli_fetch_array(
                            $all_admin_payments,
                            MYSQLI_ASSOC
                        )) :;
                        ?>
                            <tr class="clickable-row" data-bs-toggle="modal" data-bs-target="#editOrderModal">
                                <td><?php echo $admin_payments['order_id'] ?? ''; ?></th>
                                <td><?php echo $admin_payments['order_code'] ?? ''; ?></td>
                                <td><?php echo $admin_payments['order_request_date'] ?? ''; ?></td>
                                <td><?php echo $admin_payments['order_item_manufact'] ?? ''; ?></td>
                                <td><?php echo $admin_payments['order_item_model'] ?? ''; ?></td>
                                <td><?php echo $admin_payments['service_name'] ?? ''; ?></td>
                                <td><?php echo $admin_payments['name'] ?? ''; ?></td>
                                <td><?php echo $admin_payments['techn_name'] ?? ''; ?></td>
                                <td><?php echo $admin_payments['order_status'] ?? ''; ?></td>
                                <td><?php echo $admin_payments['order_complet_date_est'] ?? ''; ?></td>
                                <td><?php echo $admin_payments['order_amount_to_pay'] ?? ''; ?></td>
                                <td style="display: none;"><?php echo $admin_payments['techn_id'] ?? ''; ?></td>
                                <td style="display: none;"><?php echo $admin_payments['order_descrip'] ?? ''; ?></td>

                                <!-- <td data-bs-toggle="modal" data-bs-target="#editOrderModal"><button class="btn btn-primary editBtn">Redaguoti</button></td> -->
                            </tr>
                        <?php
                        endwhile;
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" integrity="sha512-TQQ3J4WkE/rwojNFo6OJdyu6G8Xe9z8rMrlF9y7xpFbQfW5g8aSWcygCQ4vqRiJqFsDsE1T6MoAOMJkFXlrI9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="scripts/showHideForm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
                $("#editOrderDesc").val(data[13]);
                $("#editOrderAdminStatus").val(data[9]);
                //$("#editOrderAdminTechn").val(data[12]);
                var testing = data[12];
                $('.js-example-responsive').val(data[12]);
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
                }
            });


        });
    </script>


  </body>

</html>