<?php
  require_once('authorize.php');
?>
<!DOCTYPE html>
<!--[if IEMobile 7 ]>    <html class="no-js iem7"> <![endif]-->
<!--[if (gt IEMobile 7)|!(IEMobile)]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>KRATE | ADD TRACK</title>
        <meta name="description" content="">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="cleartype" content="on">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="img/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" href="img/touch/apple-touch-icon.png">

        <!-- Tile icon for Win8 (144x144 + tile color) -->
        <meta name="msapplication-TileImage" content="img/touch/apple-touch-icon-144x144-precomposed.png">
        <meta name="msapplication-TileColor" content="#222222">

        <!-- For iOS web apps. Delete if not needed. https://github.com/h5bp/mobile-boilerplate/issues/94 -->
        <!--
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="">
        -->

        <!-- This script prevents links from opening in Mobile Safari. https://gist.github.com/1042026 -->
        <!--
        <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>
        -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/screen.css">
        <link rel="stylesheet" href="fonts/font-awesome-4.0.3/css/font-awesome.min.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <?php

            /**
             * A simple, clean and secure PHP Login Script
             *
             * MINIMAL VERSION
             * (check the website / github / facebook for other versions)
             *
             * A simple PHP Login Script.
             * Uses PHP SESSIONS, modern password-hashing and salting
             * and gives the basic functions a proper login system needs.
             *
             * Please remember: this is just the minimal version of the login script, so if you need a more
             * advanced version, have a look on the github repo. there are / will be better versions, including
             * more functions and/or much more complex code / file structure. buzzwords: MVC, dependency injected,
             * one shared database connection, PDO, prepared statements, PSR-0/1/2 and documented in phpDocumentor style
             *
             * @package php-login
             * @author Panique
             * @link https://github.com/panique/php-login/
             * @license http://opensource.org/licenses/MIT MIT License
             */

            // checking for minimum PHP version
            if (version_compare(PHP_VERSION, '5.3.7', '<')) {
                exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
            } else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
                // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
                // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
                require_once("libraries/password_compatibility_library.php");
            }

            // include the configs / constants for the database connection
            require_once("connectvars.php");

            // load the login class
            require_once("classes/Login.php");

            // create a login object. when this object is created, it will do all login/logout stuff automatically
            // so this single line handles the entire login process. in consequence, you can simply ...
            $login = new Login();

            // ... ask if we are logged in here:
            if ($login->isUserLoggedIn() == true) {
                // the user is logged in. you can do whatever you want here.
                // for demonstration purposes, we simply show the "you are logged in" view.
                include("views/confirm_remove_track.php");

            } else {
                // the user is not logged in. you can do whatever you want here.
                // for demonstration purposes, we simply show the "you are not logged in" view.
                include("views/not_logged_in.php");
            }
        ?>
    
        <script src="js/vendor/zepto.min.js"></script>
        <script src="js/vendor/jquery-1.10.2.min.js"></script>
        <script src="js/helper.js"></script>
        <script src="js/jabalscript.js"></script>
        <script src="js/refresh.js"></script>
    </body>
</html>
