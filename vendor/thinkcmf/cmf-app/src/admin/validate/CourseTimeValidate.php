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

class CourseTimeValidate extends Validate
{
    protected $rule = [
        'add_time' => 'require',
        'course_id'  => 'require',
     
    ];

    protected $message = [
        'add_time.require' => '开课时间不能为空',
        'course_id.require' => '课程不能为空',
    ];

}