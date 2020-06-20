<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once "vendorsHeaders.php";
        include_once "./dao/RuoloDAO.php";
        include_once "./dao/PersonaDAO.php";
        include_once "./dao/IncidenteDAO.php";
    ?>
    <title>Aggiungi Ruolo</title>
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
                                    <h2 class="title-1 m-b-25">Elenco Completo dei Ruoli</h2>
                                </div>
                                <div class="col-lg-12">
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-data3">
                                            <thead>
                                            <tr>
                                                <th>Denominazione</th>
                                                <th>Ferito</th>
                                                <th>Descrizione</th>
                                                <th>Persona</th>
                                                <th>Incidente</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $elencoRuoli = RuoloDAO::getElencoRuoli();

                                            foreach ($elencoRuoli as $ruolo) {
                                                $persona = PersonaDAO::getPersona($ruolo->getIdPersona());
                                                $incidente = IncidenteDAO::getIncidente($ruolo->getIdIncidente());

                                                echo "<tr>";
                                                echo "<td>".$ruolo->getDenominazione()."</td>";
                                                if($ruolo->getFerito() == 1){
                                                    echo "<td>"."Si"."</td>";
                                                } else if ($ruolo->getFerito() == 0){
                                                    echo "<td>". 'No'."</td>";
                                                }
                                                echo "<td>".$ruolo->getDescrizione()."</td>";
                                                echo "<td>".$persona->getNome().' '.$persona->getCognome()."</td>";
                                                echo "<td>".$incidente->getDescrizione()."</td>";
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


