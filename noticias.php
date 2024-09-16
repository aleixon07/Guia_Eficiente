<?php

session_start();
include_once "scripts/connection.php";

?>
<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from preview.colorlib.com/theme/onedu/courses.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Feb 2024 18:52:26 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Publicações | Guia Eficiente</title>
    <meta name="description" content>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icon/favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script nonce="df538c30-f99b-4381-ab4e-44e4a59c3a4d">
        try {
            (function(w, d) {
                ! function(ct, cu, cv, cw) {
                    ct[cv] = ct[cv] || {};
                    ct[cv].executed = [];
                    ct.zaraz = {
                        deferred: [],
                        listeners: []
                    };
                    ct.zaraz.q = [];
                    ct.zaraz._f = function(cx) {
                        return async function() {
                            var cy = Array.prototype.slice.call(arguments);
                            ct.zaraz.q.push({
                                m: cx,
                                a: cy
                            })
                        }
                    };
                    for (const cz of ["track", "set", "debug"]) ct.zaraz[cz] = ct.zaraz._f(cz);
                    ct.zaraz.init = () => {
                        var cA = cu.getElementsByTagName(cw)[0],
                            cB = cu.createElement(cw),
                            cC = cu.getElementsByTagName("title")[0];
                        cC && (ct[cv].t = cu.getElementsByTagName("title")[0].text);
                        ct[cv].x = Math.random();
                        ct[cv].w = ct.screen.width;
                        ct[cv].h = ct.screen.height;
                        ct[cv].j = ct.innerHeight;
                        ct[cv].e = ct.innerWidth;
                        ct[cv].l = ct.location.href;
                        ct[cv].r = cu.referrer;
                        ct[cv].k = ct.screen.colorDepth;
                        ct[cv].n = cu.characterSet;
                        ct[cv].o = (new Date).getTimezoneOffset();
                        if (ct.dataLayer)
                            for (const cG of Object.entries(Object.entries(dataLayer).reduce(((cH, cI) => ({
                                    ...cH[1],
                                    ...cI[1]
                                })), {}))) zaraz.set(cG[0], cG[1], {
                                scope: "page"
                            });
                        ct[cv].q = [];
                        for (; ct.zaraz.q.length;) {
                            const cJ = ct.zaraz.q.shift();
                            ct[cv].q.push(cJ)
                        }
                        cB.defer = !0;
                        for (const cK of [localStorage, sessionStorage]) Object.keys(cK || {}).filter((cM => cM.startsWith("_zaraz_"))).forEach((cL => {
                            try {
                                ct[cv]["z_" + cL.slice(7)] = JSON.parse(cK.getItem(cL))
                            } catch {
                                ct[cv]["z_" + cL.slice(7)] = cK.getItem(cL)
                            }
                        }));
                        cB.referrerPolicy = "origin";
                        cB.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(ct[cv])));
                        cA.parentNode.insertBefore(cB, cA)
                    };
                    ["complete", "interactive"].includes(cu.readyState) ? zaraz.init() : ct.addEventListener("DOMContentLoaded", zaraz.init)
                }(w, d, "zarazData", "script");
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>

</head>

<body>
    <header>
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper d-flex align-items-center justify-content-between">
                        <div class="left-content d-flex align-items-center">
                            <div class="logo">
                                <a href="./"><img class="foto_logo_cabecalho" src="assets/img/logo/logo.png" alt></a>
                            </div>


                        </div>

                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="./">Início</a></li>
                                    <li><a href="./#descubra">Descubra</a></li>
                                    <li><a href="noticias.php">Publicações</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>


        <section class="popular-directorya-area section-padding fix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="section-tittle text-center mb-40">
                            <h2>Veja todas as nossas publicações</h2>
                        </div>
                    </div>
                </div>

                <?php
                if (!empty($_GET["p"]) && isset($_GET["p"])) {
                    $p = $_GET['p']; ?>

                    <div class="row">
                        <?php
                        $itens_por_pagina = 20;
                        $pagina_atual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

                        $sql_total_publicacoes = "SELECT COUNT(*) AS total FROM publicacao WHERE LOWER(Titulo) LIKE LOWER('%$p%')";
                        $result_total_publicacoes = mysqli_query($conn, $sql_total_publicacoes);
                        $total_publicacoes = mysqli_fetch_assoc($result_total_publicacoes)['total'];
                        $total_paginas = ceil($total_publicacoes / $itens_por_pagina);

                        $inicio = ($pagina_atual - 1) * $itens_por_pagina;

                        $sql_busc_publicacoes = "SELECT * FROM publicacao WHERE LOWER(Titulo) LIKE LOWER('%$p%') LIMIT $inicio, $itens_por_pagina";
                        $result_busc_publicacoes = mysqli_query($conn, $sql_busc_publicacoes);

                        while ($row_busc_publicacao = mysqli_fetch_assoc($result_busc_publicacoes)) { ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <div class="properties pb-30">
                                    <div class="properties-card">
                                        <div class="properties-img overlay1">
                                            <a href="blog_details.php?publi=<?php echo $row_busc_publicacao['IdPublicacao']; ?>">
                                                <img class="img_principal2" src="<?php
                                                                                    $foto_publi = $row_busc_publicacao['Foto_Principal'];
                                                                                    if (empty($foto_publi)) {
                                                                                        echo 'fotos/fundo.png';
                                                                                    } else {
                                                                                        echo $foto_publi;
                                                                                    }
                                                                                    ?>">
                                            </a>
                                        </div>
                                        <div class="properties-caption">
                                            <h3>
                                                <a href="blog_details.php?publi=<?php echo $row_busc_publicacao['IdPublicacao']; ?>"><?php echo $row_busc_publicacao["Titulo"]; ?></a>
                                            </h3>
                                            <p>
                                                <?php
                                                $id_busc_publi = $row_busc_publicacao["IdUsuario"];
                                                $sql_id_publi = "SELECT * FROM usuario WHERE IdUsuario = '$id_busc_publi'";
                                                $resutl_id_publi = mysqli_query($conn, $sql_id_publi);
                                                $row_id_publi = mysqli_fetch_assoc($resutl_id_publi);
                                                echo $nome_autor = $row_id_publi["Nome"];
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }

                        if (mysqli_num_rows($result_busc_publicacoes) == 0) {
                            echo "<h5 class = 'text-center'><em>Não foram encontrados resultados dessa busca</em></h5>";
                        }
                        ?>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <?php if ($pagina_atual > 1) : ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?p=<?php echo $p; ?>&pagina=1" aria-label="Primeira">
                                                <span aria-hidden="true">&laquo;&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="?p=<?php echo $p; ?>&pagina=<?php echo max($pagina_atual - 1, 1); ?>" aria-label="Anterior">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php
                                    if ($total_paginas <= 3 || $pagina_atual <= 2) {
                                        $pagina_fim = min(3, $total_paginas);
                                        for ($pagina = 1; $pagina <= $pagina_fim; $pagina++) {
                                            echo '<li class="page-item ';
                                            echo ($pagina == $pagina_atual) ? 'active' : '';
                                            echo '"><a class="page-link" href="?p=' . $p . '&pagina=' . $pagina . '">' . $pagina . '</a></li>';
                                        }
                                    } elseif ($pagina_atual >= $total_paginas - 1) {
                                        $pagina_inicio = max($total_paginas - 2, 1);
                                        for ($pagina = $pagina_inicio; $pagina <= $total_paginas; $pagina++) {
                                            echo '<li class="page-item ';
                                            echo ($pagina == $pagina_atual) ? 'active' : '';
                                            echo '"><a class="page-link" href="?p=' . $p . '&pagina=' . $pagina . '">' . $pagina . '</a></li>';
                                        }
                                    } else {
                                        for ($pagina = $pagina_atual - 1; $pagina <= $pagina_atual + 1; $pagina++) {
                                            echo '<li class="page-item ';
                                            echo ($pagina == $pagina_atual) ? 'active' : '';
                                            echo '"><a class="page-link" href="?p=' . $p . '&pagina=' . $pagina . '">' . $pagina . '</a></li>';
                                        }
                                    }
                                    ?>

                                    <?php if ($pagina_atual < $total_paginas) : ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?p=<?php echo $p; ?>&pagina=<?php echo min($pagina_atual + 1, $total_paginas); ?>" aria-label="Próxima">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="?p=<?php echo $p; ?>&pagina=<?php echo $total_paginas; ?>" aria-label="Última">
                                                <span aria-hidden="true">&raquo;&raquo;</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>

                <?php } else { ?>

                    <div class="row">
                        <?php
                        $itens_por_pagina = 20;
                        $pagina_atual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

                        $sql_total_publicacoes = "SELECT COUNT(*) AS total FROM publicacao";
                        $result_total_publicacoes = mysqli_query($conn, $sql_total_publicacoes);
                        $total_publicacoes = mysqli_fetch_assoc($result_total_publicacoes)['total'];
                        $total_paginas = ceil($total_publicacoes / $itens_por_pagina);

                        $inicio = ($pagina_atual - 1) * $itens_por_pagina;

                        $sql_busc_publicacoes = "SELECT * FROM publicacao LIMIT $inicio, $itens_por_pagina";
                        $result_busc_publicacoes = mysqli_query($conn, $sql_busc_publicacoes);

                        while ($row_busc_publicacao = mysqli_fetch_assoc($result_busc_publicacoes)) { ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <div class="properties pb-30">
                                    <div class="properties-card">
                                        <div class="properties-img overlay1">
                                            <a href="blog_details.php?publi=<?php echo $row_busc_publicacao['IdPublicacao']; ?>">
                                                <img class="img_principal2" src="<?php
                                                                                    $foto_publi = $row_busc_publicacao['Foto_Principal'];
                                                                                    if (empty($foto_publi)) {
                                                                                        echo 'fotos/fundo.png';
                                                                                    } else {
                                                                                        echo $foto_publi;
                                                                                    }
                                                                                    ?>">
                                            </a>
                                        </div>
                                        <div class="properties-caption">
                                            <h3>
                                                <a href="blog_details.php?publi=<?php echo $row_busc_publicacao['IdPublicacao']; ?>"><?php echo $row_busc_publicacao["Titulo"]; ?></a>
                                            </h3>
                                            <p>
                                                <?php
                                                $id_busc_publi = $row_busc_publicacao["IdUsuario"];
                                                $sql_id_publi = "SELECT * FROM usuario WHERE IdUsuario = '$id_busc_publi'";
                                                $resutl_id_publi = mysqli_query($conn, $sql_id_publi);
                                                $row_id_publi = mysqli_fetch_assoc($resutl_id_publi);
                                                echo $nome_autor = $row_id_publi["Nome"];
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <?php if ($pagina_atual > 1) : ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?pagina=1" aria-label="Primeira">
                                                <span aria-hidden="true">&laquo;&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="?pagina=<?php echo max($pagina_atual - 1, 1); ?>" aria-label="Anterior">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php
                                    if ($total_paginas <= 3 || $pagina_atual <= 2) {
                                        $pagina_fim = min(3, $total_paginas);
                                        for ($pagina = 1; $pagina <= $pagina_fim; $pagina++) {
                                            echo '<li class="page-item ';
                                            echo ($pagina == $pagina_atual) ? 'active' : '';
                                            echo '"><a class="page-link" href="?pagina=' . $pagina . '">' . $pagina . '</a></li>';
                                        }
                                    } elseif ($pagina_atual >= $total_paginas - 1) {
                                        $pagina_inicio = max($total_paginas - 2, 1);
                                        for ($pagina = $pagina_inicio; $pagina <= $total_paginas; $pagina++) {
                                            echo '<li class="page-item ';
                                            echo ($pagina == $pagina_atual) ? 'active' : '';
                                            echo '"><a class="page-link" href="?pagina=' . $pagina . '">' . $pagina . '</a></li>';
                                        }
                                    } else {
                                        for ($pagina = $pagina_atual - 1; $pagina <= $pagina_atual + 1; $pagina++) {
                                            echo '<li class="page-item ';
                                            echo ($pagina == $pagina_atual) ? 'active' : '';
                                            echo '"><a class="page-link" href="?pagina=' . $pagina . '">' . $pagina . '</a></li>';
                                        }
                                    }
                                    ?>

                                    <?php if ($pagina_atual < $total_paginas) : ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?pagina=<?php echo min($pagina_atual + 1, $total_paginas); ?>" aria-label="Próxima">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="?pagina=<?php echo $total_paginas; ?>" aria-label="Última">
                                                <span aria-hidden="true">&raquo;&raquo;</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                <?php }
                ?>





            </div>
        </section>



    </main>
    <footer id="footer_area_rodape">
        <div class="footer-area footer-padding">
            <div class="footer-wrapper ">
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">

                                    <div class="footer-logo mb-25">
                                        <a class="link_rodape" href="./"><i class="bi bi-lightbulb-fill"></i> Guia Eficiente</a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p>
                                                <strong>“Não basta que todos sejam iguais perante a lei. É preciso que a lei seja igual perante todos.”</strong>
                                            </p>
                                            <p class="text-end">— <em>Salvador Allende</em></p>
                                        </div>
                                    </div>

                                    <div class="footer-social">
                                        <?php
                                        $row_social = "SELECT * FROM social";
                                        $result_social = mysqli_query($conn, $row_social);

                                        while ($row_social = mysqli_fetch_assoc($result_social)) { ?>

                                            <a href="<?php echo $row_social['Link']; ?>"><i class="<?php
                                                                                                    $tipo = $row_social["Tipo"];
                                                                                                    if ($tipo == 'instagram') {
                                                                                                        // Código a ser executado se o valor for 'instagram'
                                                                                                        echo "bi bi-instagram";
                                                                                                    } else if ($tipo == 'facebook') {
                                                                                                        // Código a ser executado se o valor for 'facebook'
                                                                                                        echo "bi bi-facebook";
                                                                                                    } else if ($tipo == 'twitter') {
                                                                                                        // Código a ser executado se o valor for 'twitter'
                                                                                                        echo "bi bi-twitter-x";
                                                                                                    } else if ($tipo == 'youtube') {
                                                                                                        // Código a ser executado se o valor for 'youtube'
                                                                                                        echo "bi bi-youtube";
                                                                                                    } else if ($tipo == 'pinterest') {
                                                                                                        // Código a ser executado se o valor for 'pinterest'
                                                                                                        echo "bi bi-pinterest";
                                                                                                    } else if ($tipo == 'google') {
                                                                                                        // Código a ser executado se o valor for 'google'
                                                                                                        echo "bi bi-google";
                                                                                                    } else if ($tipo == 'discord') {
                                                                                                        // Código a ser executado se o valor for 'discord'
                                                                                                        echo "bi bi-discord";
                                                                                                    } else {
                                                                                                        // Código a ser executado se nenhum dos valores corresponder
                                                                                                    }

                                                                                                    ?>"></i></a>

                                        <?php } ?>


                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Cabeçalho</h4>
                                    <ul>
                                        <li><a href="./">Início</a></li>
                                        <li><a href="./#descubra">Descubra</a></li>
                                        <li><a href="./noticias.php">Notícias</a></li>
                                        <li><a href="./login.php">Acesso Restrito</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <img class="img-div" src="assets/img/unipampa.png" alt="unipampa">
                                    <img class="img-div mt-5" src="assets/img/ppgcic.png" alt="ppgcic">
                                    <img class="img-div mt-5" src="assets/img/texto.png" alt="ppgcic">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </footer>

    <div id="back-top">
        <a class="wrapper" title="Go to Top" href="#">
            <div class="arrows-container">
                <div class="arrow arrow-one">
                </div>
                <div class="arrow arrow-two">
                </div>
            </div>
        </a>
    </div>


    <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>

    <script src="assets/js/contact.js"></script>
    <script src="assets/js/jquery.form.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/mail-script.js"></script>
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>

    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"85cadcd7bf787a5c","b":1,"version":"2024.2.1","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/onedu/courses.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Feb 2024 18:52:26 GMT -->

</html>