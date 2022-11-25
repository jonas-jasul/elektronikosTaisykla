<?php
include('functions/selectAdminOrders.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Document</title>
</head>

<body>

    <?php include("head.php"); ?>
    <div class="page-content p-5" id="content">
        <div class="row">
            <div class="col">
                <h1>Taisymai</h1>

            </div>
        </div>


        <div class="row">
            <div class="col">
                <table class="table table-responsive table-light table-striped table-hover">
                <thead class="table-success">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Užsakymo kodas</th>
                            <th scope="col">Sukūrimo data</th>
                            <th scope="col">Specializacija</th>
                            <th scope="col">Gamintojas</th>
                            <th scope="col">Modelis</th>
                            <th scope="col">Paslauga</th>
                            <th scope="col">Vartotojas</th>
                            <th scope="col">Specialistas</th>
                            <th scope="col">Statusas</th>
                            <th scope="col">Numatoma pabaigimo data</th>
                            <th scope="col">Mokama kaina</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($admin_orders = mysqli_fetch_array(
                            $all_admin_orders,
                            MYSQLI_ASSOC
                        )) :;
                        ?>
                            <tr>
                                <th scope="row"><?php echo $admin_orders['order_id'] ?? ''; ?></th>
                                <td><?php echo $admin_orders['order_code'] ?? ''; ?></td>
                                <td><?php echo $admin_orders['order_request_date'] ?? ''; ?></td>
                                <td><?php echo $admin_orders['specializ_name'] ?? ''; ?></td>
                                <td><?php echo $admin_orders['order_item_manufact'] ?? ''; ?></td>
                                <td><?php echo $admin_orders['order_item_model'] ?? ''; ?></td>
                                <td><?php echo $admin_orders['service_name'] ?? ''; ?></td>
                                <td><?php echo $admin_orders['name'] ?? ''; ?></td>
                                <td><?php echo $admin_orders['techn_name'] ?? ''; ?></td>
                                <td><?php echo $admin_orders['order_status'] ?? ''; ?></td>
                                <td><?php echo $admin_orders['order_complet_date_est'] ?? ''; ?></td>
                                <td><?php echo $admin_orders['order_amount_to_pay'] ?? ''; ?></td>
                                <td><button class="btn btn-primary">Redaguoti</button></td>
                            </tr>
                        <?php
                        endwhile;
                        ?>
                    </tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="scripts/showHideForm.js"></script>

    <script>
        $(document).ready(function() {
            $('.removeBtn').on('click', function() {
                $('#removeSpecModal').modal('show');


                $tr = $(this).closest('tr');

                var data = $tr.children('td').map(function() {

                    return $(this).text();
                }).get();

                $('#techn_id_remove').val(data[0]);

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