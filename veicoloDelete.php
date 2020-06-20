<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include_once "vendorsHeaders.php";
    include_once "./dao/VeicoloDAO.php";

    ?>
    <title>Elimina Veicolo</title>
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
                                    <strong>Elimina Veicolo</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form id="form">
                                        <div class="row form-group">
                                            <div class="col-8 offset-2">
                                                <label class=" form-control-label">Seleziona Veicolo</label>
                                                <select name="idVeicolo" id="idVeicolo" class="form-control">
                                                    <option value="0">Seleziona</option>
                                                    <?php
                                                    $elencoVeicoli = VeicoloDAO::getElencoVeicoli();

                                                    foreach ($elencoVeicoli as $veicolo) {
                                                        echo '<option value="'.$veicolo->getIdVeicolo().'">'.$veicolo->getMarca().' '.$veicolo->getTipo().'</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <p>Vuoi aggiungerlo? <a href="veicoloForm.php">Clicca qui</a></p>
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
                                        Veicolo eliminato correttamente!
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
            setTimeout(redirect, 1500);
        }
    }

    function clickButton(){
        var idVeicolo=document.getElementById('idVeicolo').value;
        var invia=document.getElementById('invia').value;

        $.ajax({
            type:"post",
            url:"controllers/veicoloDeleteController.php",
            data:
                {
                    'idVeicolo' :idVeicolo,
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


