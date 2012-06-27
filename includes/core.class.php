<?php
include('includes/config.class.php');
include('includes/proxy.class.php');

$config = new config($config);
$routeMap = $config->parseHosts();
?>
