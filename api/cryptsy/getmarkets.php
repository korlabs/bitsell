<?php
 
require_once('config.php');

$result = api_query("getmarkets");

echo "<pre>".print_r($result, true)."</pre>";

?>