<?php

// Recebe a ação desejada pelo usuario
$acao = $_POST["acao"];

switch ($acao) {
    case 'adicionar':
        // Faz a chamada da função
        addUser();
        break;
    case 'editar':
        // Faz a chamada da função
        editarUser();
        break;
    case 'excluir':
        // Faz a chamada da função
        excluirUser();
        break;
}

// Função para adicionar User
function addUser()
{
    // Inclue os arquivos necessários
    require_once('../model/UsersModel.php');
    require_once('../dao/UsersDAO.php');
    require_once('../database/Database.php');
    require_once("../controller/Util.php");

    //Cria uma nova instância da classe Util
    $Util = new Util();

    //Cria uma nova instância da classe Database
    $db = new Database();

    //Cria uma nova instância da classe UsersDAO
    $dao = new UsersDAO($db);

    //Obtém os dados do formulário de cadastro
    $titleUser = $_POST['titleUser'];
    $descriptionUser = $_POST['descriptionUser'];
    $statusUser = $_POST['statusUser'];
    $idUser = $_POST['idUser'];
    $dataUser = $_POST['dataUser'];

    // Instancia um novo objeto do tipo User e seta os dados
    $Users = new Users();
    $Users->setTitleUser($titleUser);
    $Users->setDescriptionUser($descriptionUser);
    $Users->setStatusUser($statusUser);
    $Users->setDataUser($dataUser);
    $Users->setIdUser($idUser);

    // Passa o obejto User para a função add no UsersDAO
    $dao->add($Users);
}

// Função para editar User
function editarUser()
{
    // Inclue os arquivos necessários
    require_once('../model/UsersModel.php');
    require_once('../dao/UsersDAO.php');
    require_once('../database/Database.php');
    require_once("../controller/Util.php");

    //Cria uma nova instância da classe Util
    $Util = new Util();

    //Cria uma nova instância da classe Database
    $db = new Database();

    //Cria uma nova instância da classe UsersDAO
    $dao = new UsersDAO($db);

    //Obtém os dados do formulário de edição
    $idUser = $_POST['idUser'];
    $titleUser = $_POST['titleUser'];
    $descriptionUser = $_POST['descriptionUser'];
    $statusUser = $_POST['statusUser'];
    $idUser = $_POST['idUser'];

    // Instancia um novo objeto do tipo User e seta os dados
    $Users = new Users();
    $Users->setIdUser($idUser);
    $Users->setTitleUser($titleUser);
    $Users->setDescriptionUser($descriptionUser);
    $Users->setStatusUser($statusUser);
    $Users->setIdUser($idUser);

    // Passa o obejto User para a função update no UsersDAO
    $dao->update($Users);
}

// Função para excluir User
function excluirUser()
{

    // Inclue os arquivos necessários
    require_once('../model/UsersModel.php');
    require_once('../dao/UsersDAO.php');
    require_once('../database/Database.php');

    //Cria uma nova instância da classe Database
    $db = new Database();

    //Cria uma nova instância da classe UsersDAO
    $dao = new UsersDAO($db);

    //Obtém os dados para exclusão
    $idUser = $_POST['idUser'];

    // Instancia um novo objeto do tipo User e seta os dados
    $Users = new Users();
    $Users->setIdUser($idUser);

    // Passa o obejto User para a função delete no UsersDAO
    $dao->delete($Users);
}
