<?php
//BitSell Connection 0.1
// Copyright BitSell team
include("../includes/main.php");
if($setup == "no") {
header("location: setup");
}
else 
{
$type = $_GET[type];
$shortname = "https://bit.co.in/$_GET[shortname]/format/xml";

    $url = simplexml_load_file($shortname);
    $coin_address = $url->address;

// continue on with system 
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
<h1>BitSellATM</h1>
<br />
<form action="page2.php" method="get">
<input name=amount type="text" placeholder="Coin amount" width=50% required><br /><br /><input name=email width=50% placeholder="Email Address" required>
<input type="hidden" name="address" value="<?php echo $coin_address; ?>">
<input type="hidden" name="type" value="<?php echo $type; ?>">
<br /><br />
<input type="submit" value="Order" class="button circled scrolly">
</form>
<I><br/><br/>Please note that your amount of coins must be 0.0002 or higher else the transaction will fail.</I>

<?php
}
?>
