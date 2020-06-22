<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once "vendorsHeaders.php";
        include_once "./dao/AssicurazioneDAO.php";
        include_once "./dao/PersonaDAO.php";
    ?>
    <title>Aggiungi Veicolo</title>
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
                                    <strong>Aggiungi Veicolo</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form id="form">
                                        <div class="row form-group">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Marca</label>
                                                    <input type="text" id="marca" placeholder="Inserisci la Marca" class="form-control" name="marca" required>
                                                </div>
                                            </div>
                                            <div class='col-sm-6'>
                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Tipo</label>
                                                    <input type="text" id="tipo" placeholder="Inserisci il Tipo" class="form-control" name="tipo" required>
                                                </div>
                                            </div>
                                            <div class='col-sm-6'>
                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Targa</label>
                                                    <input type="text" id="targa" placeholder="Inserisci Targa" class="form-control" name="targa" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Numero di Polizza</label>
                                                    <input type="text" id="numPolizza" placeholder="Inserisci il tuo Numero di Polizza" class="form-control" name="numPolizza" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class=" form-control-label">Seleziona Assicurazione</label>
                                                <select name="idAssicurazione" id="idAssicurazione" class="form-control">
                                                    <option value="0">Seleziona</option>
                                                    <?php
                                                        $elencoAssicurazioni = AssicurazioneDAO::getElencoAssicurazioni();
                                                        foreach ($elencoAssicurazioni as $assicurazione) {
                                                            echo '<option value="'.$assicurazione->getIdAssicurazione().'">'.$assicurazione->getDenominazione().'</option>';
                                                        }
                                                    ?>
                                                </select>
                                                <p>Non la trovi? <a href="assicurazioneForm.php">Clicca qui</a></p>
                                            </div>
                                            <div class="col-6">
                                                <label class=" form-control-label">Seleziona Persona</label>
                                                <select name="idPersona" id="idPersona" class="form-control">
                                                    <option value="0">Seleziona</option>
                                                    <?php
                                                    $elencoPersone = PersonaDAO::getElencoPersone();
                                                    foreach ($elencoPersone as $persona) {
                                                        echo '<option value="'.$persona->getIdPersona().'">'.$persona->getNome().'</option>';
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

    function validationAndSend() {
        if(form.checkValidity()){
            $('.alert').show();
            clickButton();
        }
    }

    function clickButton(){
        var marca=document.getElementById('marca').value;
        var tipo=document.getElementById('tipo').value;
        var targa=document.getElementById('targa').value;
        var numPolizza=document.getElementById('numPolizza').value;
        var idAssicurazione=document.getElementById('idAssicurazione').value;
        var idPersona=document.getElementById('idPersona').value;
        var invia=document.getElementById('invia').value;

        $.ajax({
            type:"post",
            url:"controllers/veicoloController.php",
            data:
                {
                    'marca' :marca,
                    'tipo' :tipo,
                    'targa' :targa,
                    'numPolizza' :numPolizza,
                    'idAssicurazione' :idAssicurazione,
                    'idPersona' :idPersona,
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


