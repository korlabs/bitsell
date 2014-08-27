<?php

require_once('config.php');
 
$result = api_query("mytransactions");

echo "<pre>".print_r($result, true)."</pre>";

?>