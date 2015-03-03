<?php
namespace SlimPlugin\Redis;
class Redis
{
    private static $redis;
    public static function config($configJson)
    {
        if($configJson["redis"]["enabled"]==true)
        {
            self::$redis = new \Redis();
            self::$redis->connect($configJson["redis"]["host"], $configJson["redis"]["port"]);
            if(isset($configJson["redis"]["auth"])&&$configJson["redis"]["auth"]!="")
            {
                self::$redis->auth($configJson["redis"]["auth"]);
            }
        }
    }
    public static function getRedis()
    {
        return self::$redis;
    }
}
