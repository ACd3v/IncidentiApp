<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include_once "vendorsHeaders.php";
    include_once "./dao/RuoloDAO.php";
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
                        <div class="col-lg-8 offset-lg-2">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Elimina Ruolo</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form id="form">
                                        <div class="row form-group">
                                            <div class="col-8 offset-2">
                                                <label class=" form-control-label">Seleziona Ruolo</label>
                                                <select name="idRuolo" id="idRuolo" class="form-control">
                                                    <option value="0">Seleziona</option>
                                                    <?php
                                                    $elencoRuoliInfo = RuoloDAO::getElencoRuoliInfo();
                                                    $elencoRuoli = RuoloDAO::getElencoRuoli();

//                                                    foreach ($elencoRuoliInfo as $ruoloInfo) {
//                                                        foreach ($elencoRuoli as $ruolo){
//                                                                echo '<option value="'.$ruolo->getIdRuolo().'">'.$ruoloInfo->getNome().' '.$ruoloInfo->getCognome().' - '.$ruoloInfo->getDenominazione().' -> '.$ruoloInfo->getDescrizione().'</option>';
//                                                        }
//                                                    }

                                                    reset($elencoRuoli);
                                                    foreach ($elencoRuoliInfo as $ruoloInfo) {
                                                        $ruolo = current($elencoRuoli); next($elencoRuoli);
                                                        echo '<option value="'.$ruolo->getIdRuolo().'">'.$ruoloInfo->getNome().' '.$ruoloInfo->getCognome().' - '.$ruoloInfo->getDenominazione().' -> '.$ruoloInfo->getDescrizione().'</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <p>Vuoi aggiungerlo? <a href="ruoloForm.php">Clicca qui</a></p>
                                            </div>
                                            <div class="col-8 offset-5">
                                                <button id="invia" type="reset" class="btn btn-danger btn-sm" onclick="return validationAndSend()">
                                                    <i class="fa fa-eraser"></i> Elimina
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="alert sufee-alert alert with-close alert-danger alert-dismissible fade show" style="display: none">
                                        <span class="badge badge-pill badge-danger">Successo</span>
                                        Persona eliminata correttamente!
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
    // console.log(ferito);


    function validationAndSend() {
        if(form.checkValidity()){
            $('.alert').show();
            clickButton();
            setTimeout(redirect, 1500);
        }
    }

    function clickButton(){
        var idRuolo=document.getElementById('idRuolo').value;
        var invia=document.getElementById('invia').value;

        $.ajax({
            type:"post",
            url:"controllers/ruoloDeleteController.php",
            data:
                {
                    'idRuolo' :idRuolo,
                    'invia' :invia
                },
            cache:false,
            success: function (response)
            {
                console.log(response);
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


