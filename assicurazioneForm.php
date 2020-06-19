<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include_once "vendorsHeaders.php";
    ?>
    <title>Aggiungi Assicurazione</title>
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
                                    <strong>Aggiungi Assicurazione</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form id="form">
                                        <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Denominazione</label>
                                                    <input type="text" id="denominazione" placeholder="Inserisci la Denominazione" class="form-control" name="denominazione" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="address" class=" form-control-label">Indirizzo</label>
                                                    <input type="text" id="indirizzo" placeholder="Inserisci il tuo Indirizzo" class="form-control" name="indirizzo" required>
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
                                                    <label for="email" class=" form-control-label">Email</label>
                                                    <input type="text" id="email" placeholder="Inserisci la tua Email" class="form-control" name="email" required>
                                                </div>
                                            </div>
                                        </div>
                                        <button id="invia" type="submit" class="btn btn-success btn-sm" onclick="return validationAndSend()">Invia</button>
                                    </form>
                                    <div class="alert sufee-alert with-close alert-success alert-dismissible fade show" style="display: none">
                                        <span class="badge badge-pill badge-success">Successo</span>
                                        Assicurazione correttamente aggiunta!.
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
        var denominazione=document.getElementById('denominazione').value;
        var indirizzo=document.getElementById('indirizzo').value;
        var telefono=document.getElementById('telefono').value;
        var email=document.getElementById('email').value;
        var invia=document.getElementById('invia').value;

        $.ajax({
            type:"post",
            url:"controllers/assicurazioneController.php",
            data:
                {
                    'denominazione' :denominazione,
                    'indirizzo' :indirizzo,
                    'telefono' :telefono,
                    'email' :email,
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


