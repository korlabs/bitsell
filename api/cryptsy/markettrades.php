<?php

require_once('config.php');
 
$result = api_query("markettrades", array("marketid" => 26));

echo "<pre>".print_r($result, true)."</pre>";

?>