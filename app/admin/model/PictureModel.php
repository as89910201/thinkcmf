<?php

namespace app\admin\model;

use think\Model;
use think\facade\Cache;
use think\DB;

class PictureModel extends Model
{
    protected $pk = 'picture_id';
    public function sel(){
        $list = DB::table('cmf_picture')->where('is_advert','=',1)->paginate(2);
        return $list;
    }
}