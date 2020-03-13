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
    function addTicket() {

        // Inclue os arquivos necessários
        require_once ('../model/TicketsModel.php');
        require_once ('../dao/TicketsDAO.php');
        require_once ('../database/Database.php');
        require_once("../controller/Util.php");

        //Cria uma nova instância da classe Util
        $Util = new Util();

        //Cria uma nova instância da classe Database
        $db = new Database();

        //Cria uma nova instância da classe TicketsDAO
        $dao = new TicketsDAO($db);

        //Obtém os dados do formulário de cadastro
        $titleTicket = $_POST['titleTicket'];
        $descriptionTicket = $_POST['descriptionTicket'];
        $statusTitle = $_POST['statusTitle'];
        $dataTicket = $Util->inverteDate($_POST['dataTicket']);

        // Instancia um novo objeto do tipo Ticket e seta os dados
        $Tickets = new Tickets();
        $Tickets->setTitleTicket($titleTicket);
        $Tickets->setDescriptionTicket($descriptionTicket);
        $Tickets->setStatusTicket($statusTitle);
        $Tickets->setDateTicket($dataTicket);

        // Passa o obejto Ticket para a função add no TicketsDAO
        $dao->add($Tickets);
    }

    // Função para editar Ticket
    function editarTicket() {

        // Inclue os arquivos necessários
        require_once ('../model/TicketsModel.php');
        require_once ('../dao/TicketsDAO.php');
        require_once ('../database/Database.php');
        require_once("../controller/Util.php");
        
        //Cria uma nova instância da classe Util
        $Util = new Util();

        //Cria uma nova instância da classe Database
        $db = new Database();

        //Cria uma nova instância da classe TicketsDAO
        $dao = new TicketsDAO($db);

        //Obtém os dados do formulário de edição
        $codTicket = $_POST['codTicket'];
        $titleTicket = $_POST['titleTicket'];
        $descriptionTicket = $_POST['descriptionTicket'];
        $statusTitle = $_POST['statusTitle'];
        $dataTicket = $Util->inverteDate($_POST['dataTicket']);

        // Instancia um novo objeto do tipo Ticket e seta os dados
        $Tickets = new Tickets();
        $Tickets->setCodTicket($codTicket);
        $Tickets->setTitleTicket($titleTicket);
        $Tickets->setDescriptionTicket($descriptionTicket);
        $Tickets->setStatusTicket($statusTitle);
        $Tickets->setDateTicket($dataTicket);

        // Passa o obejto Ticket para a função update no TicketsDAO
        $dao->update($Tickets);
    }

    // Função para excluir Ticket
    function excluirTicket() {

        // Inclue os arquivos necessários
        require_once ('../model/TicketsModel.php');
        require_once ('../dao/TicketsDAO.php');
        require_once ('../database/Database.php');

        //Cria uma nova instância da classe Database
        $db = new Database();

        //Cria uma nova instância da classe TicketsDAO
        $dao = new TicketsDAO($db);

        //Obtém os dados para exclusão
        $codTicket = $_POST['codTicket'];

        // Instancia um novo objeto do tipo Ticket e seta os dados
        $Tickets = new Tickets();
        $Tickets->setCodTicket($codTicket);

        // Passa o obejto Ticket para a função delete no TicketsDAO
        $dao->delete($Tickets);
    }