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
use app\admin\model\ArticleModel;
use app\admin\model\ClassModel;

class ArticleController extends AdminBaseController
{
    public function index()
    {
        $Article = ArticleModel::paginates(2);
        // 把分页数据赋值给模板变量users
        $this->assign('article', $Article);
        $this->assign('page', $Article->render());//单独提取分页出来
        return $this->fetch();
    }
 
    public function add()
    {
        /*$ClassModel = new TagsModel();
        $select_str = $ClassModel->allclass();
        $this->assign('select_str', $select_str);*/
         return $this->fetch();
    }

   
    public function addPost()
    {
        $data      = $this->request->param();
        $ArticleModel = new ArticleModel();
        $result    = $this->validate($data, 'article');
        if ($result !== true) {
            $this->error($result);
        }
        $data = $ArticleModel->handleData($data);
        $ArticleModel->allowField(true)->save($data);
        $this->success("添加成功！", url("article/index"));
    }

   
    public function edit()
    {
        $id        = $this->request->param('id', 0, 'intval');
        $ArticleModel = new ArticleModel();
        $article      = $ArticleModel->get($id);
        $this->assign('article', $article);
        return $this->fetch();
    }

    
    public function editPost()
    {
        $data      = $this->request->param();
        $ArticleModel = new ArticleModel();
        $result    = $this->validate($data, 'article');
        if ($result !== true) {
            $this->error($result);
        }
        $data = $ArticleModel->handleData($data);
        $ArticleModel->allowField(true)->isUpdate(true)->save($data);

        $this->success("保存成功！", url("article/index"));
    }

  
    public function delete()
    {
        $id = $this->request->param('id', 0, 'intval');
        ArticleModel::destroy($id);
        $this->success("删除成功！", url("article/index"));
    }
 
    public function listOrder()
    {
        $ArticleModel = new ArticleModel();
        BaseController::listOrders($ArticleModel);
        $this->success("排序更新成功！");
    }
 
    public function toggle()
    {
        $data      = $this->request->param();
        $ArticleModel = new ArticleModel();

        if (isset($data['ids']) && !empty($data["display"])) {
            $ids = $this->request->param('ids/a');
            $ArticleModel->where('article_id', 'in', $ids)->update([$data["type"] => 1]);
            $this->success("更新成功！");
        }

        if (isset($data['ids']) && !empty($data["hide"])) {
            $ids = $this->request->param('ids/a');
            $ArticleModel->where('article_id', 'in', $ids)->update([$data["type"] => 0]);
            $this->success("更新成功！");
        }


    }

}