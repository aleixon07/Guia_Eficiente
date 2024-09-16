<?php

session_start();

session_destroy();

session_start();

include_once "connection.php";

if (isset($_POST['email']) && isset($_POST['senha'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (empty($email)) {

        header("Location: ../login.php?error=Preencha seu e-mail!");
        exit();
    } else {

        if (empty($senha)) {
            header("Location: ../login.php?error=Preencha sua senha!");
            exit();

        } else {

            $sql = "SELECT * from usuario where Email = '$email' LIMIT 1";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if (mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);

                    if ($row['Email'] === $email && password_verify($senha, $row['Senha'])) {
                        $_SESSION['id_usuario'] = $row['IdUsuario'];

                        
                        header("Location: ../adm/index.php");
                        
                        exit();

                    } else {
                        header("Location: ../login.php?error=Senha incorreta!");
                        exit();
                    }
                } else {
                    header("Location: ../login.php?error=Algo deu errado. Tente novamente!");
                    exit();
                }
            } else {
                header("Location: ../login.php?error=Usuário não encontrado!");
                exit();
            }
        }
    }
} else {
    echo "Não existe post!";
    header("Location: ../dashboard_/listagem_cachorro.php");
    exit();
}
