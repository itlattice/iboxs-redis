<?php

namespace iboxs\redis;

use iboxs\redis\operation\{Basic,ListHandle,sysMatic,Hash,DatabaseZset,DatabaseSet};

class Redis
{
    public static function basic(): Basic
    {
        $config=config('redis');
        $client=new Client($config);
        return $client->basic();
    }

    /**
     * redis软件系统操作
     */
    public static function sysmatic()
    {
        $config=config('redis');
        $client=new Client($config);
        return $client->sysmatic();
    }

    /**
     * 列表操作
     */
    public static function list(): ListHandle
    {
        $config=config('redis');
        $client=new Client($config);
        return $client->list();
    }

    /**
     * 数据集合操作
     */
    public static function Set(): DatabaseSet
    {
        $config=config('redis');
        $client=new Client($config);
        return $client->Set();
    }

    /**
     * 有序集合操作
     */
    public static function Zset(): DatabaseZset
    {
        $config=config('redis');
        $client=new Client($config);
        return $client->Zset();
    }

    /**
     * Hash表操作
     */
    public static function hash(): Hash
    {
        $config=config('redis');
        $client=new Client($config);
        return $client->hash();
    }
}