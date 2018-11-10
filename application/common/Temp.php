<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/18/018
 * Time: 11:33
 */
namespace app\common;
class Temp
{
    private $name;

    public function __construct($name = 'zx'){
        $this->name = $name;

    }

    public function setName()
    {
        return '你的名字是小明';

    }
}