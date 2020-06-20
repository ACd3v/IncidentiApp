<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    include_once "vendorsHeaders.php";
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
                        <div class="col-lg-8 offset-lg-2">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Aggiungi Ruolo</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form id="form">
                                        <div class="row form-group">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Denominazione</label>
                                                    <input type="text" id="denominazione" placeholder="Inserisci il Nome" class="form-control" name="nome" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="postal-code" class=" form-control-label">Ferito?</label>
                                                <select name="ferito" id="ferito" class="form-control" required>
                                                    <option value="3">Seleziona</option>
                                                    <option value="0">No</option>
                                                    <option value="1">Si</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="row form-group">
                                                    <div class="col col-md-8">
                                                        <label for="textarea-input" class=" form-control-label">Descrizione</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <textarea name="textarea-input" id="descrizione" rows="6" placeholder="Inserisci una descrizione" class="form-control" required></textarea>
                                                    </div>
                                                </div>
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
                                                <p>Non la trovi? <a href="incidenteForm.php">Clicca qui</a></p>
                                            </div>
                                            <div class="col-6">
                                                <label class=" form-control-label">Seleziona Persona</label>
                                                <select name="idPersona" id="idPersona" class="form-control">
                                                    <option value="0">Seleziona</option>
                                                    <?php
                                                    $elencoPersone = PersonaDAO::getElencoPersone();
                                                    foreach ($elencoPersone as $persona) {
                                                        echo '<option value="'.$persona->getIdPersona().'">'.$persona->getNome().' '.$persona->getCognome().'</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <p>Non la trovi? <a href="personaForm.php">Clicca qui</a></p>
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
    // console.log(ferito);


    function validationAndSend() {
        if(form.checkValidity()){
            $('.alert').show();
            clickButton();
        }
    }

    function clickButton(){
        var denominazione=document.getElementById('denominazione').value;
        var ferito=document.getElementById('ferito').value;
        var descrizione=document.getElementById('descrizione').value;
        var idPersona=document.getElementById('idPersona').value;
        var idIncidente=document.getElementById('idIncidente').value;
        var invia=document.getElementById('invia').value;



        $.ajax({
            type:"post",
            url:"controllers/ruoloController.php",
            data:
                {
                    'denominazione' :denominazione,
                    'ferito' :ferito,
                    'descrizione' :descrizione,
                    'idPersona' :idPersona,
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


