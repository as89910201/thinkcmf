<?php

namespace app\admin\model;

use think\Model;
use think\facade\Cache;
use think\DB;

class TitleModel extends Model
{
    protected $pk = 't_id';
    public function sel(){
        $list = DB::table('cmf_title')
            ->alias('t')
            ->join('cmf_nav_menu n','t.n_id = n.id')
            ->field('t.t_id,t.title,n.id,n.name,t.list_order')
            ->paginate(2);
        return $list;
    }
}