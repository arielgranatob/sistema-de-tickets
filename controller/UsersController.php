<?php

// Inclue os arquivos necessários
require_once('../model/UsersModel.php');
require_once('../dao/UsersDAO.php');
require_once('../database/Database.php');

//Cria uma nova instância da classe Database
$db = new Database();

//Cria uma nova instância da classe UsersDAO
$dao = new UsersDAO($db);

//Obtém os dados do formulário de cadastro
$passUser = $_POST['passUser'];
$emailUser = $_POST['emailUser'];

//Verifica se email ou senha está vazio
if (empty($emailUser) || empty($passUser))
    echo "<script>
        alert('Há campos vazios!');
        window.location.href='../view/index.php';
        </script>";

// Instancia um novo objeto do tipo User e seta os dados
$Users = new Users();
$Users->setPassUser($passUser);
$Users->setEmailUser($emailUser);

// Passa o obejto User para a função add no UsersDAO
$dao->login($Users);
