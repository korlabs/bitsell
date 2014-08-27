<?php
ob_start();
include("../includes/configuration.php");
if($setup == "yes") {
die("An error occurred while processing your request.");
}
else 
{
?>
<!DOCTYPE HTML>
<!--
    Helios 1.5 by HTML5 UP
    html5up.net | @n33co
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>BitSell</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet" type="text/css" />
        <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.dropotron.min.js"></script>
        <script src="js/skel.min.js"></script>
        <script src="js/skel-panels.min.js"></script>
        <script src="js/init.js"></script>
        <noscript>
            <link rel="stylesheet" href="css/skel-noscript.css" />
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="css/style-desktop.css" />
            <link rel="stylesheet" href="css/style-noscript.css" />
        </noscript>
        <!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
    </head>
    <body class="homepage">

        <!-- Header -->
            <div id="header">
                        
                <!-- Inner -->
                    <div class="inner">
                        <header>
                        
<body>
<h1 id="logo">Setup</h1><br />
<font size="3">Please enter your API key to authenticate with the BitSellATM management panel.<br/><br/>
<?
$key = $_GET[api];
if($key == "") {
?>
<form action="" method="get">
<input name="api"><br /><br /><input type="submit" class="button circled scrolly">
<?
}
else
{
$apicheck = file_get_contents("http://bitsellatm.com/api/api_key.php?key=$key");
if($apicheck=="invalid") {
echo "API Key does not belong to any account, <a href='?key='>try again</a>.";
}
else {
$file = '../includes/configuration.php';
$content = file_get_contents($file);
$content = preg_replace("/noapi/", $key, $content);
file_put_contents($file, $content);
?>
<p>
<center>
<a href="page4.php">Tap to proceed ></a>
<? 
}
}
?>
</center>
</p>
</font>
</body>
</html>
<?php
}
?>