<?php

//Se não tiver uma sessão iniciada, ele inicia uma nova
if (!isset($_SESSION))
    session_start();

//Se não tiver logado redireciona pro início para realizar o login
if(!$_SESSION['idUser'])
    header('location:index.php');

//Default de data e hora setado como SP
date_default_timezone_set('America/Sao_Paulo');

//Timestamp de data e horário que será salvo no banco de dados
$timestamp = date('Y-m-d H:i:s');

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href='../assets/favicon.ico'>
    <title>Sistema de tickets para atendimento de demandas</title>
</head>

<body class="mx-auto" style="width: 70%; margin: 10px; background-color:seashell;">
    <p class="h2">Cadastrar novo ticket</p>
    <a class="btn btn-primary float-right" href="read-tickets.php" role="button">Listar</a>
    <form action="../controller/TicketsController.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="acao" value="adicionar">
        <input type="hidden" name="idUser" value="<?=  $_SESSION['idUser']; ?>">
        <input type="hidden" name="dateTicket" value="<?= $timestamp; ?>">
        <div class="form-row">
            <div class="form-group col-md-9">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" name="titleTicket" placeholder="Título">
            </div>
            <div class="form-group col-md-3">
                <label for="status">Status</label>
                <select class="form-control" name="statusTicket">
                    <option value="1">Ativado</option>
                    <option value="0">Desativado</option>
                </select>
            </div>
            <div class="form-group col-md-12">
                <textarea class="form-control" name="descriptionTicket" rows="3" placeholder="Descrição"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>