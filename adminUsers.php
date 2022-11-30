<?php
include('functions/selectUsers.php');
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
    <title>Visi vartotojai</title>
</head>

<body>

    <?php include("head.php");

    ?>
    <div class="page-content p-5" id="content">
        <div class="row">
            <div class="col">
                <h1>Vartotojai</h1>

            </div>
        </div>


        <div class="row">
            <div class="col">
                <table id="adminUsersTable" class="table table-responsive table-light table-striped table-hover">
                    <thead class="table-info">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">El. paštas</th>
                            <th scope="col">Kontaktinis numeris</th>
                            <th scope="col">Vardas Pavardė</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($user = mysqli_fetch_array(
                            $all_users,
                            MYSQLI_ASSOC
                        )) :;
                        ?>
                            <tr>
                                <td><?php echo $user['id'] ?? ''; ?></td>
                                <td><?php echo $user['email'] ?? ''; ?></td>
                                <td><?php echo $user['phone'] ?? ''; ?></td>
                                <td><?php echo $user['name'] ?? ''; ?></td>
                                <td><button type="button" data-bs-toggle="modal" data-bs-target="#removeUserModal" class="btn btn-danger removeBtn"><i class="fa fa-trash" aria-hidden="true"></i></button></td>

                            </tr>
                        <?php
                        endwhile;
                        ?>
                    </tbody>
                </table>

                <form action="functions/deleteUser.php" method="POST" class="form">
                    <div class="modal fade" id="removeUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Pašalinti vartotoją</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="user_id_remove" id="user_id_remove">
                                    <h4>Ar tikrai norite pašalinti šį vartotoją?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Atšaukti</button>
                                    <button type="submit" name="deleteUserBtn" class="btn btn-primary">Pašalinti</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- <div class="pagination">
                    <?php
                    $pageLink = "";
                    if ($pageNr >= 2) {
                        echo "<a href='adminUsers.php?pageNr=" . ($pageNr - 1) . "'>  Ankstenis </a>";
                    }

                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($i == $pageNr) {
                            $pageLink .= "<a class='active' href='adminUsers.php?pageNr=" . $i . "'>" . $i . "</a>";
                        } else {
                            $pageLink .= "<a href='adminUsers.php?pageNr=" . $i . "'>" . $i . "</a>";
                        }
                    };
                    echo $pageLink;

                    if ($pageNr < $total_pages) {
                        echo "<a href='adminUsers.php?pageNr=" . ($pageNr + 1) . "'>Sekantis</a>";
                    }
                    ?>
                </div> -->
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="scripts/showHideForm.js"></script>

    <script>
        $(document).ready(function() {
            $("#adminUsersTable").DataTable({
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
            $('.removeBtn').on('click', function() {
                $('#removeUserModal').modal('show');


                $tr = $(this).closest('tr');

                var data = $tr.children('td').map(function() {

                    return $(this).text();
                }).get();

                $('#user_id_remove').val(data[0]);

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