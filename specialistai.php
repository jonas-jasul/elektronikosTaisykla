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
    <?php include ("head.php");?>
    <div class="page-content p-5" id="content">
        <div class="row">
            <div class="col">
                <h1>Specialistai</h1>
                <br>
                <button>Pridėti</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Vardas</th>
                            <th scope="col">Pavardė</th>
                            <th scope="col">Kontaktinis numeris</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Jonas</td>
                            <td>Jasulevičius</td>
                            <td>+37060521032</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Tomas</td>
                            <td>Tomauskas</td>
                            <td>+370000000</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Petras</td>
                            <td>Petraitis</td>
                            <td>+370100000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>