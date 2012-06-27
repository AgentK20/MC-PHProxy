<?php
class Config {
    public $config;
    public function __construct($configArray){
        $this->checkConfig($configArray);
        $this->config = $configArray;
    }
    private function checkConfig($configArray){
        if(!$this->isValidIP($configArray['defaultHostToRouteTo'], $configArray['defaultPortToRouteTo'])){ die('Default host is invalid!'); }
    }
    private function isValidIP($ip, $port){
        if((long2ip(ip2long($ip))==$ip) && is_int($port) && ($port>0 && $port<65535)){
            return true;
        }else{
            return false;
        }
    }
    public function parseHosts () {
        $keys = array_keys($this->config['routeMap']);
        $finalKeys = array();
        foreach($keys as $key){
            // Lets get a list of all the hosts we'll accept and make sure they're lowercase.
            array_push($finalKeys, strtolower($key));
        }
        return $finalKeys;
    }
}
?>
