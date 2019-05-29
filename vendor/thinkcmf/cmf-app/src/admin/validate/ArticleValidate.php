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

class ArticleValidate extends Validate
{
    protected $rule = [
        'title' => 'require',
        'img'  => 'require',
        'keywords' => 'require',
        'tags_ids'=>"require",
        'cid'=>"require|/^[1-9]\d*$/",
        'content'=>"require",
    ];

    protected $message = [
        'title.require' => '标题不能为空',
        'img.require'  => '图片不能为空',
        'keywords.require' => '关键词不能为空',
        'tags_ids.require' => '签名不能为空',
        'cid.require' => '分类不能为空|大于0',
        'content.require' => '内容不能为空',
    ];

}