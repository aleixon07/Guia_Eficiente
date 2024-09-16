<?php

session_start();

if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {

    include_once "../scripts/connection.php";

    $id_usuario_sessao = $_SESSION['id_usuario'];

    $sql_usuario = "SELECT * FROM usuario WHERE IdUsuario = '$id_usuario_sessao'";

    $result_usuario = mysqli_query($conn, $sql_usuario);

    if (mysqli_num_rows($result_usuario) == 0) {
        header("Location: ../index.php");
        exit();
    } else {
        $row_usuario = mysqli_fetch_assoc($result_usuario);
    }
} else {
    header("Location: ../index.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/icon/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="arquivo.scss">

    <title>Dashboard | Guia Eficiente</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="bi bi-lightbulb-fill"></i>
                </div>
                <div class="sidebar-brand-text ">Guia Eficiente</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="./">
                    <i class="bi bi-house-fill"></i>
                    <span>Tela Inicial</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Componentes
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="componentes.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Componentes</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="social.php">
                    <i class="bi bi-globe"></i>
                    <span>Social</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Conteúdo
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="publicacao.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Publicações</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Acessibilidade -->
                        <li class="nav-item dropdown no-arrow mx-1 row">
                            <a class="nav-link text-dark col" onclick="decreaseFontSize()" href="#" id="AcessibilidadeDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                -A
                                <!-- Counter - Acessibilidade -->
                            </a>
                            <a class="nav-link text-dark col" onclick="increaseFontSize()" href="#" id="AcessibilidadeDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                +A
                                <!-- Counter - Acessibilidade -->
                            </a>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b> Olá, <?php echo $row_usuario['Nome']; ?> </b></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="my_publicacao.php">
                                    <i class="bi bi-list mr-2 text-gray-400"></i>
                                    Minhas Publicações
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal2">
                                    <i class="bi bi-pencil-fill mr-2 text-gray-400"></i>
                                    Editar Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 text-center mb-2 text-gray-800">Seja Bem-Vindo</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 ">
                            <div class="row">
                                <h6 class="m-0 mt-2 font-weight-bold text-primary col">Lista de Usuários</h6>
                                <a class=" m-0 mr-3 btn btn-primary " href="#" data-toggle="modal" data-target="#logoutModal3">+ Adicionar Administrador</a>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Posição</th>
                                            <th>Data de Criação</th>
                                            <th>Ações</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Posição</th>
                                            <th>Data de Criação</th>
                                            <th>Ações</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php

                                        $sql_busq_usarios = "SELECT * FROM usuario";
                                        $result_busq_usuarios = mysqli_query($conn, $sql_busq_usarios);


                                        while ($row_busq_usuarios = mysqli_fetch_assoc($result_busq_usuarios)) { ?>

                                            <tr>
                                                <td><?php echo $row_busq_usuarios['Nome']; ?></td>
                                                <td><?php echo $row_busq_usuarios['Email']; ?></td>
                                                <td><?php

                                                    $nivel_verifica = $row_busq_usuarios['Nivel'];

                                                    if ($nivel_verifica == 1) {
                                                        echo 'Usuário';
                                                    } else {
                                                        echo 'Administrador';
                                                    }

                                                    ?></td>
                                                <td><?php echo $row_busq_usuarios['Data_Criacao']; ?></td>
                                                <td class="text-center">
                                                    <button onclick='AlertDeletAdm(<?php echo $row_busq_usuarios["IdUsuario"]; ?>)' class='btn rounded border  '><i class="bi bi-trash-fill"></i></button>
                                                </td>

                                            </tr>

                                        <?php } ?>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Guia Eficiente &copy; 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <script>
        function AlertDeletAdm(id) {
            Swal.fire({
                title: 'Tem certeza?',
                text: 'Você não será capaz de reverter isso!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `../scripts/delet_usuario.php?id=${id}`;
                }
            });
        }
    </script>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Sair" abaixo se estiver pronto para encerrar sua sessão atual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="../scripts/logout.php">Sair</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Perfil Modal-->
    <div class="modal fade" id="logoutModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Edição de Perfil</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../scripts/editar_perfil.php" method="POST">
                        <input name="nome" type="text" class="form-control" required placeholder="Digite seu nome" value="<?php echo $row_usuario['Nome']; ?>">
                        <input name="new_senha" type="password" class="form-control my-3" placeholder="Nova senha (opcional)">
                        <input name="atual_senha" type="password" class="form-control" required placeholder="Confirme sua senha para atual para a edição do perfil">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Adic Modal-->
    <div class="modal fade" id="logoutModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Adicionando Administrador</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../scripts/adic_adm.php" method="POST">
                        <input name="nome" type="text" class="form-control" required placeholder="Digite o nome">
                        <input name="email" type="email" class="form-control my-3" required placeholder="Digite o email">
                        <input name="senha" type="password" class="form-control mb-3" required placeholder="Digite a senha">
                        <input name="senha_conf" type="password" class="form-control" required placeholder="Confirme a senha">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>


    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <div>
        <?php if (!isset($_GET['e'])) {
        } else if ($_GET['e'] == md5(1)) {

        ?>
            <script>
                // Função para mostrar o SweetAlert
                Swal.fire({
                    title: "Sucesso!",
                    text: "Administrador adicionado com sucesso.",
                    icon: "success"

                }).then((result) => {
                    // Verifica se o usuário clicou em "OK"
                    // Muda a URL após o SweetAlert ser fechado
                    window.location.href = "./";

                });
            </script>

        <?php } else if ($_GET['e'] == md5(2)) {

        ?>
            <script>
                // Função para mostrar o SweetAlert
                Swal.fire({
                    title: "Atenção!",
                    text: "Erro ao deletar usuário",
                    icon: "error"

                }).then((result) => {
                    // Verifica se o usuário clicou em "OK"
                    // Muda a URL após o SweetAlert ser fechado
                    window.location.href = "./";

                });
            </script>

        <?php } else if ($_GET['e'] == md5(3)) {

        ?>
            <script>
                // Função para mostrar o SweetAlert
                Swal.fire({
                    title: "Concluído!",
                    text: "Sucesso ao editar perfil",
                    icon: "success"

                }).then((result) => {
                    // Verifica se o usuário clicou em "OK"
                    // Muda a URL após o SweetAlert ser fechado
                    window.location.href = "./";

                });
            </script>

        <?php } else if ($_GET['e'] == md5(4)) {

        ?>
            <script>
                // Função para mostrar o SweetAlert
                Swal.fire({
                    title: "Atenção!",
                    text: "Senha incorreta",
                    icon: "error"

                }).then((result) => {
                    // Verifica se o usuário clicou em "OK"
                    // Muda a URL após o SweetAlert ser fechado
                    window.location.href = "./";

                });
            </script>

        <?php } else if ($_GET['e'] == md5(5)) {

        ?>
            <script>
                // Função para mostrar o SweetAlert
                Swal.fire({
                    title: "Sucesso!",
                    text: "Perfil excluido com sucesso",
                    icon: "success"

                }).then((result) => {
                    // Verifica se o usuário clicou em "OK"
                    // Muda a URL após o SweetAlert ser fechado
                    window.location.href = "./";

                });
            </script>

        <?php } else if ($_GET['e'] == md5(6)) {

        ?>
            <script>
                // Função para mostrar o SweetAlert
                Swal.fire({
                    title: "Atenção!",
                    text: "Esse email já existe",
                    icon: "error"

                }).then((result) => {
                    // Verifica se o usuário clicou em "OK"
                    // Muda a URL após o SweetAlert ser fechado
                    window.location.href = "./";

                });
            </script>

        <?php } ?>
    </div>


    <script>
        // Função para aumentar o tamanho da fonte
        function increaseFontSize() {
            var currentFontSize = parseInt(window.getComputedStyle(document.body).fontSize);
            document.body.style.fontSize = (currentFontSize + 2) + 'px';
            saveFontSize(currentFontSize + 2);
        }

        // Função para diminuir o tamanho da fonte
        function decreaseFontSize() {
            var currentFontSize = parseInt(window.getComputedStyle(document.body).fontSize);
            document.body.style.fontSize = (currentFontSize - 2) + 'px';
            saveFontSize(currentFontSize - 2);
        }

        // Função para salvar o tamanho da fonte na sessionStorage
        function saveFontSize(fontSize) {
            sessionStorage.setItem('fontSize', fontSize);
        }

        // Verifica se há um tamanho de fonte salvo na sessionStorage e aplica-o
        window.onload = function() {
            var savedFontSize = sessionStorage.getItem('fontSize');
            if (savedFontSize) {
                document.body.style.fontSize = savedFontSize + 'px';
            }
        };
    </script>
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>


</body>

</html>