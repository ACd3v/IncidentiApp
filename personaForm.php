<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once "vendorsHeaders.php";
    ?>
    <title>Aggiungi Persona</title>
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
                                    <strong>Aggiungi Persona</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form id="form">
                                        <div class="row form-group">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Nome</label>
                                                    <input type="text" id="nome" placeholder="Inserisci il tuo Nome" class="form-control" name="nome" required>
                                                </div>
                                            </div>
                                            <div class='col-sm-6'>
                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Cognome</label>
                                                    <input type="text" id="cognome" placeholder="Inserisci il tuo Cognome" class="form-control" name="cognome" required>
                                                </div>
                                            </div>
                                            <div class='col-sm-6'>
                                                <label for="vat" class=" form-control-label">Data di Nascita</label>
                                                <div id="calendario">
                                                <div class="input-group date" >
                                                    <input type="text" id="dataNascita" class="form-control" name="dataNascita"><span class="input-group-addon"><i class="fas fa-calendar-alt" required></i></span>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Codice Fiscale</label>
                                                    <input type="text" id="codFiscale" placeholder="Inserisci il tuo Codice Fiscale" class="form-control" name="codFiscale" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Indirizzo</label>
                                                    <input type="text" id="indirizzo" placeholder="Inserisci il tuo Indirizzo" class="form-control" name="indirizzo" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Cap</label>
                                                    <input type="text" id="cap" placeholder="Inserisci il tuo Cap" class="form-control" name="cap" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="country" class=" form-control-label">Stato</label>
                                                    <input type="text" id="stato" placeholder="Inserisci il tuo Stato" class="form-control" name="stato" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="country" class=" form-control-label">Telefono</label>
                                                    <input type="text" id="telefono" placeholder="Inserisci il tuo Telefono" class="form-control" name="telefono" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Numero Patente</label>
                                                    <input type="text" id="numPatente" placeholder="Inserisci il Numero della Patente" class="form-control" name="numPatente" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="postal-code" class=" form-control-label">Categoria Patente</label>
                                                    <select name="catPatente" id="catPatente" class="form-control" required>
                                                        <option value="0">Seleziona</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="C">C</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <button id="invia" type="submit" class="btn btn-success btn-sm" onclick="return validationAndSend()">Invia</button>
                                    </form>
                                    <div class="alert sufee-alert with-close alert-success alert-dismissible fade show" style="display: none">
                                        <span class="badge badge-pill badge-success">Successo</span>
                                        Persona correttamente aggiunta!.
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
        var nome=document.getElementById('nome').value;
        var cognome=document.getElementById('cognome').value;
        var dataNascita=document.getElementById('dataNascita').value;
        var codFiscale=document.getElementById('codFiscale').value;
        var indirizzo=document.getElementById('indirizzo').value;
        var cap=document.getElementById('cap').value;
        var stato=document.getElementById('stato').value;
        var telefono=document.getElementById('telefono').value;
        var numPatente=document.getElementById('numPatente').value;
        var catPatente=document.getElementById('catPatente').value;
        var invia=document.getElementById('invia').value;

        $.ajax({
            type:"post",
            url:"controllers/personaController.php",
            data:
                {
                    'nome' :nome,
                    'cognome' :cognome,
                    'dataNascita' :dataNascita,
                    'codFiscale' :codFiscale,
                    'indirizzo' :indirizzo,
                    'cap' :cap,
                    'stato' :stato,
                    'telefono' :telefono,
                    'numPatente' :numPatente,
                    'catPatente' :catPatente,
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


