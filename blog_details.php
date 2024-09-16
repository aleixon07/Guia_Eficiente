<?php

session_start();
include_once "scripts/connection.php";

if (!isset($_GET['publi']) && empty($_GET['publi'])) {

  header("location: ./");
  exit();
} else {

  $id_busc_existe_publicacao = $_GET['publi'];

  $sql_busc_existe_publicacao = "SELECT * FROM publicacao WHERE IdPublicacao = '$id_busc_existe_publicacao' LIMIT 1";
  $result_busc_existe_publicacao = mysqli_query($conn, $sql_busc_existe_publicacao);

  if (mysqli_num_rows($result_busc_existe_publicacao) == 0) {
    header("location: ./");
    exit();
  }

  $row = mysqli_fetch_assoc($result_busc_existe_publicacao);
}
?>
<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from preview.colorlib.com/theme/onedu/blog_details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Feb 2024 18:52:29 GMT -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Publicação | Guia Eficiente</title>
  <meta name="description" content>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/icon/favicon.png">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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

  <script nonce="3b1b261b-b5ed-418a-8fb9-25e4c78f6586">
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



    <section class="blog_area single-post-area section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 posts-list">
            <div class="single-post">
              <div class="feature-img">
                <img class="img-fluid img_publi" src="<?php
                                                      $foto_publi = $row['Foto_Principal'];

                                                      if (empty($foto_publi)) {
                                                        echo 'fotos/fundo.png';
                                                      } else {
                                                        echo $foto_publi;
                                                      }
                                                      ?>" alt="Foto da Publicação" />
              </div>

              <div class="blog_details" id="conteudo">
                <h2 style="color: #2d2d2d;"><?php echo $row['Titulo']; ?>
                </h2>
                <ul class="blog-info-link mt-3 mb-4 nome_autor">
                  <li id="nome_autor"><i class="fa fa-user"></i><?php $id_autor = $row['IdUsuario'];
                                                                $sql_autor = "SELECT * FROM usuario WHERE IdUsuario = '$id_autor'";
                                                                $resultado_autor = mysqli_query($conn, $sql_autor);
                                                                $linha_autor = mysqli_fetch_assoc($resultado_autor);
                                                                echo $nome_autor = $linha_autor['Nome'];
                                                                ?></li>

                  <button class="button-play-audio" onclick="lerConteudo()"><i class="bi bi-play-fill"></i></button>
                  <button class="button-play-audio" onclick="pausarContinuar()"><i class="bi bi-pause-fill"></i></button>


                </ul>
                <p>
                  <?php echo $row['Conteudo']; ?>
                </p>
              </div>
            </div>

            <?php
            $video = $row['Video'];

            if (!empty($video)) {
            ?>
              <div class="navigation-top ">
                
                  <?php echo $video; ?>
               
                
              </div>
            <?php } ?>



          </div>
          <div class="col-lg-4">
            <div class="blog_right_sidebar">

              <aside id='asite_new_post' class="single_sidebar_widget popular_post_widget">
                <h3 class="widget_title" style="color: #2d2d2d;">Publicações Recentes</h3>
                <?php
                $sql_busc_new_publi = "SELECT * FROM publicacao WHERE IdPublicacao != $id_busc_existe_publicacao ORDER BY `publicacao`.`IdPublicacao` DESC LIMIT 5";
                $result_busc_new_publi = mysqli_query($conn, $sql_busc_new_publi);

                while ($row_busc_new_publi = mysqli_fetch_assoc($result_busc_new_publi)) {  ?>
                  <div class="media post_item">
                    <img class="img_next" src="<?php $foto_new = $row_busc_new_publi['Foto_Principal'];
                                                if (empty($foto_new)) {
                                                  echo 'fotos/fundo.png';
                                                } else {
                                                  echo $foto_new;
                                                }
                                                ?>" alt="post">
                    <div class="media-body">
                      <a href="blog_details.php?publi=<?php echo $row_busc_new_publi["IdPublicacao"]; ?>">
                        <h3 style="color: #2d2d2d;"><?php echo $row_busc_new_publi["Titulo"]; ?></h3>
                      </a>
                      <p><?php
                          $id_autor_next = $row_busc_new_publi['IdUsuario'];
                          $sql_autor_next = "SELECT * FROM usuario WHERE IdUsuario = '$id_autor_next' LIMIT 1";
                          $result_autor_next = mysqli_query($conn, $sql_autor_next);
                          $row_autor_next = mysqli_fetch_assoc($result_autor_next);
                          echo $name_autor_next = $row_autor_next['Nome'];
                          ?></p>
                    </div>
                  </div>
                <?php } ?>

              </aside>

            </div>
          </div>
        </div>
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

  <script>
    if (sessionStorage.getItem('corFundo') === '2a2a2a') {
      mudarCor();
    }

    function mudarCor() {
      var body = document.querySelector('body');
      var header = document.querySelector('header');
      var stickyHeader = document.querySelector('.header-sticky.sticky-bar');
      var paragrafos = document.querySelectorAll('p');
      var h2s = document.querySelectorAll('h2');
      var nomeAutor = document.getElementById('nome_autor');
      var links = document.querySelectorAll('a');
      var siteNewPost = document.getElementById('asite_new_post');

      if (body.style.backgroundColor === 'rgb(255, 255, 255)') {
        body.style.backgroundColor = '#2a2a2a';
        sessionStorage.setItem('corFundo', '#2a2a2a');

        header.style.backgroundColor = '#424141';
        stickyHeader.style.backgroundColor = '#424141';

        paragrafos.forEach(function(paragrafo) {
          paragrafo.style.color = '#FFF';
        });

        h2s.forEach(function(h2) {
          h2.style.color = '#FFF';
        });

        nomeAutor.style.color = '#FFF';

        links.forEach(function(link) {
          link.style.color = '#FFF';
        });

        siteNewPost.style.color = '#444444';

        stickyHeader.style.backgroundColor = body.style.backgroundColor;
      } else {
        body.style.backgroundColor = '#FFF';
        sessionStorage.setItem('corFundo', '#FFF');

        header.style.backgroundColor = '#EFEFEF';
        stickyHeader.style.backgroundColor = '#fff'; // Cor para o header sticky

        paragrafos.forEach(function(paragrafo) {
          paragrafo.style.color = '#000';
        });

        h2s.forEach(function(h2) {
          h2.style.color = '#000';
        });

        nomeAutor.style.color = '#000';

        links.forEach(function(link) {
          link.style.color = '#000';
        });

        siteNewPost.style.color = '#444444';

        stickyHeader.style.backgroundColor = body.style.backgroundColor;
      }
    }
  </script>
  <script>
    var speech;
    var paused = false;

    // Função para iniciar a leitura do conteúdo da div
    function lerConteudo() {
      // Verifica se já há uma leitura em andamento
      if (speech && speech.paused) {
        // Se já estiver pausado, retoma a leitura
        speech.resume();
      } else {
        // Obtém o conteúdo da div
        var conteudoDiv = document.getElementById('conteudo').innerText;

        // Cria um objeto de fala
        speech = new SpeechSynthesisUtterance();

        // Define o texto a ser falado
        speech.text = conteudoDiv;

        // Faz o navegador falar o texto
        window.speechSynthesis.speak(speech);
      }
    }

    // Função para pausar ou continuar a leitura
    function pausarContinuar() {
      // Verifica se há uma leitura em andamento
      if (speech) {
        // Se não estiver pausado, pausa a leitura
        if (!paused) {
          window.speechSynthesis.pause();
          paused = true;
        } else {
          // Se estiver pausado, retoma a leitura
          window.speechSynthesis.resume();
          paused = false;
        }
      }
    }
  </script>


  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"85cadcdbbacd645b","b":1,"version":"2024.2.1","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
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

<!-- Mirrored from preview.colorlib.com/theme/onedu/blog_details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Feb 2024 18:52:30 GMT -->

</html>