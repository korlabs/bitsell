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
Let's fetch your coin address.

  <script src="../api/qr-code/jsqrcode/src/grid.js"></script>
  <script src="../api/qr-code/jsqrcode/src/version.js"></script>
  <script src="../api/qr-code/jsqrcode/src/detector.js"></script>
  <script src="../api/qr-code/jsqrcode/src/formatinf.js"></script>
  <script src="../api/qr-code/jsqrcode/src/errorlevel.js"></script>
  <script src="../api/qr-code/jsqrcode/src/bitmat.js"></script>
  <script src="../api/qr-code/jsqrcode/src/datablock.js"></script>
  <script src="../api/qr-code/jsqrcode/src/bmparser.js"></script>
  <script src="../api/qr-code/jsqrcode/src/datamask.js"></script>
  <script src="../api/qr-code/jsqrcode/src/rsdecoder.js"></script>
  <script src="../api/qr-code/jsqrcode/src/gf256poly.js"></script>
  <script src="../api/qr-code/jsqrcode/src/gf256.js"></script>
  <script src="../api/qr-code/jsqrcode/src/decoder.js"></script>
  <script src="../api/qr-code/jsqrcode/src/qrcode.js"></script>
  <script src="../api/qr-code/jsqrcode/src/findpat.js"></script>
  <script src="../api/qr-code/jsqrcode/src/alignpat.js"></script>
  <script src="../api/qr-code/jsqrcode/src/databr.js"></script>
  <script src="../api/qr-code/query-string/query-string.js"></script>




  
Input your BitCoin QR code: <br/> 

  
    <center><input type="file" accept="image/*" capture="camera" id="input">
  

  <form id="result" method="get" action="page1.php">
    <fieldset>
<input type="hidden" name="type" value="<? Echo "$type"; ?>">
      <legend>If you have issues scanning the QR code, please create a shortname at bit.co.in.</legend>

      
        <label for="shortname">Address</label>
        <input name="shortname" id="shortname" >
   <br /><input type=submit class="button circled scrolly">
      

    </fieldset>
  </form>

  <div class="image-container">
    <img src="" id="image">
  </div>

    
  

  <script src="../api/qr-code/test.js"></script>
</body>
</html>
<?php
}
?>
