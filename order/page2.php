<?php
//BitSell Connection 0.1
// Copyright BitSell team
include("../includes/main.php");
if($setup == "no") {
header("location: setup");
}
else 
{
// echo 
$type = $_GET[type];
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
Please confirm your total:<br /><br />



<?
$coin_address = $_GET[address];
$email = $_GET[email];
$amount = $_GET[amount];
$price = file_get_contents("https://bleutrade.com/api/v1/calculator?from_coin=$type&value=$amount&to_coin=USD"); // Convert BitCoin to USD
$price_rounded = round($price, 2); // Round price to 2 decimal places
$price_rounded_with_fees = $transaction_fee+$price_rounded; // Add up, with operators fees
echo "
<u>Your e-Receipt</u><br/>
Item: <i>$amount</i><br/>
Sub-total: $price_rounded USD<br/>
Fees: $transaction_fee USD<br/>
Total: $price_rounded_with_fees USD
";



echo "

<br/>
<a href='page3.php?address=$coin_address&pay=$price_rounded&coins=$amount&email=$email&type=$type'>Pay Now</a>";





}
?>