<?php

//Inclue o arquivo TicketsDAO.php 
require_once("../dao/TicketsDAO.php");

//Cria uma nova instância da classe TicketsDAO
$TicketsDAO = new TicketsDAO();

//Chama a função runQuery da classe TicketsDAO para executar a instrução SQL
$stmtTickets = $TicketsDAO->runQuery("SELECT * FROM tickets WHERE idTicket = '" . $_GET['idTicket'] . "'");


// Executa a instrução SQL
$stmtTickets->execute();

//Retorna uma matriz indexada pelo title da coluna conforme resultado retornado pela execução da instrução SQL
$RowTickets = $stmtTickets->fetch(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Sistema de tickets para atendimento de demandas</title>
</head>

<body>
	<main role="role" class="container">
		<div class="row">
			<div class="col-md-12">
				<form action="../controller/TicketsController.php" method="POST" enctype="multipart/form-data">
					<legend>Confirmação de exclusão de pessoa</legend>
					<input type="hidden" name="acao" value="excluir">
					<input type="hidden" name="idTicket" value="<?=$RowTickets['idTicket']?>">
					<div class="row">
						<div class="col-lg-12 col-sm-12"">
								<div class=" form-group">
							Deseja realmente excluir <b><?=$RowTickets['titleTicket']?></b>?
						</div>
					</div>
			</div>
			<button type="submit" class="btn btn-primary">Excluir</button>
			<a class="btn btn-danger" href="read-ticket.php">Cancelar</a>
			</form>
		</div>
		</div>
	</main>
	<script src="https://ide.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>

</html>