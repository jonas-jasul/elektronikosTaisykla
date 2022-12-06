<?php
include('functions/selectAdminPayments.php');
$page = "Apmokėjimai";
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

                            <th scope="col">Paslauga</th>
                            <th scope="col">Vartotojas</th>
                            <th scope="col">Specialistas</th>
                            <!-- <th scope="col">Statusas</th> -->
                            <th scope="col">Mokama kaina</th>
                            <th scope="col">Apmokėjimo statusas</th>
                            <th scope="col">Apmokėjimo data</th>

                            <th style="display: none;" scope="col">Aprašas</th>
                            <th style="display: none;" scope="col">Mokėjimo ID</th>

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
                            <tr class="clickable-row" data-bs-toggle="modal" data-bs-target="#editPaymentModal">
                                
                                <td><?php echo $admin_payments['order_id'] ?? ''; ?></th>
                                <td><?php echo $admin_payments['order_code'] ?? ''; ?></td>

                                <td><?php echo $admin_payments['service_name'] ?? ''; ?></td>
                                <td><?php echo $admin_payments['name'] ?? ''; ?></td>
                                <td><?php echo $admin_payments['techn_name'] ?? '<i>Nėra</i>'; ?></td>
                                <!-- <td><?php echo $admin_payments['order_status'] == "Aktyvus" ? ' <span class="badge bg-success">Aktyvus</span>' : ($admin_payments['order_status'] == "Pabaigtas" ? ' <span class="badge bg-secondary">Pabaigtas</span>' : '<span class="badge bg-danger">Neaktyvus</span>'); ?></td> -->
                                <td><?php echo $admin_payments['total_amount_to_pay'] ?? ''; ?></td>
                                <td><?php echo $admin_payments['is_paid'] == '1' ? '<span class="badge rounded-pill text-dark bg-info">Apmokėtas</span>' : '<span class="badge rounded-pill bg-warning text-dark">Neapmokėtas</span>'; ?></td>
                                <td><?php echo $admin_payments['payment_date']; ?></td>
                                <td style="display: none;"><?php echo $admin_payments['order_descrip'] ?? ''; ?></td>

                                <!-- <td data-bs-toggle="modal" data-bs-target="#editOrderModal"><button class="btn btn-primary editBtn">Redaguoti</button></td> -->
                                <td style="display: none;"><?php echo $admin_payments['payment_id'] ?? ''; ?></th>

                            </tr>
                        <?php
                        endwhile;
                        ?>
                    </tbody>

                </table>

                <form action="functions/editPaymentAdmin.php" method="POST" class="form">
                    <div class="modal fade" id="editPaymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Redaguoti apmokėjimą</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="payment_id_edit" id="payment_id_edit">
                                    <label for="editPaymentCode">Užsakymo kodas</label>
                                    <input readonly class="form-control" type="text" id="editPaymentCode" name="editPaymentCode">
                                    <label for="editPaymentService">Paslauga</label>
                                    <input class="form-control" type="text" name="editPaymentService" id="editPaymentService" readonly>
                                    <label for="editPaymentUser">Vartotojas</label>
                                    <input readonly type="text" class="form-control" id="editPaymentUser" name="editPaymentUser">
                                    <label for="editPaymentTechn">Specialistas</label>
                                    <input type="text" class="form-control" id="editPaymentTechn" name="editPaymentTechn">
                                    <label for="editPaymentTotalSum">Mokama kaina</label>
                                    <input type="number" class="form-control" id="editPaymentTotalSum" name="editPaymentTotalSum">
                                    <label for="editPaymentStatus">Apmokėjimo statusas</label>
                                    <select type="text" class="form-select" id="editPaymentStatus" name="editPaymentStatus">
                                        <option value="0">Neapmokėtas</option>
                                        <option value="1">Apmokėtas</option>
                                    </select>
                                    <label for="editPaymentDate">Apmokėjimo data</label>
                                    <input data-date-format="yyyy/mm/dd" data-provide="datepicker" class="form-control" type="text" name="editPaymentDate" id="editPaymentDate">
                                    <!-- <label for="editOrderManufac">Gamintojas</label>
                                    <br>
                                    <input class="form-control modal-input-box" type="text" name="editOrderManufac" id="editOrderManufac" readonly> -->




                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Atšaukti</button>
                                    <button type="submit" name="editPaymentBtn" class="btn btn-primary">Redaguoti</button>
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
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css" integrity="sha512-TQQ3J4WkE/rwojNFo6OJdyu6G8Xe9z8rMrlF9y7xpFbQfW5g8aSWcygCQ4vqRiJqFsDsE1T6MoAOMJkFXlrI9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="scripts/showHideForm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {


            $('.clickable-row').on('click', function() {
                $('#editPaymentModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children('td').map(function() {

                    return $(this).text();
                }).get();

                $("#payment_id_edit").val(data[9]);
                $("#editPaymentCode").val(data[1]);
                $("#editPaymentService").val(data[2]);
                // var orderCreatDatFirst = new Date(data[2]);
                // var correctedDate = orderCreatDatFirst.toLocaleDateString();
                //console.log(correctedDate);
                // $("#editOrderDate").datepicker('update', orderCreatDatFirst);
                $("#editPaymentUser").val(data[3]);
                $("#editPaymentTechn").val(data[4]);
                $("#editPaymentTotalSum").val(data[5]);
                if (data[6] == 'Neapmokėtas') {
                    $("#editPaymentStatus").val(0);
                } else if (data[6] == 'Apmokėtas') {
                    $("#editPaymentStatus").val(1);
                }
                //console.log(paymentStat);

                var orgPayDate = new Date(data[7]);
                $("#editPaymentDate").datepicker('update', orgPayDate);
                //var orderEstComplDatFirst = new Date(data[10]);
                //var correctedDate2 = orderEstComplDatFirst.toLocaleDateString();
                //console.log(correctedDate2);
                //     $("#editOrderEstComplDate").datepicker('update', orderEstComplDatFirst);
                //     $("#editOrderDesc").val(data[13]);
                //     $("#editOrderAdminStatus").val(data[9]);
                //     $("#editOrderAdminTechn").val(data[12]);
                //     var testing = data[12];
                //     $('.js-example-responsive').val(data[12]);
                //     $('.js-example-responsive').select2();
                //     console.log(testing);
                //     $('.js-example-responsive').select2({
                //         dropdownParent: $('#editPaymentModal'),
                //         language: {
                //             noResults: function() {
                //                 return "Specialistų nerasta";
                //             }
                //         }
                //     });

            });


            $("#adminOrdersTable").DataTable({
                stateSave: true,
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