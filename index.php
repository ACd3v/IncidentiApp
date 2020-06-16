<?php
include_once __DIR__.'/dao/PersonaDAO.php';
include_once __DIR__.'/dao/IncidenteDAO.php';
include_once __DIR__.'/dao/VeicoloDAO.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
</head>

<body class="animsition">
    <div class="page-wrapper">
        <?php
        include_once __DIR__ . '/components/headerMobile.php';
        ?>
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <?php
            include_once __DIR__ .'/components/headerDesktop.php';
            include_once __DIR__ . '/components/sidebarDesktop.php';
            ?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <?php
                                                $totPersone = PersonaDAO::totPersone();
                                                echo "<h2>$totPersone</h2>"
                                                ?>
                                                <span>Persone registrate</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-alert-polygon"></i>
                                            </div>
                                            <div class="text">
                                                <?php
                                                $totIncidenti = IncidenteDAO::totIncidenti();
                                                echo "<h2>$totIncidenti</h2>"
                                                ?>
                                                <span>Incidenti registrati</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-car"></i>
                                            </div>
                                            <div class="text">
                                                <?php
                                                $totVeicoli = VeicoloDAO::totVeicoli();
                                                echo "<h2>$totVeicoli</h2>"
                                                ?>
                                                <span>Veicoli registrati</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<!--                        GRAFICI-->
<!--                        <div class="row">-->
<!--                            <div class="col-lg-6">-->
<!--                                <div class="au-card recent-report">-->
<!--                                    <div class="au-card-inner">-->
<!--                                        <h3 class="title-2">recent reports</h3>-->
<!--                                        <div class="chart-info">-->
<!--                                            <div class="chart-info__left">-->
<!--                                                <div class="chart-note">-->
<!--                                                    <span class="dot dot--blue"></span>-->
<!--                                                    <span>products</span>-->
<!--                                                </div>-->
<!--                                                <div class="chart-note mr-0">-->
<!--                                                    <span class="dot dot--green"></span>-->
<!--                                                    <span>services</span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="chart-info__right">-->
<!--                                                <div class="chart-statis">-->
<!--                                                    <span class="index incre">-->
<!--                                                        <i class="zmdi zmdi-long-arrow-up"></i>25%</span>-->
<!--                                                    <span class="label">products</span>-->
<!--                                                </div>-->
<!--                                                <div class="chart-statis mr-0">-->
<!--                                                    <span class="index decre">-->
<!--                                                        <i class="zmdi zmdi-long-arrow-down"></i>10%</span>-->
<!--                                                    <span class="label">services</span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="recent-report__chart">-->
<!--                                            <canvas id="recent-rep-chart"></canvas>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-lg-6">-->
<!--                                <div class="au-card chart-percent-card">-->
<!--                                    <div class="au-card-inner">-->
<!--                                        <h3 class="title-2 tm-b-5">char by %</h3>-->
<!--                                        <div class="row no-gutters">-->
<!--                                            <div class="col-xl-6">-->
<!--                                                <div class="chart-note-wrap">-->
<!--                                                    <div class="chart-note mr-0 d-block">-->
<!--                                                        <span class="dot dot--blue"></span>-->
<!--                                                        <span>products</span>-->
<!--                                                    </div>-->
<!--                                                    <div class="chart-note mr-0 d-block">-->
<!--                                                        <span class="dot dot--red"></span>-->
<!--                                                        <span>services</span>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col-xl-6">-->
<!--                                                <div class="percent-chart">-->
<!--                                                    <canvas id="percent-chart"></canvas>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Ultimi 3 Incidenti</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Data e Ora</th>
                                                <th>Id Incidente</th>
                                                <th>Descrizione</th>
                                                <th class="text-right">Longitudine</th>
                                                <th class="text-right">Latitudine</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $elencoIncidenti = IncidenteDAO::getElencoIncidenti();
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>© 2020 Copyright: <a href="https://github.com/ACd3v">ACd3v</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
