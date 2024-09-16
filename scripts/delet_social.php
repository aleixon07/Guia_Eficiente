<?php

// Inicia a sessão
session_start();

// Verifica se há uma sessão de usuário ativa e se o ID do usuário não está vazio
if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {

    // Inclui o arquivo de conexão com o banco de dados
    include_once "connection.php";

    // Obtém o ID do usuário da sessão
    $id_usuario_sessao = $_SESSION['id_usuario'];

    // Consulta o banco de dados para obter os dados do usuário logado
    $sql_usuario = "SELECT * FROM usuario WHERE IdUsuario = '$id_usuario_sessao' LIMIT 1";
    $result_usuario = mysqli_query($conn, $sql_usuario);

    // Se não houver resultados para o usuário na sessão, redireciona para a página inicial
    if (mysqli_num_rows($result_usuario) == 0) {
        header("Location: ../index.php");
        exit();
    } else {
        // Obtém os dados do usuário
        $row_usuario = mysqli_fetch_assoc($result_usuario);

        // Verifica se a requisição é do tipo GET
        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            // Verifica se o parâmetro 'id' foi passado na URL
            if (isset($_GET['id']) && !empty($_GET['id'])) {

                // Obtém o ID do usuário a ser excluído da URL
                $id_excluir = $_GET['id'];


                // Query para excluir o usuário do banco de dados
                $sql_delet = "DELETE FROM social WHERE IdSocial = '$id_excluir'";
                $result_delet = mysqli_query($conn, $sql_delet);

                // Se a exclusão for bem-sucedida, redireciona para a página inicial do administrador
                if ($result_delet) {
                    $succ = md5(3);
                    header("Location: ../adm/social.php?e=$succ"); // ALERT 3 (SUCESSO AO EXCLUIR)
                    exit();
                }
            } else {
                // Se o parâmetro 'id' não foi passado na URL, redireciona para a página inicial do administrador
                header("Location: ../adm/index.php");
                exit();
            }
        } else {
            // Se a requisição não for do tipo GET, redireciona para a página inicial do administrador
            header("Location: ../adm/index.php");
            exit();
        }
    }
} else {
    // Se não houver uma sessão de usuário ativa, redireciona para a página inicial
    header("Location: ../index.php");
    exit();
}
