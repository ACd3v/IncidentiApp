<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once "vendorsHeaders.php";
        include_once "./dao/AssicurazioneDAO.php";
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
                                    <h2 class="title-1 m-b-25">Elenco Completo delle Compagnie Assicurative</h2>
                                </div>
                                <div class="col-lg-12">
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-data3">
                                            <thead>
                                            <tr>
                                                <th>Denominazione</th>
                                                <th>validita</th>
                                                <th>Indirizzo</th>
                                                <th>Telefono</th>
                                                <th>Email</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $elencoAssicurazioni = AssicurazioneDAO::getElencoAssicurazioni();
                                            foreach ($elencoAssicurazioni as $assicurazione) {
                                                echo "<tr>";
                                                echo "<td>".$assicurazione->getDenominazione()."</td>";
                                                if($assicurazione->getValidita() == 1){
                                                    echo "<td>"."Si"."</td>";
                                                } else if ($assicurazione->getValidita() == 0){
                                                    echo "<td>". 'No'."</td>";
                                                }
                                                echo "<td>".$assicurazione->getIndirizzo()."</td>";
                                                echo "<td>" .$assicurazione->getTelefono(). "</td>";
                                                echo "<td>" .$assicurazione->getEmail(). "</td>";
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


