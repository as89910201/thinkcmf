<?php

namespace app\admin\model;

use think\Model;
use think\Db;
use think\facade\Cache;

class CategoryModel extends Model
{   

    protected $table = 'cmf_article_c';
    protected $pk = 'cid';
}
