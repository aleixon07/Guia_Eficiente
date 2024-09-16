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
        header("Location: ../");
        exit();
    } else {
        // Obtém os dados do usuário logado
        $row_usuario = mysqli_fetch_assoc($result_usuario);

        // Verifica se a requisição é do tipo POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Verifica se os campos necessários estão definidos e não estão vazios
            if (isset($_POST["nome"]) && isset($_POST["atual_senha"]) && !empty($_POST["nome"]) && !empty($_POST["atual_senha"])) {

                // Obtém os valores dos campos do formulário
                $nome = $_POST['nome'];
                $senha_atual = $_POST['atual_senha'];

                // Verifica se a senha atual fornecida pelo usuário coincide com a senha armazenada no banco de dados
                if (password_verify($senha_atual, $row_usuario["Senha"])) {

                    // Verifica se uma nova senha foi fornecida
                    if (!empty($_POST["new_senha"])) {

                        // Se sim, define a nova senha e a criptografa
                        $senha_nova = $_POST["new_senha"];
                        $senha_nova2 = password_hash($senha_nova, PASSWORD_DEFAULT);

                        // Cria a query SQL para atualizar os dados do usuário, incluindo a nova senha
                        $sql_editar = "UPDATE usuario SET Nome = '$nome', Senha = '$senha_nova2' WHERE IdUsuario = '$id_usuario_sessao'";

                    } else {

                        // Se não, cria a query SQL para atualizar apenas o nome do usuário
                        $sql_editar = "UPDATE usuario SET Nome = '$nome' WHERE IdUsuario = '$id_usuario_sessao'";

                    }

                    // Executa a query de atualização no banco de dados
                    $result_edit = mysqli_query($conn, $sql_editar);

                    // Verifica se a atualização foi bem-sucedida
                    if ($result_edit) {
                        header("Location: ../adm/index.php?e=eccbc87e4b5ce2fe28308fd9f2a7baf3"); // ALERT : SUCESSO
                        exit();
                    } else {
                        header("Location: ../adm/index.php?e=erro_ao_editar "); // ALERT : ERRO
                        exit();
                    }

                } else {

                    header("Location: ../adm/index.php?e=a87ff679a2f3e71d9181a67b7542122c"); // ERRO : senha incorreta
                    exit();
                }
            } else {
                header("Location: ../adm/");
                exit();
            }
        } else {
            // Se a requisição não for do tipo POST, redireciona para a página inicial do administrador
            header("Location: ../adm/");
            exit();
        }
    }
} else {
    // Se não houver uma sessão de usuário ativa, redireciona para a página inicial
    header("Location: ../");
    exit();
}
