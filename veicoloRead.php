<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once "vendorsHeaders.php";
        include_once "./dao/VeicoloDAO.php";
        include_once "./dao/AssicurazioneDAO.php";
        include_once "./dao/PersonaDAO.php";
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
                                    <h2 class="title-1 m-b-25">Elenco Completo dei Veicoli</h2>
                                </div>
                                <div class="col-lg-12">
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-data3">
                                            <thead>
                                            <tr>
                                                <th>marca</th>
                                                <th>tipo</th>
                                                <th>targa</th>
                                                <th>numPolizza</th>
                                                <th>Assicurazione</th>
                                                <th>Persona</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $elencoVeicoli = VeicoloDAO::getElencoVeicoli();

                                            foreach ($elencoVeicoli as $veicolo) {
                                                $idPersona = $veicolo->getIdPersona();
                                                $idAssicurazione = $veicolo->getIdAssicurazione();

                                                $persona = PersonaDAO::getPersona($idPersona);
                                                $assicurazione = AssicurazioneDAO::getAssicurazione($idAssicurazione);

                                                echo "<tr>";
                                                echo "<td>".$veicolo->getMarca()."</td>";
                                                echo "<td>".$veicolo->getTipo()."</td>";
                                                echo "<td>".$veicolo->getTarga()."</td>";
                                                echo "<td>".$veicolo->getNumPolizza()."</td>";
                                                echo "<td>".$assicurazione->getDenominazione()."</td>";
                                                echo "<td>".$persona->getNome().' '.$persona->getCognome()."</td>";
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


