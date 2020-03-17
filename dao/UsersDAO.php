<?php

require_once('../database/database.php');

class UsersDAO
{
    private $conn;

    // Faz contrução da classe UsersDAO juntamente com a instância da classe Database
    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }

    // Função para executar instruções SQL desejadas
    public function runQuery($sql)
    {
        // Prepara uma instrução SQL para ser executada pelo método PDOStatement :: execute ()
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    // Função para adicionar Users
    public function login(Users $Users)
    {
        try {

            // Recebe os dados de uma PESSOA que foram setados no UsersController
            $passUser = $Users->getPassUser();
            $emailUser = $Users->getEmailUser();

            // Prepara uma instrução SQL para ser executada pelo método PDOStatement :: execute ()
            $stmt = $this->conn->prepare("SELECT idUser, passUser, COUNT(*) as qntUsers FROM users WHERE emailUser = :emailUser");
            // Passa os parâmetros para a instrução SQL
            $stmt->bindparam(":emailUser", $emailUser, PDO::PARAM_STR);

            //Executa a query
            $stmt->execute();

            //Recebe o array com os resultados
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            //Verifica sem tem pelo menos 1 email igual ao recebido e se a senha desse email está correta.
            //Obs: pega somente o primeiro, por isso é setado emailUser como único no banco de dados            
            if (($result['qntUsers'] >= 1) && (password_verify($passUser, $result['passUser']))) {

                //Se não tiver iniciado a sessão, inicia e salva o ID na sessão
                if (!isset($_SESSION)) session_start();
                $_SESSION['idUser'] = $result['idUser'];

                //Redireciona para a página de ver tickets
                echo
                    "<script>
                    alert('Logado!');
                            window.location.href='../view/read-tickets.php';
                        </script>";
            } else {

                //Senha incorreta vai para a página inicial, que é a de login
                echo
                    "<script>
                            alert('Senha incorreta');
                            window.location.href='../view/index.php';
                        </script>";
            }
        } catch (PDOException $e) {
            // Caso alguma exceção ou erro, os mesmos serão mostrados na tela
            echo $e->getMessage();
        }
    }
}
