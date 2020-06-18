<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once "vendorsHeaders.php";
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
                        <div class="col-lg-8 offset-lg-2">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Aggiungi Incidente</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form>
                                        <div class="row form-group">
                                            <div class="col-6">
                                                <div class="row form-group">
                                                    <div class="col col-md-8">
                                                        <label for="textarea-input" class=" form-control-label">Descrizione</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <textarea name="textarea-input" id="descrizione" rows="6" placeholder="Inserisci una descrizione" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Data</label>
                                                    <input type="text" id="data" placeholder="Inserisci il tuo Indirizzo" class="form-control" name="indirizzo">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Ora</label>
                                                    <input type="text" id="ora" placeholder="Inserisci il tuo Cap" class="form-control" name="cap">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="country" class=" form-control-label">Carica Foto</label>
                                                    <input type="text" id="pathFoto" placeholder="Inserisci il tuo Stato" class="form-control" name="stato">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class=" form-control-label">Seleziona il punto</label>
                                                <?php include "./mappa.html" ?>
                                            </div>
                                        </div>
                                            <button id="invia" type="submit" class="btn btn-success btn-sm" onclick="return clickButton()">Invia</button>
                                        </form>
                                    <div class="alert sufee-alert with-close alert-success alert-dismissible fade show" style="display: none">
                                        <span class="badge badge-pill badge-success">Successo</span>
                                        Persona correttamente aggiunta!
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

    function clickButton(){
        var descrizione=document.getElementById('descrizione').value;
        var data=document.getElementById('data').value;
        var ora=document.getElementById('ora').value;
        var latitudine=document.getElementById('lat').value;
        var longitudine=document.getElementById('lon').value;
        var invia=document.getElementById('invia').value;

        console.log(descrizione, data, ora, latitudine, longitudine, invia);

        $.ajax({
            type:"post",
            url:"controllers/incidenteController.php",
            data:
                {
                    'descrizione' :descrizione,
                    'longitudine' :longitudine,
                    'latitudine' :latitudine,
                    'data' :data,
                    'ora' :ora,
                    'invia' :invia
                },
            cache:false,
            success: function (html)
            {
                $('.alert').show();
                setTimeout(redirect, 2000);
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


