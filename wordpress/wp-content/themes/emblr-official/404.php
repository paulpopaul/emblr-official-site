<?php get_header() ?>

<!-- Contenido página 404 aquí -->

    <style>

        /* ===================================================================
         * # pagina 404
         *
         * ------------------------------------------------------------------- */

        #notfound {
            position: relative;
            height: 100vh;
        }

        #notfound .notfound {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        #notfound .notfound-bg {
            background: black;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            overflow: hidden;
        }

        #notfound .notfound-bg>div {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 1px;
            background-color: #1D1D1D;
            opacity:0.7;
        }

        #notfound .notfound-bg>div:nth-child(1) {
            left: 20%;
        }

        #notfound .notfound-bg>div:nth-child(2) {
            left: 40%
        }

        #notfound .notfound-bg>div:nth-child(3) {
            left: 60%
        }

        #notfound .notfound-bg>div:nth-child(4) {
            left: 80%
        }

        #notfound .notfound-bg>div:after {
            content: '';
            position: absolute;
            top: 0px;
            left: -0.5px;
            -webkit-transform: translateY(-160px);
            -ms-transform: translateY(-160px);
            transform: translateY(-160px);
            height: 160px;
            width: 2px;
            background-color: #1FBDA2;
        }

        @-webkit-keyframes drop {
            90% {
                height: 20px;
            }
            100% {
                height: 160px;
                -webkit-transform: translateY(calc(100vh + 160px));
                transform: translateY(calc(100vh + 160px));
            }
        }

        @keyframes drop {
            90% {
                height: 20px;
            }
            100% {
                height: 160px;
                -webkit-transform: translateY(calc(100vh + 160px));
                transform: translateY(calc(100vh + 160px));
            }
        }

        #notfound .notfound-bg>div:nth-child(1):after {
            -webkit-animation: drop 3s infinite linear;
            animation: drop 3s infinite linear;
            -webkit-animation-delay: 0.2s;
            animation-delay: 0.2s;
        }

        #notfound .notfound-bg>div:nth-child(2):after {
            -webkit-animation: drop 2s infinite linear;
            animation: drop 2s infinite linear;
            -webkit-animation-delay: 0.7s;
            animation-delay: 0.7s;
        }

        #notfound .notfound-bg>div:nth-child(3):after {
            -webkit-animation: drop 3s infinite linear;
            animation: drop 3s infinite linear;
            -webkit-animation-delay: 0.9s;
            animation-delay: 0.9s;
        }

        #notfound .notfound-bg>div:nth-child(4):after {
            -webkit-animation: drop 2s infinite linear;
            animation: drop 2s infinite linear;
            -webkit-animation-delay: 1.2s;
            animation-delay: 1.2s;
        }

        .notfound {
            max-width: 520px;
            width: 100%;
            text-align: center;
        }

        .notfound .notfound-404 {
            height: 210px;
            line-height: 210px;
        }

        .notfound .notfound-404 h1 {
            font-family: Nunito Sans, sans-serif;
            font-size: 200px;
            font-weight: 700;
            margin: 0px;
            color: #A4A4A4;
        }

        .notfound h2 {
            font-family:"Bold Regular";
            font-size: 40px;
            font-weight: 700;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 1.6px;
            color: #1FBDA2;
            margin-top: 6px;
        }

        .notfound .notfoundtext{
            width: 380px;
            justify-content: center;
            text-align: center;
            margin: 0 auto;
        }

        .notfound p {
            font-family: Nunito Sans, sans-serif;
            color: #A4A4A4;
            font-weight: 400;
            font-size: 18px;
            margin-top: 0px;
            margin-bottom: 22px;
        }

        .notfound a {
            font-family: Nunito Sans, sans-serif;
            padding:  10px 24px;
            display: inline-block;
            color: #A4A4A4;
            font-weight: 800;
            text-transform: uppercase;
            border-radius:50px ;
            text-decoration: none;
            -webkit-transition: 0.2s all;
            transition: 0.2s all;
            border:2px solid #1FBDA2;

        }

        .notfound a:hover {
            background-color: #1FBDA2;
            color: #000;
        }

        .notfound-social {
            margin-top: 18px;
        }

        .notfound-social>a {
            width: 40px;
            height: 40px;
            line-height: 40px;
            padding: 0;
            margin: 0;

            color: #1FBDA2;
            border:none;


        }

        .notfound-social>a:hover {
            background-color: none;
            color: #000;

        }

        @media only screen and (max-width: 480px) {

            .notfound .notfoundtext{
                width: 89%;
                padding-bottom: 8px;
            }

            .notfound .notfound-404 {
                height: 122px;
                line-height: 122px;
            }
            .notfound .notfound-404 h1 {
                font-size: 122px;
            }
            .notfound h2 {
                font-size: 22px;
                margin-top:26px;
                margin-bottom: 16px;
            }
            .notfound p {
                font-size: 17px;
            }
            .notfound a {
                font-size: 16px;
            }

            .notfound-social {
                margin-top: 48px;
            }

        @media only screen and (max-width: 375px) {

            .notfound .notfoundtext{
                width: 89%;
                padding-bottom: 8px;
            }

            .notfound .notfound-404 {
                height: 122px;
                line-height: 122px;
            }
            .notfound .notfound-404 h1 {
                font-size: 108px;
            }
            .notfound h2 {
                font-size: 22px;
                margin-top:12px;
                margin-bottom: 16px;
            }
            .notfound p {
                font-size: 16px;
            }
            .notfound a {
                font-size: 14px;
            }

            .notfound-social {
                margin-top: 36px;
            }

        @media only screen and (max-width: 320px) {

            .notfound .notfoundtext{
                width: 100%;
            }

            .notfound .notfound-404 h1 {
                font-size: 100px;
            }
            .notfound h2 {
                font-size: 20px;
                margin-bottom: 16px;
            }
            .notfound-social {
                margin-top: 38px;
            }
    </style>

    <div id="notfound">
        <div class="notfound-bg">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="notfound">
            <div class="notfound-404">
                <h1>404</h1>
            </div>
            <h2>PAGINA NO ENCONTRADA</h2>
            <div class="notfoundtext">
            <p>La página que busca podría haberse eliminado o no está disponible temporalmente</p>
            </div>
            <a class="pag-inicio" href="#">PAGINA DE INICIO</a>
            <div class="notfound-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </div>

<?php get_footer() ?>