<?php

namespace iboxs\redis\common;

use Redis;

class Base
{
    use Helper;

    protected $config=[
        'host'=>'127.0.0.1', //IP Address
        'port'=>6379, //Port
        'password'=>'',
        'expire'=>0,  //Expiration time
        'time_out'=>0,
        'prefix'=>'' //前缀
    ];

    /**
     * 键的处理
     * @param string $key 键
     * @param string $prefix 前缀
     * @return string 新键
     */
    public function operationKey($key,$prefix=''){
        if($prefix==''){
            $prefix=$this->config['prefix']??'';
        }
        return $prefix.$key;
    }

    /**
     * @var \Redis
     */
    public $handler;
}