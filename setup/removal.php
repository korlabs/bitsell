<!DOCTYPE HTML>
<!--
    Helios 1.5 by HTML5 UP
    html5up.net | @n33co
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>BitSell-Setup Removal</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600" rel="stylesheet" type="text/css" />
        <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/jquery.dropotron.min.js"></script>
        <script src="../js/skel.min.js"></script>
        <script src="../js/skel-panels.min.js"></script>
        <script src="../js/init.js"></script>
        <noscript>
            <link rel="stylesheet" href="../css/skel-noscript.css" />
            <link rel="stylesheet" href="../css/style.css" />
            <link rel="stylesheet" href="../css/style-desktop.css" />
            <link rel="stylesheet" href="../css/style-noscript.css" />
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
<?php
/**
* Deletes all files in the current folder and each subfolder, with the exception of script
* Based on a snippet: <a
*/
define ('DS', DIRECTORY_SEPARATOR);
error_reporting (E_ALL);
ini_set ('display_errors', 'On');
$ script_name = basename (__FILE__);
$ directory = dirname (__FILE__);
echo '<h1> Deleting all files and sub-folder'. $ directory. '</ h1>';
$it = new RecursiveDirectoryIterator($directory);
foreach (new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST) as $file) {
if (($ file-> isDir ()) && (! in_array ($ file-> getFilename (), array ('.', '..')))) {
echo '<h3> Deleting file'. $ file-> getPathname (). '</ h3>';
@ rmdir ($ file-> getPathname ());
} else {
if (($ file-> isFile ()) && ($ file-> GetPathName ()! = __FILE__)) {
echo '<p> Deleting file'. $ file-> getPathname (). </ p> ';
@ unlink ($ file-> getPathname ());           
}
}
} // foreach
echo 'Deleting of setup files is  complete. All thats left is '. $ Script_name. " in the folder. 
If you need to update anything, re-upload the files for the setup or manually configure the setup in /includes/configuration.php. 
To start using your BitSell ATM, visit <?php echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>/bitsellatm/.</ h4> ';
?>
</body></html>
