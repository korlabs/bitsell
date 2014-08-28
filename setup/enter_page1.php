<?php
ob_start();

include("../includes/configuration.php");

$language = preg_replace('/[^A-Za-z]/', '', $_GET['lang']);

$file = '../includes/configuration.php';
$content = file_get_contents($file);
$content = preg_replace("/nolang/", $language, $content);
file_put_contents($file, $content);

header('location:page2.php');

?>
