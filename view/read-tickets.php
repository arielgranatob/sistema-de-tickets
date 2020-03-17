<?php

//Se não tiver uma sessão iniciada, ele inicia uma nova
if (!isset($_SESSION))
    session_start();

//Se não tiver logado redireciona pro início para realizar o login
if(!$_SESSION['idUser'])
    header('location:index.php');
    
//Inclue o arquivo TicketsDAO.php 
require_once("../dao/TicketsDAO.php");

//Cria uma nova instância da classe TicketsDAO
$TicketsDAO = new TicketsDAO();

//Chama a função runQuery da classe TicketsDAO para executar a instrução SQL
$stmtTickets = $TicketsDAO->runQuery("SELECT * FROM tickets");

// Executa a instrução SQL
$stmtTickets->execute();

?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="shortcut icon" type="image/x-icon" href='../assets/favicon.ico'>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableTickets').DataTable();
        });
    </script>
    <title>Sistema de tickets para atendimento de demandas</title>
</head>

<body class="mx-auto" style="width: 70%; margin: 10px; background-color:seashell;">
    <p class="h2">Lista de todos os tickets cadastrados</p>
    <a class="btn btn-primary float-right" href="insert-ticket.php" role="button" style="margin-bottom: 30px">Novo ticket</a>
    <table id="tableTickets" class="table display">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Título</th>
                <th scope="col">Descrição</th>
                <th scope="col">Data da criação</th>
                <th scope="col">Status</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //Retorna uma matriz indexada pelo nome da coluna conforme resultado retornado pela execução da instrução SQL
            while ($RowTickets = $stmtTickets->fetch(PDO::FETCH_ASSOC)) {

                if ($RowTickets["statusTicket"]) $statusTicket = "Ativado";
                else $statusTicket = "Desativado";

                echo '<tr>
						<td>' . $RowTickets["idTicket"] . '</td>
						<td>' . $RowTickets["titleTicket"] . '</td>
						<td>' . $RowTickets["descriptionTicket"] . '</td>
						<td>' . $RowTickets["dateTicket"] . '</td>
						<td>' . $statusTicket . '</td>
						<td>
						    <a class="btn btn-primary" href="update-ticket.php?idTicket=' . $RowTickets["idTicket"] . '">Editar</a>
						    <a class="btn btn-danger" href="delete-ticket.php?idTicket=' . $RowTickets["idTicket"] . '">Excluir</a>
						</td>
					</tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>