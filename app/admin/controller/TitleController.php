<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2019 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 小夏 < 449134904@qq.com>
// +----------------------------------------------------------------------
namespace app\admin\controller;

use cmf\controller\AdminBaseController;
use cmf\controller\BaseController;
use app\admin\model\TitleModel;
use app\admin\model\NavMenusModel;

class TitleController extends AdminBaseController
{
    public function index()
    {
        $TitleModel = new TitleModel();
        $title = $TitleModel->sel();
        //print_r($title);die;
        $this->assign('title', $title);
        $this->assign('page', $title->render());//单独提取分页出来
        return $this->fetch();
    }

    public function add()
    {
        $NavMenuModel = new NavMenusModel();
        $nav = $NavMenuModel->sel();
        $this->assign('nav', $nav);
        return $this->fetch();
    }


    public function addPost()
     {
         $data = $this->request->param();
         $TeacherModel = new TitleModel();
         $TeacherModel->allowField(true)->save($data);
         $this->success("添加成功！", url("title/index"));
     }
     public function edit()
     {
         $id = $this->request->param('id', 0, 'intval');
         $TitleModel = new TitleModel();
         $title = $TitleModel->find($id);
         $NavMenuModel = new NavMenuModel();
         $nav = $NavMenuModel->sel();
         $this->assign('title', $title);
         $this->assign('nav', $nav);
         return $this->fetch();
     }
     public function editPost()
     {
         $data      = $this->request->param();
         //dump($data);die;
         $TeacherModel = new TitleModel();
         $TeacherModel->allowField(true)->isUpdate(true)->save($data);
         $this->success("保存成功！", url("title/index"));
     }
     public function delete()
     {
         $id = $this->request->param('id', 0, 'intval');
         TeacherModel::destroy($id);
         $this->success("删除成功！", url("title/index"));
     }
     public function listOrder()
     {
         $TeacherModel = new TeacherModel();
         BaseController::listOrders($TeacherModel);
         $this->success("排序更新成功！");
     }


}