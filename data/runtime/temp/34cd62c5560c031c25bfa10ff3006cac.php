<?php /*a:2:{s:86:"D:\wamp64\www\hongboit\thinkcmf\public/themes/admin_simpleboot3/admin\teacher\add.html";i:1559049530;s:82:"D:\wamp64\www\hongboit\thinkcmf\public/themes/admin_simpleboot3/public\header.html";i:1559040360;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->


    <link href="/themes/admin_simpleboot3/public/assets/themes/<?php echo cmf_get_admin_style(); ?>/bootstrap.min.css" rel="stylesheet">
    <link href="/themes/admin_simpleboot3/public/assets/simpleboot3/css/simplebootadmin.css" rel="stylesheet">
    <link href="/static/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        form .input-order {
            margin-bottom: 0px;
            padding: 0 2px;
            width: 42px;
            font-size: 12px;
        }

        form .input-order:focus {
            outline: none;
        }

        .table-actions {
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 0px;
        }

        .table-list {
            margin-bottom: 0px;
        }

        .form-required {
            color: red;
        }
    </style>
    <script type="text/javascript">
        //全局变量
        var GV = {
            ROOT: "/",
            WEB_ROOT: "/",
            JS_ROOT: "static/js/",
            APP: '<?php echo app('request')->module(); ?>'/*当前应用名*/
        };
    </script>
    <script src="/themes/admin_simpleboot3/public/assets/js/jquery-1.10.2.min.js"></script>
    <script src="/static/js/wind.js"></script>
    <script src="/themes/admin_simpleboot3/public/assets/js/bootstrap.min.js"></script>
    <script>
        Wind.css('artDialog');
        Wind.css('layer');
        $(function () {
            $("[data-toggle='tooltip']").tooltip({
                container:'body',
                html:true,
            });
            $("li.dropdown").hover(function () {
                $(this).addClass("open");
            }, function () {
                $(this).removeClass("open");
            });
        });
    </script>
    <?php if(APP_DEBUG): ?>
        <style>
            #think_page_trace_open {
                z-index: 9999;
            }
        </style>
    <?php endif; ?>
</head>
<body>
<div class="wrap">
    <ul class="nav nav-tabs">
        <li><a href="<?php echo url('teacher/index'); ?>"><?php echo lang('ADMIN_teacher_INDEX'); ?></a></li>
        <li class="active"><a href="<?php echo url('teacher/add'); ?>"><?php echo lang('ADMIN_teacher_ADD'); ?></a></li>
    </ul>
    <form method="post" class="form-horizontal" action="<?php echo url('teacher/addPost'); ?>">
        <div class="form-group">
            <label for="input-link_name" class="col-sm-2 control-label">姓名<span class="form-required">*</span></label>
            <div class="col-md-6 col-sm-10">
                <input type="text" class="form-control" id="input-link_name" name="name" >
            </div>
        </div>
        <div class="form-group">
            <label for="input-link_name" class="col-sm-2 control-label">排序<span class="form-required">*</span></label>
            <div class="col-md-6 col-sm-10">
                <input type="text" class="form-control" id="input-link_name" name="list_order">
            </div>
        </div>
        <div class="form-group">
            <label for="input-link_name" class="col-sm-2 control-label">年龄<span class="form-required">*</span></label>
            <div class="col-md-6 col-sm-10">
                <input type="text" class="form-control" id="input-link_name" name="age">
            </div>
        </div>
        <div class="form-group">
            <label for="input-link_url" class="col-sm-2 control-label">手机号<span class="form-required">*</span></label>
            <div class="col-md-6 col-sm-10">
                <input type="text" class="form-control" id="input-link_url" name="teacher_tel" >
            </div>
        </div>
        <div class="form-group">
            <label for="input-link_url" class="col-sm-2 control-label">教龄<span class="form-required">*</span></label>
            <div class="col-md-6 col-sm-10">
                <input type="text" class="form-control" id="input-link_url" name="teacher_tel" >
            </div>
        </div>
        <div class="form-group">
            <label for="input-link_url" class="col-sm-2 control-label">教学风格<span class="form-required">*</span></label>
            <div class="col-md-6 col-sm-10">
                <input type="text" class="form-control" id="input-link_url" name="teacher_tel" >
            </div>
        </div>
        <div class="form-group">
            <label for="input-link_url" class="col-sm-2 control-label">所授课程<span class="form-required">*</span></label>
            <div class="col-md-6 col-sm-10">
                <input type="text" class="form-control" id="input-link_url" name="teacher_tel" >
            </div>
        </div>

        <div class="form-group">
            <label for="input-image" class="col-sm-2 control-label">教师照片</label>
            <div class="col-md-6 col-sm-10">
                <input type="text" class="form-control" id="input-image" name="teacher_portrait_src">
                <a href="javascript:uploadOneImage('图片上传','#input-image');">上传图片</a>
            </div>
        </div>
        <div class="form-group">
            <label for="input-link_url" class="col-sm-2 control-label">任教职位<span class="form-required">*</span></label>
            <div class="col-md-6 col-sm-10">
                <select class="form-control" name="position_id" id="input-target">
                    <?php if(is_array($teacher) || $teacher instanceof \think\Collection || $teacher instanceof \think\Paginator): if( count($teacher)==0 ) : echo "" ;else: foreach($teacher as $key=>$vo): ?>
                        <option value="<?php echo $vo['position_id']; ?>"><?php echo $vo['position_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="input-target" class="col-sm-2 control-label">性别</label>
            <div class="col-md-6 col-sm-10">
                <select class="form-control" name="sex" id="input-target">
                    <option value="0">女</option>
                    <option value="1">男</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="input-image" class="col-sm-2 control-label">教师简介</label>
            <div class="col-md-6 col-sm-10">
                <textarea class="form-control" id="input-site_analytics" name="options[site_analytics]"></textarea>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary js-ajax-submit"><?php echo lang('ADD'); ?></button>
                <a class="btn btn-default" href="javascript:history.back(-1);"><?php echo lang('BACK'); ?></a>
            </div>
        </div>
    </form>
</div>
<script src="/static/js/admin.js"></script>
</body>
</html>