<?php
namespace iboxs\redis\operation;

class Basic extends BaseOperation
{
    /**
     * 查询生存时间
     * @param mixed $key 键
     * @return int 生存时间(单位秒),持久化的会返回-1，key不存在时返回-2
     */
    public function ttl($key){
        return $this->handler->ttl($key);
    }

    /**
     * 写入键值对
     * @param mixed $key 键
     * @param mixed $value 值
     * @param int $time_out 过期时间(秒)
     */
    public function set($key,$value,$time_out=0){
        if(is_array($value)||is_object($value)){
            $value=serialize($value);
        }
        return $this->handler->set($key,$value,$time_out==0?null:$time_out);
    }

    /**
     * 设置键的过期时间
     * @param mixed $key 键
     * @param int $time_out 过期时间(秒)
     */
    public function expire($key,$time_out){
        return $this->handler->expire($key,$time_out);
    }

    /**
     * 写入键值对（具体过期时间）
     * @param mixed $key 键
     * @param mixed $value 值
     * @param int $expire 过期时间(Unix时间戳)
     */
    public function time_set($key,$value,$expire){
        if(is_array($value)||is_object($value)){
            $value=serialize($value);
        }
        if($expire<time()){
            return false;
        }
        $this->handler->set($key,$value,20);
        return $this->handler->expireAt($key,$expire);
    }

    /**
     * 批量写入
     */
    public function mset($array){

    }

    /**
     * 若不存在时写入
     */
    public function setnx($key,$value){
        return $this->handler->setnx($key,$value);
    }

    /**
     * 读取缓存
     */
    public function get($key,$default=null){

    }

    /**
     * 批量读取缓存
     */
    public function mget($key_arr){

    }

    /**
     * 删除键值
     * @param array|string $key 键值（多个时以数组传入）
     */
    public function del($key){
        return $this->handler->del($key);
    }

    /**
     * 先获取值，再写入新值
     */
    public function getset($key,$value,$default=null){
        $result=$this->handler->getset($key,$value);
        if($result==false){
            $this->handler->set($key,$value);
            return $default;
        }
        return $result;
    }
}

// $redis->mset(array('key0' => 'value0', 'key1' => 'value1'));//设置一个或多个键值[true]

// $redis->setnx('key','value');//key=value,key存在返回false[|true]

// $redis->get('key');//获取key [value]

// $redis->mget($arr);//(string|arr),返回所查询键的值

// $redis->del($key_arr);//(string|arr)删除key，支持数组批量删除【返回删除个数】

// $redis->delete($key_str,$key2,$key3);//删除keys,[del_num]

// $redis->getset('old_key','new_value');//先获得key的值，然后重新赋值,[old_value | false]

// $redis->strlen('key');//获取当前key的长度

// $redis->append('key','string');//把string追加到key现有的value中[追加后的个数]

// $redis->incr('key');//自增1，如不存在key,赋值为1(只对整数有效,存储以10进制64位，redis中为str)[new_num | false]

// $redis->incrby('key',$num);//自增$num,不存在为赋值,值需为整数[new_num | false]

// $redis->decr('key');//自减1，[new_num | false]

// $redis->decrby('key',$num);//自减$num，[ new_num | false]

// $redis->setex('key',10,'value');//key=value，有效期为10秒[true]

// $redis->keys('*'); //遍历所有的键名