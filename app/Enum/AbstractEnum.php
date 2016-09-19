<?php
namespace App\Enum;

use ReflectionClass;

abstract class AbstractEnum
{
    private static function getReflaction()
    {
        return $reflection = new ReflectionClass(static::class);
    }

    public static function has($value, $reflection = null)
    {
        if (!($reflection instanceof ReflectionClass)) {
            $reflection = self::getReflaction();
        }
        return $reflection->hasConstant(strtoupper($value));
    }

    public static function get($value)
    {
        $reflaction = self::getReflaction();

        if (self::has($value, $reflaction)) {
            return $reflaction->getConstant(strtoupper($value));
        }
    }
}
