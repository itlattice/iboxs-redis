<?php
namespace iboxs\redis\operation;

/**
 * 操作基类
 */
class BaseOperation
{
    /**
     * @var \Redis
     */
    protected $handler;

    public function __construct($handler)
    {
        $this->handler=$handler;
    }
}