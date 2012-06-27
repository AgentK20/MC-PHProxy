<?php
class Proxy {
    public $servers;
    public $config;
    public function __construct ($config){
        $this->config = $config;
        $this->configHandle = new Config($config);
    }
    public function CheckAlive ($checkall, $server=null){
        $servers = $this->servers;
        if(!$checkall){
            if(!isset($server)){ die('Server must be set!'); }
            $pingResult[$server] = $this->MCPing($ip, $port);
            return $pingResult;
        }else{
            $pingResult['defaultHost'] = $this->MCPing($config['defaultHostToRouteTo'], $config['defaultPortToRouteTo']);
            foreach(array_keys($servers) as $server){
                $pingResult[$server] = $this->MCPing($servers[$server]['host'], $servers[$server]['port']);
            }
            return $pingResult;
        }
    }
    private function MCPing($IP, $Port, $Timeout=2){
        $Socket = Socket_Create( AF_INET, SOCK_STREAM, SOL_TCP );
        Socket_Set_Option( $Socket, SOL_SOCKET, SO_SNDTIMEO, array( 'sec' => (int)$Timeout, 'usec' => 0 ) );
        if( $Socket === false || @Socket_Connect( $Socket, $IP, (int)$Port ) === false ){ return false; }
        Socket_Send( $Socket, "\xFE", 1, 0 );
        $Len = Socket_Recv( $Socket, $Data, 256, 0 );
        Socket_Close( $Socket );
        if( $Len < 4 || $Data[ 0 ] != "\xFF" ){ return false; }
        $Data = SubStr( $Data, 3 );
        $Data = iconv( 'UTF-16BE', 'UTF-8', $Data );
        $Data = Explode( "\xA7", $Data );
        return array(
        'HostName'   => SubStr( $Data[ 0 ], 0, -1 ),
        'Players'    => isset( $Data[ 1 ] ) ? IntVal( $Data[ 1 ] ) : 0,
        'MaxPlayers' => isset( $Data[ 2 ] ) ? IntVal( $Data[ 2 ] ) : 0
        );
    }
    public function UpdateMotd (){
        $pingResult = $this->CheckAlive(true);
    }
    
}
?>
