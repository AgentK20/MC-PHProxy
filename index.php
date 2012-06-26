<?php
include('includes/core.class.php');
include('config.php');

$proxy = new Proxy($config['hostToBindTo'], $config['portToBindTo'], $config['defaultHostToRouteTo'], $config['defaultPortToRouteTo'], $config['routeMap']);
?>
