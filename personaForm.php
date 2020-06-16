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
        include_once __DIR__ .'/components/headerDesktop.php';
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
                                    <form action="elabora.php" method="post">
                                        <div class="row form-group">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="company" class=" form-control-label">Nome</label>
                                                    <input type="text" id="company" placeholder="Inserisci il tuo Nome" class="form-control">
                                                </div>
                                            </div>
                                            <div class='col-sm-6'>
                                                <div class="form-group">
                                                    <label for="vat" class=" form-control-label">Cognome</label>
                                                    <input type="text" id="vat" placeholder="Inserisci il tuo Cognome" class="form-control">
                                                </div>
                                            </div>
                                            <div class='col-sm-6'>
                                                <label for="vat" class=" form-control-label">Data di Nascita</label>
                                                <div id="calendario">
                                                <div class="input-group date" >
                                                    <input type="text" class="form-control"><span class="input-group-addon"><i class="fas fa-calendar-alt"></i></span>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Codice Fiscale</label>
                                                    <input type="text" id="city" placeholder="Inserisci il tuo Codice Fiscale" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Indirizzo</label>
                                                    <input type="text" id="postal-code" placeholder="Inserisci il tuo Indirizzo" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Cap</label>
                                                    <input type="text" id="postal-code" placeholder="Inserisci il tuo Cap" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="country" class=" form-control-label">Stato</label>
                                                    <input type="text" id="country" placeholder="Inserisci il tuo Stato" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="country" class=" form-control-label">Telefono</label>
                                                    <input type="text" id="country" placeholder="Inserisci il tuo Telefono" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="postal-code" class=" form-control-label">Numero Patente</label>
                                                    <input type="text" id="postal-code" placeholder="Inserisci il Numero della Patente" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label for="postal-code" class=" form-control-label">Categoria Patente</label>
                                                    <select name="select" id="select" class="form-control">
                                                        <option value="0">Seleziona</option>
                                                        <option value="1">A</option>
                                                        <option value="2">B</option>
                                                        <option value="3">C</option>
                                                    </select>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="country" class=" form-control-label">Ferito</label>
                                                    <div class="form-check">
                                                        <div class="radio">
                                                            <label for="radio1" class="form-check-label ">
                                                                <input type="radio" id="radio1" name="radios" value="option1" class="form-check-input">Si
                                                            </label>
                                                        </div>
                                                        <div class="radio">
                                                            <label for="radio2" class="form-check-label ">
                                                                <input type="radio" id="radio2" name="radios" value="option2" class="form-check-input">No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
<!--                                        <input type="submit" name="btn_invia" value="Invia">-->
                                        <button type="submit" class="btn btn-success btn-sm">Invia</button>
                                    </form>
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
</script>
</body>
</html>


