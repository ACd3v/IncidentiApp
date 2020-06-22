<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once "vendorsHeaders.php";
        include_once "./dao/PersonaDAO.php";
    ?>
    <title>Visualizza Persone</title>
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
                                    <h2 class="title-1 m-b-25">Elenco Completo delle Persone</h2>
                                </div>
                                <div class="col-lg-12">
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-data3">
                                            <thead>
                                            <tr>
                                                <th>Nome e Cognome</th>
                                                <th>Data di Nascita</th>
                                                <th>Codice Fiscale</th>
                                                <th>Indirizzo</th>
                                                <th>Cap</th>
                                                <th>Stato</th>
                                                <th>Telefono</th>
                                                <th>Numero Patente</th>
                                                <th>Categoria Patente</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $elencoPersone = PersonaDAO::getElencoPersone();
                                            foreach ($elencoPersone as $persona) {
                                                echo "<tr>";
                                                echo "<td>".$persona->getNome()." ".$persona->getCognome()."</td>";
                                                echo "<td>".$persona->getDataNascita()."</td>";
                                                echo "<td>".$persona->getCodFiscale()."</td>";
                                                echo "<td>".$persona->getIndirizzo()."</td>";
                                                echo "<td>".$persona->getCap()."</td>";
                                                echo "<td>".$persona->getStato()."</td>";
                                                echo "<td>".$persona->getTelefono()."</td>";
                                                echo "<td>".$persona->getNumPatente()."</td>";
                                                echo "<td>".$persona->getCatPatente()."</td>";
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


