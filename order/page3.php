<?php

//BitSell Connection 0.1

// Copyright BitSell team

include("../includes/main.php");
include("../includes/configuration.php");
if($setup == "no")
 {
header("location: setup");
}

else 
{
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

Please proceed to pay.



<?
$type = $_GET[type];
$coin_address = $_GET[address];
$rand = rand(1882,2099);
$pay = $_GET[pay];
$coins = $_GET[coins];

$email = $_GET[email];

echo "<br/>Your order:
<br/>
$coins $type's ";


echo " = $$pay USD</b>
";

?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<? echo $paypal_address; ?>">
<input type="hidden" name="quantity" value="1">
<input type="hidden" name="item_name" value="<?php echo "$coin_address"; ?> ">
<input type="hidden" name="notify_url" value="http://<?php echo $address; ?>bitsellatm/api/paypal/ipn.php">
<input type="hidden" name="item_number" value="<?php echo $rand; ?>">
<input type="hidden" name="amount" value="<?php echo $pay; ?>">
<input type="hidden" name="return" value="http://<? echo "$address/bitsellatm/order/page4.php?coins=$coins&money=$pay&coin_address=$coin_address&type=$type";  ?>">
<br/><input type="image" src="https://www.paypalobjects.com/webstatic/en_US/btn/btn_buynow_pp_142x27.png" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>

<br/><br/>
<?





}


?>
