<?php

namespace app\admin\model;

use think\Model;
use think\Db;
use think\facade\Cache;

class TagsModel extends Model
{   

    protected $table = 'cmf_article_tags';
    public static function paginate($page){
        $res = parent::paginate($page);
        foreach ($res as $v){
            $v['create_time'] = date("Y年m月d日", $v['create_time']);
            $v['update_time'] = date("Y年m月d日", $v['update_time']);
            $result = Db::query('select count(*) as num from cmf_article where tags_id = '.$v['id']);
            $v['count'] = $result[0]['num'];
        }
        return $res;
    }
}
