<?php

namespace app\admin\model;

use think\Model;
use think\facade\Cache;
use think\DB;

class PositionModel extends Model
{
    public function pos(){
        $Position = DB::table('cmf_position')->select();
        return $Position;
    }
    public function get($id){
        $Position = DB::table('cmf_position')->where('position_id','=',$id)->select();
        return $Position;
    }
}