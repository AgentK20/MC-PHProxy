<?php
class Config {
    public $config;
    public function __construct($configArray){
        $this->config = $configArray;
    }
    public function parseHosts () {
        $keys = array_keys($config['routeMap']);
        $finalKeys = array();
        foreach($keys as $key){
            // Lets get a list of all the hosts we'll accept and make sure they're lowercase.
            array_push($finalKeys, strtolower($key));
        }
        return $finalKeys;
    }
}
?>
