<?php
/**
 * Redis operation starts from here
 * @author  zqu zqu1016@qq.com
 */
namespace iboxs\redis;

use iboxs\redis\common\Base;
use iboxs\redis\operation\{Basic,ListHandle,sysMatic,DatabaseSet,DatabaseZset,Hash};

class Client extends Base
{
    /**
     * 基础操作
     */
    public function basic(){
        return (new Basic($this->handler));
    }

    /**
     * redis软件系统操作
     */
    public function sysmatic(){
        return (new sysMatic($this->handler));
    }

    /**
     * 列表操作
     */
    public function list(){
        return (new ListHandle($this->handler));
    }

    /**
     * 数据集合操作
     */
    public function Set(){
        return (new DatabaseSet($this->handler));
    }

    /**
     * 有序集合操作
     */
    public function Zset(){
        return (new DatabaseZset($this->handler));
    }

    /**
     * Hash表操作
     */
    public function hash(){
        return (new Hash($this->handler));
    }
}