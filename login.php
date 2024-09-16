<!doctype html>
<html class="no-js" lang="zxx">

<!-- Mirrored from preview.colorlib.com/theme/onedu/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Feb 2024 18:52:35 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | Guia Eficiente</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <script nonce="9c819d90-2292-459e-985d-82da7658ba77">
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
    <main class="login-bg">

        <div class="login-form-area">
            <div class="login-form">

                <div class="login-heading">
                    <span>Login</span>
                    <p>Faça login para acessar</p>
                </div>

                <div class="input-box">
                    <form action="scripts/login.php" method="POST">

                        <div class="single-input-fields">
                            <label>Email</label>
                            <input type="email" required name="email" placeholder="Digite seu email">
                        </div>
                        <div class="single-input-fields">
                            <label>Senha</label>
                            <input type="password" required name="senha" minlength="3" placeholder="Digite sua senha">
                        </div>

                        <a href="./" class="text-dark"><u><b>Voltar</b></u></a>

                       <!-- <div class="single-input-fields login-check">
                            <a href="cadastra.php" class="f-right">Não possui login?</a>
                        </div> -->

                </div>

                <div class="login-footer text-center">

                    <button type="submit" class="submit-btn3">Login</button></form>
                </div>
                
            </div>
           
        </div>

    </main>


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
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"85cadcdf9fd67a5c","b":1,"version":"2024.2.1","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
</body>
</body>

<!-- Mirrored from preview.colorlib.com/theme/onedu/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Feb 2024 18:52:35 GMT -->

</html>