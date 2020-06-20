<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once "vendorsHeaders.php";
        include_once "./dao/IncidenteDAO.php";
    ?>
    <title>Aggiungi Incidente</title>
</head>

<body class="animsition">
<div class="page-wrapper">
    <?php
    include_once __DIR__ . '/components/headerMobile.php';
    ?>
    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <?php
        include_once __DIR__ . '/components/headerDesktop.php';
        include_once __DIR__ . '/components/sidebarDesktop.php';
        ?>
        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="title-1 m-b-25">Elenco Completo degli Incidenti</h2>
                                </div>
                                <div class="col-lg-12">
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-data3">
                                            <thead>
                                            <tr>
                                                <th>Descrizione</th>
                                                <th>Longitudine</th>
                                                <th>Latitudine</th>
                                                <th>Data</th>
                                                <th>Ora</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $elencoIncidenti = IncidenteDAO::getElencoUltimiIncidenti();
                                            foreach ($elencoIncidenti as $incidente) {
                                                echo "<tr>";
                                                echo "<td>".$incidente->getData()." ".$incidente->getOra()."</td>";
                                                echo "<td>".$incidente->getIdIncidente()."</td>";
                                                echo "<td>".$incidente->getDescrizione()."</td>";
                                                echo "<td>" .$incidente->getLongitudine(). "</td>";
                                                echo "<td>" .$incidente->getLatitudine(). "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once "vendorsFooter.php"
?>

</body>
</html>


