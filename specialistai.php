<?php
session_start();
$page = "Specialistai";
include("functions/selectTechn.php");
include("functions/selectSpecialization.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Visi specialistai</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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
    <?php include_once("head.php"); ?>
    <div class="page-content p-5" id="content">
        <div class="row">
            <div class="col">
                <h1>Specialistai</h1>
                <br>
                <button id="btn-show" class="button btn btn-warning mb-2">Rodyti form??</button>
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
                <label class="col-sm-2" for="techn_name">Vardas Pavard??</label>
                <div class="col-sm-10">
                    <input required type="text" name="techn_name" id="techn_name" class="form-control w-auto me-3">
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2" for="techn_email">El. pa??tas</label>
                <div class="col-sm-10">
                    <input required type="text" name="techn_email" id="techn_email" class="form-control w-auto me-3">
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2" for="techn_phone_num">Tel. nr.</label>
                <div class="col-sm-10">
                    <input required type="text" name="techn_phone_num" id="techn_phone_num" class="form-control w-auto me-3">
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2" for="techn_spec_id">Specializacija</label>
                <div class="col-sm-4">
                    <select class="form-select w-auto" name="techn_spec_id">
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
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2" for="techn_reg_passw">Slapta??odis</label>
                <div class="col-sm-10">
                    <input required type="password" name="techn_reg_passw" id="techn_reg_passw" class="form-control w-auto">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-2">
                    <button class="btn btn-primary" type="submit">Prid??ti</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col">
                <table id="adminTechnTable" class="table table-responsive table-light table-striped table-hover">
                    <thead class="table-info">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Vardas Pavard??</th>
                            <th scope="col">El. pa??tas</th>
                            <th scope="col">Kontaktinis numeris</th>
                            <th style="display: none;" scope="col"></th>
                            <th scope="col">Specializacija</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($techn = mysqli_fetch_array(
                            $all_technicians,
                            MYSQLI_ASSOC
                        )) :;
                        ?>
                            <tr>
                                <td><?php echo $techn['techn_id'] ?? ''; ?></td>
                                <td><?php echo $techn['techn_name'] ?? ''; ?></td>
                                <td><?php echo $techn['techn_email'] ?? ''; ?></td>
                                <td><?php echo $techn['techn_phone_num'] ?? ''; ?></td>
                                <td style="display: none;"><?php echo $techn['specializ_id'] ?? ''; ?></td>
                                <td><?php echo $techn['specializ_name'] ?? ''; ?></td>
                                <td><button type="button" data-bs-toggle="modal" data-bs-target="#editSpecModal" class="editBtn btn btn-sm btn-primary"><i class="fas fa-edit"></i></button></td>
                                <td><button type="button" data-bs-toggle="modal" data-bs-target="#removeSpecModal" class="removeBtn btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></td>

                            </tr>
                        <?php
                        endwhile;
                        ?>
                    </tbody>
                </table>


                <form action="functions/updateTechn.php" method="POST" class="form">
                    <div class="modal fade" id="editSpecModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Redaguoti specialist??</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="techn_id_edit" id="techn_id_edit">
                                    <label for="techn_name_edit">Vardas Pavard??</label>
                                    
                                    <input type="text" name="techn_name_edit" id="techn_name_edit" class="form-control me-3 mb-2 modal-input-box">
                                    
                                    <label for="techn_email_edit">El. pa??tas</label>
                                    
                                    <input type="text" name="techn_email_edit" id="techn_email_edit" class="form-control me-3 mb-2 modal-input-box">
                                    
                                    <label for="techn_phone_num_edit">Tel. nr.</label>
                                   
                                    <input type="text" name="techn_phone_num_edit" id="techn_phone_num_edit" class="form-control me-3 mb-2 modal-input-box">
                                    
                                    <label for="techn_spec_edit">Specializacija</label>
                                    
                                    <div class="form-group">
                                        <select id="techn_spec_edit" name="techn_spec_edit" class="form-select modal-input-box">
                                            <?php foreach ($all_specializations as $techn_spec_edit) { ?>
                                                <option value="<?php echo $techn_spec_edit["specializ_id"] ?>"><?php echo $techn_spec_edit["specializ_name"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">U??daryti</button>
                                    <button type="submit" name="updateTechnBtn" class="btn btn-primary">I??saugoti</button>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Pa??alinti specialist??</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="techn_id_remove" id="techn_id_remove">
                                    <h4>Ar tikrai norite pa??alinti ???? specialist???</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">At??aukti</button>
                                    <button type="submit" name="deleteTechnBtn" class="btn btn-primary">Pa??alinti</button>
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
    <script src="scripts/showHideForm.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
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


            $('#adminTechnTable').DataTable({
                stateSave: true,
                "language": {
                    "decimal": "",
                    "emptyTable": "??ra???? n??ra",
                    "info": "Rodoma nuo _START_ iki _END_ i?? _TOTAL_ ??ra????",
                    "infoEmpty": "Rodoma nuo 0 iki 0 i?? 0 ??ra????  ",
                    "infoFiltered": "(I??filtruota i?? _MAX_ ??ra????)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Rodyti _MENU_ ??ra????",
                    "loadingRecords": "Kraunama...",
                    "processing": "",
                    "search": "Ie??koti:",
                    "zeroRecords": "Ie??kom?? ??ra???? nerasta",
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