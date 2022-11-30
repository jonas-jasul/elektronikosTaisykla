<?php
session_start();
$_SESSION['userSelectRepairID'] = null;
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Visos paslaugos</title>
</head>

<body>
    <?php include_once("head.php"); ?>
    <?php include_once("functions/pagination.php"); ?>
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
            <input required type="text" name="service_name" id="service_name" class="me-3 form-control w-auto">

            <label for="service_specializ_id">Specializacija</label>
            <select required name="service_specializ_id" class="me-3 form-select w-auto">
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

            <label for="servicePrice">Paslaugos kaina</label>
            <input required type="text" name="servicePrice" id="servicePrice" class="me-3 form-control w-auto">
            <label for="description">Aprašymas</label>
            <input type="text" name="description" id="description" class="me-3 form-control w-auto">


            <button type="submit" class="btn btn-primary mt-2">Pridėti</button>
        </form>
        <div class="row">
            <div class="col-12">
                <table id="adminServicesTable" class="table table-responsive table-light table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th style="display: none;"></th>
                            <th scope="col">Paslauga</th>
                            <th style="display: none;"></th>
                            <th scope="col">Specializacija</th>
                            <th scope="col">Paslaugos kaina (Eur)</th>
                            <th scope="col">Aprašymas</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($service = mysqli_fetch_array(
                            $all_services,
                            MYSQLI_ASSOC
                        )) :;
                        ?>
                            <tr>
                                <td style="display:none;"><?php echo $service['service_id'] ?? ''; ?></td>
                                <td><?php echo $service['service_name'] ?? ''; ?></td>
                                <td id="specId" style="display:none"><?php echo $service['specializ_id'] ?? ''; ?></td>
                                <td><?php echo $service['specializ_name'] ?? ''; ?></td>
                                <td><?php echo $service['price'] ?? ''; ?></td>
                                <td><?php echo $service['description'] ?? ''; ?></td>
                                <td><button type="button" data-bs-toggle="modal" data-bs-target="#editSpecModal" class="editBtn btn btn-primary"><i class="fas fa-edit"></i></button></td>
                                <td><button type="button" data-bs-toggle="modal" data-bs-target="#removeServiceModal" class="removeBtn btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></td>

                            </tr>
                        <?php
                        endwhile;
                        ?>
                    </tbody>
                </table>
                <form action="functions/updateService.php" method="POST" class="form">

                    <div class="modal fade" id="editSpecModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Redaguoti paslaugą</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="service_id_edit" id="service_id_edit">
                                    <label for="service_name_edit">Paslauga</label>
                                    <br>
                                    <input type="text" name="service_name_edit" id="service_name_edit" class="form-control me-3 mb-2 modal-input-box">
                                    <br>
                                    <label for="service_spec_edit">Specializacija</label>
                                    <br>

                                    <select id="service_spec_edit" name="service_spec_edit" class="form-select modal-input-box">
                                        <?php foreach ($all_specializations as $service_spec_edit) { ?>
                                            <option value="<?php echo $service_spec_edit["specializ_id"] ?>"><?php echo $service_spec_edit["specializ_name"] ?></option>

                                        <?php } ?>

                                    </select>
                                    <br>
                                    <label for="servicePriceEdit">Paslaugos kaina (Eur)</label>
                                    <br>
                                    <input type="text" name="servicePriceEdit" id="servicePriceEdit" class="form-control me-3 mb-2 modal-input-box">
                                    <br>
                                    <label for="service_desc_edit">Aprašymas</label>
                                    <br>
                                    <input type="text" name="service_desc_edit" id="service_desc_edit" class="form-control me-3 mb-2 modal-input-box">
                                    <br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Uždaryti</button>
                                    <button type="submit" name="updateServiceBtn" class="btn btn-primary">Išsaugoti</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <form action="functions/deleteService.php" method="POST" class="form">
                    <div class="modal fade" id="removeServiceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Pašalinti paslaugą</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="service_id_remove" id="service_id_remove">
                                    <h4>Ar tikrai norite pašalinti šią paslaugą?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Atšaukti</button>
                                    <button type="submit" name="deleteServiceBtn" class="btn btn-primary">Pašalinti</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- <ul class="pagination">
                    <li><a href="?pageNr=1">Pirmas</a></li>
                    
                    <li class="<?php if ($pageNr <= 1) {
                                    echo 'disabled';
                                } ?>">
                        <a href="<?php if ($pageNr <= 1) {
                                        echo '#';
                                    } else {
                                        echo "?pageNr=" . ($pageNr - 1);
                                    } ?>">Ankstesnis</a>
                    </li>
                    <li class="<?php if ($pageNr >= $total_pages) {
                                    echo 'disabled';
                                } ?>">
                        <a href="<?php if ($pageNr >= $total_pages) {
                                        echo '#';
                                    } else {
                                        echo "?pageNr=" . ($pageNr + 1);
                                    } ?>">Sekantis</a>
                    </li>
                    <li><a href="?pageNr=<?php echo $total_pages; ?>">Paskutinis</a></li>
                </ul> -->

                <!-- <div class="pagination">
                    <?php
                    $pageLink = "";
                    if ($pageNr >= 2) {
                        echo "<a href='services.php?pageNr=" . ($pageNr - 1) . "'>  Ankstenis </a>";
                    }

                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($i == $pageNr) {
                            $pageLink .= "<a class='active' href='services.php?pageNr=" . $i . "'>" . $i . "</a>";
                        } else {
                            $pageLink .= "<a href='services.php?pageNr=" . $i . "'>" . $i . "</a>";
                        }
                    };
                    echo $pageLink;

                    if ($pageNr < $total_pages) {
                        echo "<a href='services.php?pageNr=" . ($pageNr + 1) . "'>Sekantis</a>";
                    }
                    ?>
                </div> -->
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
                //$('#removeServiceModal').modal('show');


                $tr = $(this).closest('tr');

                var data = $tr.children('td').map(function() {

                    return $(this).text();
                }).get();
                console.log(data[0]);
                $('#service_id_remove').val(data[0]);

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
                //alert(id);

                $('#service_id_edit').val(data[0]);
                $('#service_name_edit').val(data[1]);
                $('#service_spec_edit').val(data[2]);
                $('#servicePriceEdit').val(data[4]);
                $('#service_desc_edit').val(data[5]);

            });

            $("#adminServicesTable").DataTable({
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
            })

        });

    </script>
</body>

</html>