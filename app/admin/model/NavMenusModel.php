<?php

namespace app\admin\model;

use think\Model;
use think\facade\Cache;
use think\DB;

class NavMenusModel extends Model
{
    public function sel(){
        $list = DB::table('cmf_nav_menu')
            ->field('id,name')
            ->select();
        return $list;
    }

}