<?php
// MC PHPROXY CONFIGURATION FILE
// VER 1.0

// The host to bind the proxy to
$config['hostToBindTo'] = 'localhost';
// The port to bind the proxy to
$config['portToBindTo'] = 25565;
// The default host to route to
$config['defaultHostToRouteTo'] = 'localhost';
// The default port to route to
$config['defaultPortToRouteTo'] = 25566;
// Should the proxy always reply with the same motd? If set to false, the Motd of the default server will be used.
$config['useGlobalMotd'] = false;
// The global Motd to use. If useGlobalMotd is set to false, this value has no effect.
$config['globalMotd'] = 'A minecraft server proxy';
// A route map of different domain names and who to route to.
$config['routeMap'] = array(
    'freebuild.mysite.com' => array(
        'host' => '192.168.5.100',
        'port' => 25568
    ),
    '127.0.0.1' => array(
        'host' => '192.168.5.100',
        'port' => 25568
    ),
    'survival.mysite.com' => array(
        'host' => '123.45.67.89',
        'port' => 25578
    )
);
?>
