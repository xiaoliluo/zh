<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/26/026
 * Time: 11:41
 */
namespace app\common\Validate;
use think\Validate;
class User extends Validate
{
    protected $rule = [

        'name|姓名'=>['require',
        'length'=>'2,20',
        'chsAlphaNum'=>'chsAlphaNum'],

        'email|邮箱'=>[
            'require',
            'email'=>'email',
            'unique'=>'zh_user'//该字段在zh_user表中唯一
        ],

        'mobile|手机号码'=>[
            'require',
            'mobile'=>'mobile',
            'unique'=>'zh_user',
            'number'=>"number"
        ],

        'password|密码'=>[
            'require',
            'length'=>'6,20',
            'chsAlphaNum'=>'chsAlphaNum',

        ],


        'password_confirm'=>['require',
            'confirm'=>'password'

        ]


    ];

    //场景验证，为控制器里面某些字段提供验证
    protected $scene = [
        'login' => ['mobile','password']
    ];

}