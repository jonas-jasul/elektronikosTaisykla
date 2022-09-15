<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <title>Document</title>

</head>

<body>
    <h1 class="pb-2">Skydelis</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-dash specialistCard">
                    <div class="card-body-dash text-center">
                        <h5 class="card-title">Iš viso specialistų:</h5>
                        <p>5</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-dash clientCard">
                    <div class="card-body-dash text-center">
                        <h5 class="card-title">Iš viso klientų:</h5>
                        <p>50</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-dash activeRepairsCard">
                    <div class="card-body-dash text-center">
                        <h5 class="card-title">Aktyvių taisymų kiekis:</h5>
                        <p>25</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-dash inactiveRepairsCard">
                    <div class="card-body-dash text-center">
                        <h5 class="card-title">Neaktyvių taisymų kiekis:</h5>
                        <p>20</p>
                    </div>
                </div>
            </div>
        </div>
    <div id="chart-wrapper">
        <canvas id="myChart"></canvas>
        </div>
    </div>
    <script>
        // var ctx = document.getElementById("examChart").getContext("2d");

        // var myChart = new Chart(ctx, {
        //     type: 'line',
        //     options: {
        //         scales: {
        //             xAxes: [{
        //                 type: 'time',
        //             }]
        //         }
        //     },
        //     data: {
        //         labels: [moment().subtract(730, 'days').format("YYYY-MM-DD"), moment().subtract(365, 'days').format("YYYY-MM-DD"), moment().format("YYYY-MM-DD")],
        //         datasets: [{
        //             label: 'Taisymai',
        //             data: [
        //                 20,
        //                 5,
        //                 122,
        //             ],
        //             borderWidth: 1
        //         }]
        //     }
        // });


        
        let myChart = document.getElementById('myChart').getContext('2d');
        let newChart = new Chart(myChart, {
            type:'pie',
            data:{
                labels:['Aktyvus', 'Neaktyvus', 'Pabaigti'],
                datasets:[{
                    label:'Taisymu kiekis',
                    data:[
                        25,
                        20,
                        100
                    ],
                    backgroundColor:[
                        'rgb(236, 217, 183)',
                        'rgb(253, 165, 165)',
                        'rgb(194, 238, 129)'
                    ],
                    borderWidth:1,
                    borderColor:'black'
                }]
            },
            options:{
                plugins:{
                    title:{
                        display:true,
                        text:"Taisymai"
                    }
                },
                responsive:true
            }
        });
    </script>


</body>

</html>