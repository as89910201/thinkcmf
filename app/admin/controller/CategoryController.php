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
use think\Db;
use cmf\controller\AdminBaseController;
use cmf\controller\BaseController;
 use app\admin\model\CategoryModel;
class CategoryController extends AdminBaseController
{
 
 
    public function index()
    {
        
        $Category = CategoryModel::paginate(2);
       
        // 把分页数据赋值给模板变量users
        $this->assign('category', $Category);
      
        $this->assign('page', $Category->render());//单独提取分页出来


        return $this->fetch();
    }
 
    public function add()
    {
         return $this->fetch();
    }

   
    public function addPost()
    {
        $data      = $this->request->param();
        
        $CategoryModel = new CategoryModel();
        $result    = $this->validate($data, 'Category');
        if ($result !== true) {
            $this->error($result);
        }
        $CategoryModel->allowField(true)->save($data);

        $this->success("添加成功！", url("category/index"));
    }

   
    public function edit()
    {
        $id        = $this->request->param('id', 0, 'intval');
        $CategoryModel = new CategoryModel();

        $Category     = $CategoryModel->get($id);
        
        $this->assign('category', $Category);
        return $this->fetch();
    }

    
    public function editPost()
    {
        $data      = $this->request->param();
     
        $CategoryModel = new CategoryModel();
        $result    = $this->validate($data, 'category');
         
        if ($result !== true) {
            $this->error($result);
        }
        $CategoryModel->allowField(true)->isUpdate(true)->save($data);

        $this->success("保存成功！", url("category/index"));
    }

  
    public function delete()
    {
        $id = $this->request->param('id', 0, 'intval');
        CategoryModel::destroy($id);
        $this->success("删除成功！", url("category/index"));
    }
 
    public function listOrder()
    {
        $CategoryModel = new CategoryModel();
        BaseController::listOrders($CategoryModel);
        $this->success("排序更新成功！");
    }
 
     

}