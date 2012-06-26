<?php
// MC PHPROXY CONFIGURATION FILE
// VER 1.0


$config['hostToBindTo'] = 'localhost';
$config['portToBindTo'] = 25565;
$config['defaultHostToRouteTo'] = 'localhost';
$config['defaultPortToRouteTo'] = 25566;
$config['routeMap'] = array(
    'freebuild.mysite.com' => array(
        'host' => '192.168.5.100',
        'port' => 25568
    ),
    'survival.mysite.com' => array(
        'host' => '123.45.67.89',
        'port' => 25578
    )
);
?>
