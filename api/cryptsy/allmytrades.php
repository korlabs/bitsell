<?php
 
require_once('config.php');

$result = api_query("allmytrades");

echo "<pre>".print_r($result, true)."</pre>";

?>