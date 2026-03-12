@extends('layouts.default')

@section('title')

<h3>  
     Nombre de réservations (réservations en cours, validées ou effectuées) par mois 
</h3>
   
@endsection

@section('content')

<div class="row">
    <div class="col-6">

        <!—Chargement de l’API AJAX -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">

            /* Chargement de l’API de visualisation et des packages corechart */
            google.charts.load('current', {'packages': ['corechart']});

            /* Initialisation d’une fonction de rappel à exécuter une fois l’API chargée*/
            google.charts.setOnLoadCallback(drawChart);

            /* 
             La fonction de rappel créé valorise un objet de type DataTable, instancie un objet pie chart à partir des données puis dessine le graphique  */
            function drawChart() {

                /* déclaration et initialisation d’un objet DataTable */
                var dataTable = new google.visualization.DataTable();
    dataTable.addColumn('string', 'Mois Année');
    dataTable.addColumn('number', 'Nombre de réservation');
    var data = {!! $dataJson !!} ;
        data.forEach(function (element) {
            dataTable.addRows(
                [
                  [element["moisAnneeDeReservation"],
                   element["nbReservationParMoisPourUnUtilisateur"]]
                ]);
             });

                /* Set chart options */
     var options = {'title': 'Répartition des réservations par mois au cours de l\'année courante',
                    'width': 900,
                    'height': 500                       
                };

        /* Instantiate and draw our chart, passing in some options.*/
                var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
                chart.draw(dataTable, options);
            }
        </script>
        
     <!--Div that will hold the pie chart-->
        <div id="chart_div">        </div>
    </div>

</div>
</div>

@endsection