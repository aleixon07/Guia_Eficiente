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
            if (isset($_POST["titulo"]) && isset($_POST["conteudo"]) && isset($_POST["edit"])) {

                // Obtém os valores dos campos do formulário
                $titulo = $_POST["titulo"];
                $conteudo = $_POST["conteudo"];
                $id_edit = $_POST["edit"];
                $video = $_POST["video"];
                


                $imagem = $_FILES['imagem'];
                $nomeimagem = "fotos/" . uniqid() . "_" . $_FILES["imagem"]["name"];
                $nome_imagem = $imagem["name"];
      


                    $sql1 = "SELECT * FROM publicacao WHERE IdPublicacao = '$id_edit'";
                    $result1 = $conn->query($sql1);
                    $row1 = $result1->fetch_assoc();
                    $caminho_imagem = $row1["Foto"];
                
                
                    if(isset($caminho_imagem) && !empty($nome_imagem)){
                
                        $caminhoArquivo = "../$caminho_imagem";
                        
                        if (file_exists($caminhoArquivo)) {
                            if (unlink($caminhoArquivo)) {
                                echo 'Arquivo de foto excluído com sucesso.';
                            } else {
                                echo 'Erro ao excluir o arquivo de foto.';
                            }
                        } else {
                            echo 'O arquivo de foto não existe.';
                        }
                    }    
                    
                    if(!empty($nome_imagem)){                        

                        $diretorioDestino = "../";
                        $tipo = $imagem["type"];
                        $tamanho = $imagem["size"];
                        $tmp_name = $imagem["tmp_name"];
                        
                        $caminhoDestino = $diretorioDestino .$nomeimagem;
                        if (move_uploaded_file($tmp_name, $caminhoDestino)) {
                                echo "Imagem enviada com sucesso!";
                            } else {
                                echo "Erro ao enviar a imagem.";
                            }

                
                        $sql2 = "UPDATE publicacao SET 
                                        Titulo = '$titulo',
                                        Conteudo = '$conteudo',
                                        Foto_Principal = '$nomeimagem',
                                        Video = '$video',
                                        IdUsuario = '$id_usuario_sessao'
                                        WHERE  IdPublicacao = '$id_edit' ";
                        $result2 = mysqli_query($conn, $sql2); 
                                               
                    
                    }else if(empty($nome_imagem)){
                        
                        $sql2 = "UPDATE publicacao SET 
                                        Titulo = '$titulo',
                                        Conteudo = '$conteudo',
                                        Foto_Principal = '$caminho_imagem',
                                        Video = '$video',
                                        IdUsuario = '$id_usuario_sessao'
                                        WHERE  IdPublicacao = '$id_edit' ";
                        $result2 = mysqli_query($conn, $sql2); 
                    }
                    
                    if ($result2 === TRUE) {
                        
                        $succ = md5(2);
                        header("location: ../adm/publicacao.php?e=$succ"); // Alert SUCESSO (2)
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
