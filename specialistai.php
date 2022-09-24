<?php
include("functions/selectTechn.php");
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

    <!-- <div class="vertical-nav bg-white" id="sidebar">

        <div class="media d-flex align-items-center"><img src="images/logo.png" alt="..." width="100">
        </div>


        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="index.php" class="nav-link text-dark bg-light">
                    Pagrindinis puslapis
                </a>
            </li>
            <li class="nav-item">
                <a href="specialistai.php" class="nav-link text-dark ">
                    Specialistai
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark">
                    Paslaugos
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark">
                    Klientai
                </a>
            </li>
        </ul>
    </div> -->
    <?php include("head.php"); ?>
    <div class="page-content p-5" id="content">
        <div class="row">
            <div class="col">
                <h1>Specialistai</h1>
                <br>
                <button id="btn-show" class="mb-2">Rodyti formą</button>
            </div>
        </div>

        <form action="functions/insertTechn.php" method="GET" id="formInsertTechn" class="pt-3 pb-3">

            <div class="row d-none">
                <label class="col-sm-2" for="techn_id">id</label>
                <div class="col-sm-10">
                    <input type="text" name="techn_id" id="techn_id" class="form-control w-auto me-3">
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2" for="techn_name">Vardas Pavardė</label>
                <div class="col-sm-10">
                    <input type="text" name="techn_name" id="techn_name" class="form-control w-auto me-3">
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2" for="techn_email">El. paštas</label>
                <div class="col-sm-10">
                    <input type="text" name="techn_email" id="techn_email" class="form-control w-auto me-3">
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2" for="techn_phone_num">Tel. nr.</label>
                <div class="col-sm-10">
                    <input type="text" name="techn_phone_num" id="techn_phone_num" class="form-control w-auto me-3">
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2" for="techn_spec">Specializacija</label>
                <div class="col-sm-4">
                    <select class="form-select w-auto" name="techn_spec">
                        <?php
                        while ($techn_spec = mysqli_fetch_array(
                            $all_specializations,
                            MYSQLI_ASSOC
                        )) :;
                        ?>
                            <option value="<?php echo $techn_spec['specializ_name'];
                                            ?>">
                                <?php echo $techn_spec["specializ_name"];
                                ?>
                            </option>
                        <?php
                        endwhile;
                        ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2" for="techn_reg_passw">Slaptažodis</label>
                <div class="col-sm-10">
                    <input type="password" name="techn_reg_passw" id="techn_reg_passw" class="form-control w-auto">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-2">
                    <button class="btn btn-primary" type="submit">Pridėti</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col">
                <table class="table table-responsive table-light table-striped">
                    <thead class="table-info">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Vardas Pavardė</th>
                            <th scope="col">El. paštas</th>
                            <th scope="col">Kontaktinis numeris</th>
                            <th scope="col">Specializacija</th>
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
                                    <td><?php echo $data['techn_id'] ?? ''; ?></td>
                                    <td><?php echo $data['techn_name'] ?? ''; ?></td>
                                    <td><?php echo $data['techn_email'] ?? ''; ?></td>
                                    <td><?php echo $data['techn_phone_num'] ?? ''; ?></td>
                                    <td><?php echo $data['techn_spec'] ?? ''; ?></td>
                                    <td><button type="button" data-bs-toggle="modal" data-bs-target="#editSpecModal" class="editBtn">Redaguoti</button></td>
                                    <td><button type="button" data-bs-toggle="modal" data-bs-target="#removeSpecModal" class="removeBtn">Pašalinti</button></td>

                                    <form action="functions/updateTechn.php" method="POST" class="form">
                                        <div class="modal fade" id="editSpecModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Redaguoti specialistą</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="techn_id_edit" id="techn_id_edit">
                                                        <label for="techn_name_edit">Vardas Pavardė</label>
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