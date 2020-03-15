<?php

require_once('../database/database.php');

class TicketsDAO
{

    private $conn;

    // Faz contrução da classe TicketsDAO juntamente com a instância da classe Database
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

    // Função para adicionar Tickets
    public function add(Tickets $Tickets)
    {
        try {
            // Recebe os dados de um Ticket que foram setados no TicketsController
            $titleTicket = $Tickets->getTitleTicket();
            $descriptionTicket = $Tickets->getDescriptionTicket();
            $dataTicket = $Tickets->getDataTicket();
            $statusTicket = $Tickets->getStatusTicket();
            $idUser = $Tickets->getIdUser();

            // Prepara uma instrução SQL para ser executada pelo método PDOStatement :: execute ()
            $stmt = $this->conn->prepare("INSERT INTO tickets (titleTicket, dataTicket, descriptionTicket, statusTicket, idUser) VALUES(:titleTicket, :dataTicket, :descriptionTicket, :statusTicket, :idUser)");

            // Passa os parâmetros para a instrução SQL
            $stmt->bindparam(":titleTicket", $titleTicket, PDO::PARAM_STR);
            $stmt->bindparam(":descriptionTicket", $descriptionTicket, PDO::PARAM_STR);
            $stmt->bindparam(":dataTicket", $dataTicket, PDO::PARAM_STR);
            $stmt->bindparam(":statusTicket", $statusTicket, PDO::PARAM_STR);
            $stmt->bindparam(":idUser", $idUser, PDO::PARAM_STR);

            // Executa uma instrução preparada e se e instrução for executada com sucesso exibe a mensagem na tela e redireciona para a página de listagem de Tickets
            if ($stmt->execute()) {
                echo
                    "<script>
                            window.location.href='../view/read-tickets.php';
                        </script>";

                // Se e instrução não for executada com sucesso exibe a mensagem na tela e redireciona para a página de listagem de Tickets
            } else {
                echo
                    "<script>
                            alert('Erro ao cadastrar a ticket!');
                            window.location.href='../view/read-tickets.php';
                        </script>";
            }
        } catch (PDOException $e) {

            // Caso alguma exceção ou erro, os mesmos serão mostrados na tela
            echo $e->getMessage();
        }
    }

    // Função para editar os dados de Tickets
    public function update(Tickets $Tickets)
    {
        try {
            // Recebe os dados de uma Ticket que foram setados no TicketsController
            $idTicket = $Tickets->getIdTicket();
            $titleTicket = $Tickets->getTitleTicket();
            $descriptionTicket = $Tickets->getDescriptionTicket();
            $dataTicket = $Tickets->getDataTicket();
            $statusTicket = $Tickets->getStatusTicket();

            // Prepara uma instrução SQL para ser executada pelo método PDOStatement :: execute ()
            $stmt = $this->conn->prepare("UPDATE Tickets SET titleTicket = ?, descriptionTicket = ?, dataTicket = ?, statusTicket = ?, idUser = ? WHERE idTicket = ?");

            // Passa os parâmetros para a instrução SQL
            $stmt->bindparam(1, $titleTicket, PDO::PARAM_STR);
            $stmt->bindparam(2, $descriptionTicket, PDO::PARAM_STR);
            $stmt->bindparam(3, $dataTicket, PDO::PARAM_STR);
            $stmt->bindparam(4, $statusTicket, PDO::PARAM_STR);
            $stmt->bindparam(5, $idTicket, PDO::PARAM_INT);
            $stmt->bindparam(6, $idUser, PDO::PARAM_INT);

            // Executa uma instrução preparada e se e instrução for executada com sucesso exibe a mensagem na tela e redireciona para a página de listagem de Tickets
            if ($stmt->execute()) {
                echo
                    "<script>
                            window.location.href='../view/read-tickets.php';
                        </script>";

                // Se e instrução não for executada com sucesso exibe a mensagem na tela e redireciona para a página de listagem de Tickets
            } else {
                echo
                    "<script>
                            alert('Erro ao alterar dos dados da ticket!');
                            window.location.href='../view/read-tickets.php';
                        </script>";
            }
        } catch (PDOException $e) {

            // Caso alguma exceção ou erro, os mesmos serão mostrados na tela
            echo $e->getMessage();
        }
    }

    // Função para excluir Tickets
    public function delete(Tickets $Tickets)
    {
        try {

            // Recebe os dados de uma Ticket que foram setados no TicketsController
            $idTicket = $Tickets->getIdTicket();

            // Prepara uma instrução SQL para ser executada pelo método PDOStatement :: execute ()
            $stmt = $this->conn->prepare("DELETE FROM tickets WHERE idTicket = ?");

            // Passa os parâmetros para a instrução SQL
            $stmt->bindparam(1, $idTicket, PDO::PARAM_INT);

            // Executa uma instrução preparada e se e instrução for executada com sucesso exibe a mensagem na tela e redireciona para a página de listagem de Tickets
            if ($stmt->execute()) {
                echo
                    "<script>
                            window.location.href='../view/read-tickets.php';
                        </script>";

                // Se e instrução não for executada com sucesso exibe a mensagem na tela e redireciona para a página de listagem de Tickets
            } else {
                echo
                    "<script>
                            alert('Erro ao deletar ticket!');
                            window.location.href='../view/read-tickets.php';
                        </script>";
            }
        } catch (PDOException $e) {
            // Caso alguma exceção ou erro, os mesmos serão mostrados na tela
            echo $e->getMessage();
        }
    }
}
