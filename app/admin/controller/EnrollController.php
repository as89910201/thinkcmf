<?php
// +----------------------------------------------------------------------
// |  liuhaoyu
// +----------------------------------------------------------------------
// | hongboit
// +----------------------------------------------------------------------
// | 
// +----------------------------------------------------------------------
// | Author: 刘浩宇 < 2083709400@qq.com>
// +----------------------------------------------------------------------
namespace app\admin\controller;
use think\Db;
use app\admin\model\EnrollModel;

use cmf\controller\AdminBaseController;

class EnrollController extends AdminBaseController
{
 
 
    public function index()
    {
        
        $Enroll = EnrollModel::paginates(2);
      
        // 把分页数据赋值给模板变量users
        $this->assign('enroll', $Enroll);
      
        $this->assign('page', $Enroll->render());//单独提取分页出来


        return $this->fetch();
    }
 
   

  
    public function delete()
    {
        $id = $this->request->param('id', 0, 'intval');
        EnrollModel::destroy($id);
        $this->success("删除成功！", url("enroll/index"));
    }
 
     

}