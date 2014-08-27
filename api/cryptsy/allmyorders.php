<?php

require_once('config.php');
 
$result = api_query("allmyorders");

echo "<pre>".print_r($result, true)."</pre>";

?>