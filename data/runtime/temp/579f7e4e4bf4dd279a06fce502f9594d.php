<?php /*a:2:{s:82:"D:\wampserver\www\ThinkCMF\public/themes/admin_simpleboot3/admin\student\edit.html";i:1559028704;s:77:"D:\wampserver\www\ThinkCMF\public/themes/admin_simpleboot3/public\header.html";i:1557818809;}*/ ?>
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
        <li><a href="<?php echo url('student/index'); ?>"><?php echo lang('ADMIN_STUDENT_INDEX'); ?></a></li>
        <li><a href="<?php echo url('student/add'); ?>"><?php echo lang('ADMIN_STUDENT_ADD'); ?></a></li>
        <li class="active"><a>编辑学生信息</a></li>
    </ul>
    <form method="post" class="form-horizontal " action="<?php echo url('student/editPost'); ?>">
        <div class="form-group">
            <label for="input-link_name" class="col-sm-2 control-label">姓名<span class="form-required">*</span></label>
            <div class="col-md-6 col-sm-10">
                <input type="text" class="form-control" id="input-link_name" name="name" value="<?php echo $student['name']; ?>">
            </div>
        </div>

        <div class="form-group">
                <label for="input-target" class="col-sm-2 control-label">状态</label>
                <div class="col-md-6 col-sm-10">
                    <select class="form-control" name="is_graduate" id="input-target">
                            <?php $selected_yes=$student['is_graduate']==1?"selected='selected'":""; $selected_no=$student['is_graduate']==0?"selected='selected'":""; ?>
                            <option value="1" <?php echo $selected_yes; ?>>毕业</option>
                            <option value="0" <?php echo $selected_no; ?>>未毕业</option>
                    </select>
                </div>
            </div>
        
        <div class="form-group">
            <label for="input-link_name" class="col-sm-2 control-label">年龄<span class="form-required">*</span></label>
            <div class="col-md-6 col-sm-10">
                <input type="text" class="form-control" id="input-link_name" name="age" value="<?php echo $student['age']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="input-link_url" class="col-sm-2 control-label">手机号<span class="form-required">*</span></label>
            <div class="col-md-6 col-sm-10">
                <input type="text" class="form-control" id="input-link_url" name="tel" value="<?php echo $student['tel']; ?>">
            </div>
        </div>
         
        <div class="form-group">
                <label for="input-link_image" class="col-sm-2 control-label">学生照片</label>
                <div class="col-md-6 col-sm-10">
                    <input type="text" class="form-control" id="input-link_image" name="img" value="<?php echo $student['img']; ?>">
                    <a href="javascript:uploadOneImage('图片上传','#input-link_image');">上传图片</a>
                </div>
            </div>
        <div class="form-group">
            <label for="input-link_url" class="col-sm-2 control-label">入学时间<span class="form-required">*</span></label>
            <div class="col-md-6 col-sm-10">
                <input type="date" class="form-control" id="input-link_url" name="enrol_time" value="<?php echo $student['enrol_time']; ?>">
            </div>
        </div> 
        <div class="form-group">
            <label for="input-link_url" class="col-sm-2 control-label">毕业时间<span class="form-required">*</span></label>
            <div class="col-md-6 col-sm-10">
                <input type="date" class="form-control" id="input-link_url" name="graduate_time" value="<?php echo $student['graduate_time']; ?>">
            </div>
        </div> 
        <div class="form-group">
            <label for="input-link_url" class="col-sm-2 control-label">职位<span class="form-required">*</span></label>
            <div class="col-md-6 col-sm-10">
                <input type="text" class="form-control" id="input-link_url" name="position" value="<?php echo $student['position']; ?>">
            </div>
        </div> 
        <div class="form-group">
                <label for="input-link_name" class="col-sm-2 control-label">排序<span class="form-required">*</span></label>
                <div class="col-md-6 col-sm-10">
                    <input type="text" class="form-control" id="input-link_name" name="list_order" value="<?php echo $student['list_order']; ?>">
                </div>
            </div>
        <div class="form-group">
            <label for="input-link_description" class="col-sm-2 control-label">薪资</label>
            <div class="col-md-6 col-sm-10">
                <textarea class="form-control" name="pay" id="input-link_description"><?php echo $student['pay']; ?></textarea>
            </div>
        </div>
      
        <div class="form-group">
                <label for="input-target" class="col-sm-2 control-label">性别</label>
                <div class="col-md-6 col-sm-10">
                    <select class="form-control" name="sex" id="input-target">
                            <?php $selected=$student['sex']==0?"selected='selected'":""; $selected_=$student['sex']==1?"selected='selected'":""; ?>
                            <option value="0" <?php echo $selected; ?>>女</option>
                            <option value="1" <?php echo $selected_; ?>>男</option>
                    </select>
                </div>
            </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
                <button type="submit" class="btn btn-primary js-ajax-submit"><?php echo lang('SAVE'); ?></button>
                <a class="btn btn-default" href="<?php echo url('student/index'); ?>"><?php echo lang('BACK'); ?></a>
            </div>
        </div>
    </form>
</div>
<script src="/static/js/admin.js"></script>
</body>
</html>