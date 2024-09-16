<?php
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
        // Verifica se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se todos os campos necessários estão presentes
            if (isset($_POST["titulo"]) && isset($_POST["conteudo"])) {

                // Obtém os valores dos campos do formulário
                $titulo = $_POST["titulo"];
                $conteudo = $_POST["conteudo"];
                $data = date("y-m-d");
                
                if(empty($_POST['video'])){
                    $video = NULL;
                }else{
                    $video = $_POST["video"];
                }


                // Processa o upload da imagem
                $imagem = "";
                if ($_FILES["imagem"]["name"]) {
                    $imagem = "fotos/" . uniqid() . "_" . $_FILES["imagem"]["name"];
                    move_uploaded_file($_FILES["imagem"]["tmp_name"], "../" . $imagem);
                }

                // Insere os dados no banco de dados
                $sql = "INSERT INTO publicacao (Titulo, Conteudo, Foto_Principal, Data_Publicacao, Video, IdUsuario) VALUES ('$titulo', '$conteudo', '$imagem', '$data','$video','$id_usuario_sessao')";

                if ($conn->query($sql) === TRUE) {
                    $succ = md5(1);
                    header("location: ../adm/publicacao.php?e=$succ");
                    exit();
                } else {
                    echo "Erro ao inserir registro: " . $conn->error;
                }

                $conn->close();
            } else {
                echo "Todos os campos são obrigatórios.";
            }
        }
    }
} else {
    // Se não houver uma sessão de usuário ativa, redireciona para a página inicial
    header("Location: ../index.php");
    exit();
}
