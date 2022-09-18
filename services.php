<?php
include("functions/selectService.php");
include("functions/selectSpecialization.php");
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
                <h1>Paslaugos</h1>
                <br>
                <button id="btn-show" class="mb-2">Rodyti formą</button>
            </div>
        </div>

        <form action="functions/insertService.php" method="GET" id="formInsertTechn" class="pt-3 pb-3">
            <label for="service_name">Paslauga</label>
            <input type="text" name="service_name" id="service_name" class="me-3">

            <label for="service_specializ_id">Specializacija</label>
            <select name="service_specializ_id" class="me-3">
                <?php
                while ($techn_spec = mysqli_fetch_array(
                    $all_specializations,
                    MYSQLI_ASSOC
                )) :;
                ?>
                    <option value="<?php echo $techn_spec['specializ_id'];
                                    ?>">
                        <?php echo $techn_spec["specializ_name"];
                        ?>
                    </option>
                <?php
                endwhile;
                ?>

            </select>

            <label for="description">Aprašymas</label>
            <input type="text" name="description" id="description" class="me-3">
            
           
            <button type="submit">Pridėti</button>
        </form>
        <div class="row">
            <div class="col-6">
                <table class="table table-responsive table-light table-striped">
                    <thead class="table-primary">
                        <tr>                            
                            <th scope="col">Paslauga</th>
                            <th scope="col">Specializacija</th>
                            <th scope="col">Aprašymas</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (is_array($fetch_data)) {
                            $num = 1;
                            foreach ($fetch_data as $data) {
                        ?>
                                <tr>
                                    <td style="display:none;"><?php echo $data['service_id'] ?? ''; ?></td>
                                    <td><?php echo $data['service_name'] ?? ''; ?></td>
                                    <td><?php echo $data['specializ_name'] ?? ''; ?></td>
                                    <td><?php echo $data['description'] ?? ''; ?></td>
                                    <td><button type="button" data-bs-toggle="modal" data-bs-target="#editSpecModal" class="editBtn">Redaguoti</button></td>
                                    <td><button type="button" data-bs-toggle="modal" data-bs-target="#removeSpecModal" class="removeBtn">Pašalinti</button></td>

                                    <form action="functions/updateTechn.php" method="POST" class="form">
                                        <div class="modal fade" id="editSpecModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Redaguoti paslaugą</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="techn_id_edit" id="techn_id_edit">
                                                        <label for="techn_name_edit">Paslauga</label>
                                                        <br>
                                                        <input type="text" name="techn_name_edit" id="techn_name_edit" class="me-3 mb-2 modal-input-box">
                                                        <br>
                                                        <label for="techn_email_edit">El. paštas</label>
                                                        <br>
                                                        <input type="text" name="techn_email_edit" id="techn_email_edit" class="me-3 mb-2 modal-input-box">
                                                        <br>
                                                        <label for="techn_phone_num_edit">Tel. nr.</label>
                                                        <br>
                                                        <input type="text" name="techn_phone_num_edit" id="techn_phone_num_edit" class="me-3 mb-2 modal-input-box">
                                                        <br>
                                                        <label for="techn_spec_edit">Specializacija</label>
                                                        <br>
                                                        <select id="techn_spec_edit" name="techn_spec_edit" class="modal-input-box">
                                                            <?php foreach ($all_specializations as $techn_spec_edit) { ?>
                                                                <option value="<?php echo $techn_spec_edit["specializ_name"] ?>"><?php echo $techn_spec_edit["specializ_name"] ?></option>
                                                            <?php } ?>

                                                            </option>

                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Uždaryti</button>
                                                        <button type="submit" name="updateTechnBtn" class="btn btn-primary">Išsaugoti</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>


                                    <form action="functions/deleteTechn.php" method="POST" class="form">
                                        <div class="modal fade" id="removeSpecModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Pašalinti specialistą</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="techn_id_remove" id="techn_id_remove">
                                                        <h4>Ar tikrai norite pašalinti šį specialistą?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Atšaukti</button>
                                                        <button type="submit" name="deleteTechnBtn" class="btn btn-primary">Pašalinti</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </tr>
                            <?php
                                $num++;
                            }
                        } else { ?>
                            <tr>
                                <td colspan="4">
                                    <?php echo $fetch_data; ?>
                                </td>
                            <tr>
                            <?php
                        } ?>
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
    </script>
</body>

</html>