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

        // Verifica se a requisição é do tipo POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['senha_conf']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['senha_conf'])) {
        
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $senha = $_POST["senha"];
                $senha_c = $_POST["senha"];

                if($senha !=  $senha_c){
                    header("Location: ../adm/index.php?e=a87ff679a2f3e71d9181a67b7542122c"); // erro  (ERRO senhas Diferentes)
                    exit();
                }
                $nivel = "2";    
        
                    $sql_email = "SELECT * FROM usuario WHERE Email = '$email'";
                    $result_email = mysqli_query($conn, $sql_email);
        
                    if (mysqli_num_rows($result_email) > 0) {
        
                        header("Location: ../adm/index.php?e=1679091c5a880faf6fb5e6087eb1b2dc");
                        exit();
                    }
                    $data= date('y-m-d');
                    $senha2 = password_hash($senha, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO usuario (Nome, Senha, Email, Nivel, Data_Criacao) VALUES ('$nome', '$senha2' , '$email', '$nivel', '$data')";
        
                    if ($conn->query($sql)) {
                
                        header("Location: ../adm/index.php?e=c4ca4238a0b923820dcc509a6f75849b");
                        exit();

                    } else {
                        echo "erro ao cadastar usuasrio = " . $conn->error;
                    }
                
            } else {
                header("Location: ../adm/");
                exit();
            }
        } else {
            header("Location: ../adm/");
            exit();
        }
        
    }
} else {
    // Se não houver uma sessão de usuário ativa, redireciona para a página inicial
    header("Location: ../index.php");
    exit();
}
