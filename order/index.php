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
  <form id="result" method="get" action="page1.php">
    <fieldset>
<input type="hidden" name="type" value="<? Echo "$type"; ?>">
      <legend>Please create a shortname at bit.co.in.</legend>

      
        <label for="shortname">Shortname</label>
        <input name="shortname" id="shortname" >
   <br /><input type=submit class="button circled scrolly">
      

    </fieldset>
  </form>


</body>
</html>
<?php
}
?>
