<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include_once "vendorsHeaders.php";
    include_once "./dao/VeicoloDAO.php";
    include_once "./dao/IncidenteDAO.php";
    ?>
    <title>Associa veicolo in incidente</title>
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
                        <div class="col-lg-8 offset-lg-2">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Associa un veicolo ad un incidente</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form id="form">
                                        <div class="row form-group">
                                            <div class="col-6">
                                                <label class=" form-control-label">Seleziona Veicolo</label>
                                                <select name="idVeicolo" id="idVeicolo" class="form-control">
                                                    <option value="0">Seleziona</option>
                                                    <?php
                                                    $elencoVeicolo = VeicoloDAO::getElencoVeicoli();
                                                    foreach ($elencoVeicolo as $veicolo) {
                                                        echo '<option value="'.$veicolo->getIdVeicolo().'">'.$veicolo->getMarca().' '.$veicolo->getTipo().'</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <p>Non lo trovi? <a href="veicoloForm.php">Clicca qui</a></p>
                                            </div>
                                            <div class="col-6">
                                                <label class=" form-control-label">Seleziona Incidente</label>
                                                <select name="idIncidente" id="idIncidente" class="form-control">
                                                    <option value="0">Seleziona</option>
                                                    <?php
                                                    $elencoIncidenti = IncidenteDAO::getElencoIncidenti();
                                                    foreach ($elencoIncidenti as $incidente) {
                                                        echo '<option value="'.$incidente->getIdIncidente().'">'.$incidente->getDescrizione().'</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <p>Non lo trovi? <a href="incidenteForm.php">Clicca qui</a></p>
                                            </div>
                                        </div>
                                        <button id="invia" type="submit" class="btn btn-success btn-sm" onclick="return validationAndSend()">Invia</button>
                                    </form>
                                    <div class="alert sufee-alert with-close alert-success alert-dismissible fade show" style="display: none">
                                        <span class="badge badge-pill badge-success">Successo</span>
                                        Veicolo correttamente aggiunto!.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
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

<script type="text/javascript">
    $('#calendario .input-group.date').datepicker({
        format: "yyyy-mm-dd",
        language: "it"
    });

    var form = document.getElementById('form');

    function validationAndSend() {
        if(form.checkValidity()){
            $('.alert').show();
            clickButton();
        }
    }

    function clickButton(){
        var idVeicolo=document.getElementById('idVeicolo').value;
        var idIncidente=document.getElementById('idIncidente').value;
        var invia=document.getElementById('invia').value;



        $.ajax({
            type:"post",
            url:"controllers/veicoloInIncidenteController.php",
            data:
                {
                    'idVeicolo' :idVeicolo,
                    'idIncidente' :idIncidente,
                    'invia' :invia
                },
            cache:false,
            success: function (html)
            {
                // $('.alert').show();
                // setTimeout(redirect, 2000);
            }
        });
        return false;
    }

    function redirect() {
        window.location.replace("index.php");
    }
</script>
</body>
</html>


