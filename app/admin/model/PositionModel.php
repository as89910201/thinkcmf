<?php

namespace app\admin\model;

use think\Model;
use think\facade\Cache;
use think\DB;

class PositionModel extends Model
{
    public function pos(){
        $student = DB::table('cmf_position')->select();
        return $student;
    }
    public function get($id){
        $student = DB::table('cmf_position')->where('position_id','=',$id)->select();
        return $student;
    }
}