<?php

// Recebe a ação desejada pelo usuario
$acao = $_POST["acao"];

switch ($acao) {
    case 'adicionar':
        // Faz a chamada da função
        addTicket();
        break;
    case 'editar':
        // Faz a chamada da função
        editarTicket();
        break;
    case 'excluir':
        // Faz a chamada da função
        excluirTicket();
        break;
}

// Função para adicionar Ticket
function addTicket()
{
    // Inclue os arquivos necessários
    require_once('../model/TicketsModel.php');
    require_once('../dao/TicketsDAO.php');
    require_once('../database/Database.php');

    //Cria uma nova instância da classe Database
    $db = new Database();

    //Cria uma nova instância da classe TicketsDAO
    $dao = new TicketsDAO($db);

    //Obtém os dados do formulário de cadastro
    $titleTicket = $_POST['titleTicket'];
    $descriptionTicket = $_POST['descriptionTicket'];
    $statusTicket = $_POST['statusTicket'];
    $idUser = $_POST['idUser'];
    $dateTicket = $_POST['dateTicket'];

    //Verifica se há campos vazios
    if (empty($titleTicket) || empty($descriptionTicket) || empty($statusTicket))
        echo "<script>
        alert('Há campos vazios!');
        window.location.href='../view/insert-ticket.php';
        </script>";

    // Instancia um novo objeto do tipo Ticket e seta os dados
    $Tickets = new Tickets();
    $Tickets->setTitleTicket($titleTicket);
    $Tickets->setDescriptionTicket($descriptionTicket);
    $Tickets->setStatusTicket($statusTicket);
    $Tickets->setDateTicket($dateTicket);
    $Tickets->setIdUser($idUser);

    // Passa o obejto Ticket para a função add no TicketsDAO
    $dao->add($Tickets);
}

// Função para editar Ticket
function editarTicket()
{
    // Inclue os arquivos necessários
    require_once('../model/TicketsModel.php');
    require_once('../dao/TicketsDAO.php');
    require_once('../database/Database.php');

    //Cria uma nova instância da classe Database
    $db = new Database();

    //Cria uma nova instância da classe TicketsDAO
    $dao = new TicketsDAO($db);

    //Obtém os dados do formulário de edição
    $idTicket = $_POST['idTicket'];
    $titleTicket = $_POST['titleTicket'];
    $descriptionTicket = $_POST['descriptionTicket'];
    $statusTicket = $_POST['statusTicket'];
    $idUser = $_POST['idUser'];

    //Verifica se há campos vazios
    if (empty($titleTicket) || empty($descriptionTicket))
        echo "<script>
        alert('Há campos vazios!');
        window.location.href='../view/update-ticket.php?idTicket=" . $idTicket . "';
        </script>";

    // Instancia um novo objeto do tipo Ticket e seta os dados
    $Tickets = new Tickets();
    $Tickets->setIdTicket($idTicket);
    $Tickets->setTitleTicket($titleTicket);
    $Tickets->setDescriptionTicket($descriptionTicket);
    $Tickets->setStatusTicket($statusTicket);
    $Tickets->setIdUser($idUser);

    // Passa o obejto Ticket para a função update no TicketsDAO
    $dao->update($Tickets);
}

// Função para excluir Ticket
function excluirTicket()
{
    // Inclue os arquivos necessários
    require_once('../model/TicketsModel.php');
    require_once('../dao/TicketsDAO.php');
    require_once('../database/Database.php');

    //Cria uma nova instância da classe Database
    $db = new Database();

    //Cria uma nova instância da classe TicketsDAO
    $dao = new TicketsDAO($db);

    //Obtém os dados para exclusão
    $idTicket = $_POST['idTicket'];

    // Instancia um novo objeto do tipo Ticket e seta os dados
    $Tickets = new Tickets();
    $Tickets->setIdTicket($idTicket);

    // Passa o obejto Ticket para a função delete no TicketsDAO
    $dao->delete($Tickets);
}
