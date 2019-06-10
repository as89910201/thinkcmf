<?php

namespace app\admin\model;

use think\Model;
use think\DB;
class ReferrerModel extends Model
{   
    protected $pk = 'id';
    

    public static function paginates($num = 2,$order = "id",$sort = 'desc'){
        $res = DB::table('cmf_referrer')->order($order,$sort)->paginate($num);
        return $res;
     
    }
 
    
}
