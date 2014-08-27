<?php

require_once('config.php');
 
$result = api_query("marketorders", array("marketid" => 26));

echo "<pre>".print_r($result, true)."</pre>";

?>