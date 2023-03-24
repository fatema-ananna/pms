
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="https://colorlib.com/etc/lf/Login_v12/images/icons/favicon.ico" />

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v12/vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v12/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v12/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v12/vendor/animate/animate.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v12/vendor/css-hamburgers/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v12/vendor/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v12/css/util.css">
    <link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v12/css/main.css">

    <meta name="robots" content="noindex, follow">
    <script nonce="bfe8852f-bc73-474a-bb19-e1ad4850e23c">
        (function(w, d) {
            ! function(f, g, h, i) {
                f[h] = f[h] || {};
                f[h].executed = [];
                f.zaraz = {
                    deferred: [],
                    listeners: []
                };
                f.zaraz.q = [];
                f.zaraz._f = function(j) {
                    return function() {
                        var k = Array.prototype.slice.call(arguments);
                        f.zaraz.q.push({
                            m: j,
                            a: k
                        })
                    }
                };
                for (const l of ["track", "set", "debug"]) f.zaraz[l] = f.zaraz._f(l);
                f.zaraz.init = () => {
                    var m = g.getElementsByTagName(i)[0],
                        n = g.createElement(i),
                        o = g.getElementsByTagName("title")[0];
                    o && (f[h].t = g.getElementsByTagName("title")[0].text);
                    f[h].x = Math.random();
                    f[h].w = f.screen.width;
                    f[h].h = f.screen.height;
                    f[h].j = f.innerHeight;
                    f[h].e = f.innerWidth;
                    f[h].l = f.location.href;
                    f[h].r = g.referrer;
                    f[h].k = f.screen.colorDepth;
                    f[h].n = g.characterSet;
                    f[h].o = (new Date).getTimezoneOffset();
                    if (f.dataLayer)
                        for (const s of Object.entries(Object.entries(dataLayer).reduce(((t, u) => ({
                                ...t[1],
                                ...u[1]
                            }))))) zaraz.set(s[0], s[1], {
                            scope: "page"
                        });
                    f[h].q = [];
                    for (; f.zaraz.q.length;) {
                        const v = f.zaraz.q.shift();
                        f[h].q.push(v)
                    }
                    n.defer = !0;
                    for (const w of [localStorage, sessionStorage]) Object.keys(w || {}).filter((y => y.startsWith("_zaraz_"))).forEach((x => {
                        try {
                            f[h]["z_" + x.slice(7)] = JSON.parse(w.getItem(x))
                        } catch {
                            f[h]["z_" + x.slice(7)] = w.getItem(x)
                        }
                    }));
                    n.referrerPolicy = "origin";
                    n.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(f[h])));
                    m.parentNode.insertBefore(n, m)
                };
                ["complete", "interactive"].includes(g.readyState) ? zaraz.init() : f.addEventListener("DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

<style>
    .container-login100::before {
        background: -webkit-linear-gradient(bottom, #0f1010, #656b6d) !important;
    }

    .wrap-login100 {
        width: 580px !important;
    }

    .login100-form-btn {
        width: 36% !important;
    }
</style>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image:url('frontend/slider/newjail.avif')">
            <div class="wrap-login100 p-t-190 p-b-30">

                @if(session()->has('message'))
                <p class="alert alert-danger">{{session()->get('message')}}</p>
                @endif
                <form class="login100-form validate-form" action="{{route('user.registration.store')}}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 wrap-input100 validate-input m-b-10" data-validate="name is required">
                            <input class="input100" type="text" name="first_name" placeholder="Your First Name">
                            <span class="focus-input100"></span>

                            <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <br>
                        <div class="col-md-6 wrap-input100 validate-input m-b-10" data-validate="name is required">
                            <input class="input100" type="last_name" name="last_name" placeholder="Your Last Name">
                            <span class="focus-input100"></span>

                            <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <div class="col-md-6  wrap-input100 validate-input m-b-10">
                            <input class="input100" type="text" name="address" placeholder="Your Address">
                            <span class="focus-input100"></span>

                            <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <div class="col-md-6  wrap-input100 validate-input m-b-10">
                            <input class="input100" type="text" name="number" placeholder="Your Phone Number">
                            <span class="focus-input100"></span>

                            <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <div class="col-md-6 wrap-input100 validate-input m-b-10">
                            <input class="input100" type="text" name="inmate_id" placeholder="Inmate Id">
                            <span class="focus-input100"></span>

                            <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <div class="col-md-6  wrap-input100 validate-input m-b-10">
                            <input class="input100" type="text" name="relation" placeholder="Relation With Inmate">
                            <span class="focus-input100"></span>

                            <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <div class="col-md-6  wrap-input100 validate-input m-b-10">
                            <input class="input100" type="email" name="email" placeholder="Enter Your Email">
                            <span class="focus-input100"></span>

                            <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <div class="col-md-6  wrap-input100 validate-input m-b-10">
                            <input class="input100" type="password" name="password" placeholder="Enter your password" required="passward">
                            <span class="focus-input100"></span>

                            <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <div class="container-login100-form-btn p-t-10">
                            <button class="login100-form-btn">
                                Registration
                            </button>
                        </div>
                        <div class="text-center w-full p-t-25 p-b-230">

                        </div>
                        <div class="text-center w-full">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>

    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="vendor/select2/select2.min.js"></script>

    <script src="js/main.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"79d6ef71aef8bc27","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.2.0","si":100}' crossorigin="anonymous"></script>
</body>

</html>
