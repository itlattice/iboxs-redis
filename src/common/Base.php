<?php
namespace iboxs\redis;

use Redis;

class Base
{
    protected $config=[
        'host'=>'127.0.0.1', //IP Address
        'port'=>6379, //Port
        'password'=>'',
        'prefix'=>'',  //prefix
        'expire'=>0,  //Expiration time
        'time_out'=>0
    ];

    public $handler;

    public function __construct($config=[])
    {
        $this->config['host']=$config['host']??$this->config['host'];
        $this->config['port']=$config['port']??$this->config['port'];
        $this->config['prefix']=$config['prefix']??$this->config['prefix'];
        $this->config['expire']=$config['expire']??$this->config['expire'];
        if(!class_exists('Redis')){
            exit('No Redis EXT');
        }
        $this->handler=new Redis();
        $this->handler->connect('127.0.0.1', 6379,$this->config['time_out']);
        $this->handler->auth($this->config['password']);
    }
}