<?php
 
namespace app\admin\controller;
use think\Db;
use cmf\controller\AdminBaseController;
use cmf\controller\BaseController;

//use app\admin\model\StudentModel;
use app\admin\model\TagsModel;
class TagsController extends AdminBaseController
{
 
 
    public function index()
    {
        
        $Tags = TagsModel::paginate(2);
       //foreach
        // 把分页数据赋值给模板变量users
        //\dump($Tags );
        $this->assign('Tags', $Tags);
      
        $this->assign('page', $Tags->render());//单独提取分页出来


        return $this->fetch();
    }
 
    public function add()
    {
         return $this->fetch();
    }

   
    public function addPost()
    {
        $data      = $this->request->param();
        $data['create_time'] = time();
        $data['update_time'] = time();
        $data['is_show'] = 1;
        $TagsModel = new TagsModel();
        $result    = $this->validate($data, 'Tags');
        if ($result !== true) {
            $this->error($result);
        }
        $TagsModel->allowField(true)->save($data);

        $this->success("添加成功！", url("Tags/index"));
    }

   
    public function edit()
    {
        $id        = $this->request->param('id', 0, 'intval');
        $TagsModel = new TagsModel();

        $Tags     = $TagsModel->get($id);
        
        $this->assign('Tags', $Tags);
        return $this->fetch();
    }

    
    public function editPost()
    {
        $data      = $this->request->param();
        $data['update_time'] = time(); 
         
        $TagsModel = new TagsModel();
        $result    = $this->validate($data, 'Tags');
         
        if ($result !== true) {
            $this->error($result);
        }
        $TagsModel->allowField(true)->isUpdate(true)->save($data);

        $this->success("保存成功！", url("Tags/index"));
    }

  
    public function delete()
    {
        $id = $this->request->param('id', 0, 'intval');
        TagsModel::destroy($id);
        $this->success("删除成功！", url("Tags/index"));
    }
 
    public function listOrder()
    {
        BaseController::listOrders("article_tags");
        $this->success("排序更新成功！");
    }
 
    public function toggle()
    {
        $data      = $this->request->param();
        $TagsModel = new TagsModel();

        if (isset($data['ids']) && !empty($data["display"])) {
            $ids = $this->request->param('ids/a');
            $TagsModel->where('id', 'in', $ids)->update([$data["type"] => 1]);
            $this->success("更新成功！");
        }

        if (isset($data['ids']) && !empty($data["hide"])) {
            $ids = $this->request->param('ids/a');
            $TagsModel->where('id', 'in', $ids)->update([$data["type"] => 0]);
            $this->success("更新成功！");
        }


    }

}