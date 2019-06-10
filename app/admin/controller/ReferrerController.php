<?php
// +----------------------------------------------------------------------
//  
// +----------------------------------------------------------------------
//  
// +----------------------------------------------------------------------
//  
// +----------------------------------------------------------------------
//  
// +----------------------------------------------------------------------
namespace app\admin\controller;

use cmf\controller\AdminBaseController;
use app\admin\model\ReferrerModel;
use think\Request;

class ReferrerController extends AdminBaseController
{
    public function index(Request $request)
    {
        $ReferrerModel = new ReferrerModel();

        $type = $request->type;
        $sort = $request->sort;
        $arr = array(
            "id"=>"asc",
            'name'=>"desc",
            "aid"=>"desc"
        );
        if(empty($type)){
            $Referrer = $ReferrerModel->paginates(5);
        }else{
            $new_sort = $sort == "desc"?"asc":"desc";
            $arr[$type] = $new_sort;
            $Referrer = $ReferrerModel->paginates(5,$type,$sort);
        }
        
        //dump($arr);
        $this->assign('Referrer', $Referrer);
        $this->assign('page', $Referrer->render());//单独提取分页出来
        $this->assign("arr",$arr);
        return $this->fetch();
    }

    
 

}