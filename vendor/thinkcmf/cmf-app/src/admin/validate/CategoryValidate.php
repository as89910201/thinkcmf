<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2019 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小夏 < 449134904@qq.com>
// +----------------------------------------------------------------------
namespace app\admin\validate;

use think\Validate;

class CategoryValidate extends Validate
{
    protected $rule = [
        'c_name' => 'require',
        'list_order'  => 'require',
     
    ];

    protected $message = [
        'c_name.require' => '名称不能1为空',
        'list_order.require' => '排序不能为空',
    ];

}