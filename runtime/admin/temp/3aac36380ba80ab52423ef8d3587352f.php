<?php /*a:1:{s:79:"D:\phpstudy_pro\WWW\gitShopTP\shopTP\app\admin\view\category\category_edit.html";i:1592980208;}*/ ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>编辑商品分类</title>
    <link rel="stylesheet" href="/static/admin/lib/layui-v2.5.4/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/admin/css/public.css" media="all">
</head>

<body>
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>编辑商品分类</legend>
    </fieldset>

    <form class="layui-form" action="">
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label" style="width: 200px;">父级分类</label>
                <div class="layui-input-inline">
                    <select name="pid" id="classif"></select>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 200px;">商品分类</label>
            <div class="layui-input-inline">
                <input type="text" name="name" lay-verify="name" autocomplete="off" placeholder="请输入标分类名称"  value="<?php echo htmlentities($editCategoryResult['name']); ?>"
                    class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 200px;">操作人</label>
            <div class="layui-input-inline">
                <input type="text" name="operation_user" lay-verify="name" autocomplete="off" placeholder="请输入操作人名称"  value="<?php echo htmlentities($editCategoryResult['operation_user']); ?>"
                    class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 200px;">状态</label>
            <div class="layui-input-inline">
                <input type="text" name="status" lay-verify="name" autocomplete="off" placeholder="请修改状态"  value="<?php echo htmlentities($editCategoryResult['status']); ?>"
                    class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 200px;">排序</label>
            <div class="layui-input-inline">
                <input type="text" name="listorder" lay-verify="name" autocomplete="off" placeholder="请输入排序名次"  value="<?php echo htmlentities($editCategoryResult['listorder']); ?>"
                    class="layui-input">
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo htmlentities($editCategoryResult['id']); ?>" >
        <div class="layui-form-item">
            <label class="layui-form-label" style="width: 200px;"></label>
            <div class="layui-input-inline">
                <button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="demo1">立即提交</button>
            </div>
        </div>
        <!-- <?php echo htmlentities($editCategoryResult['pid']); ?> ? <?php echo htmlentities($editCategoryResult['id']); ?> : 0; -->
        <!-- <?php if($editCategoryResult['pid']): ?> <?php echo htmlentities($editCategoryResult['pid']); else: ?> 0 <?php endif; ?> -->
        
    </form>
    <script src="/static/admin/lib/layui-v2.5.4/layui.js" charset="utf-8"></script>
    <script src="/static/admin/lib/jquery-3.4.1/jquery-3.4.1.min.js" charset="utf-8"></script>
    <script src="/static/admin/js/common.js" charset="utf-8"></script>
    <script>
        layui.use(['form', 'laypage'], function () {
            var form = layui.form;

            function _classif(res = []) {
                // res 分类数据 先期模拟
                
                let temps = '<option value="<?php if($editCategoryResult['pid']): ?><?php echo htmlentities($editCategoryResult['pid']); else: ?> 0 <?php endif; ?>"  data-id="<?php if($editCategoryResult['pid']): ?><?php echo htmlentities($editCategoryResult['pid']); else: ?><?php endif; ?>" >-| <?php if($editCategoryResult['pid']): ?> <?php echo htmlentities($editResultName); else: ?> 顶级菜单<?php endif; ?> </option>';
                var data = <?php echo $category; ?>;
            let toTrees = toTree(data);
            for (let item of toTrees) {
                temps += `<optgroup  data-id="${item["id"]}">`;
                temps += `<option  data-id="${item['id']}" value="${item['id']}">-| ${item["name"]}</option>`
                if (item['children'] && item['children'].length > 0) {
                    for (let child of item['children']) {
                        temps += `<option  data-id="${child['id']}" value="${child['id']}"> &nbsp;&nbsp;&nbsp;--| ${child["name"]} </option>`
                    }
                }
                temps += `</optgroup>`;
            }
            $('#classif').html(temps)
            form.render('select');
        }


            function queryClassif() { // 请求分类 后端接口
                let url = '';
                layObj.get(url, function (res) {
                    // console.log(res)
                }); // 封装的ajax
                _classif()
            }
            queryClassif(); // 获取后端分类数据

        //监听提交
        form.on('submit(demo1)', function (data) {
            // console.log(data.field, '最终的提交信息')
            // let url = '';
            // layObj.post(url, data, function (res) {

            // });
            d = data.field;
            // console.log(d);
            $.ajax({
                type: 'POST',
                data: d,
                url: "<?php echo url('updateCategory'); ?>",
                success: (res) => {
                    if (res.status == 1) {
                        // layer.msg(res)
                        console.log(res);
                    } else {
                        console.log(res);
                        // layer.msg('失败');
                       
                    }
                    // console.log(res.status);
                },
                error: (res) => {
                    console.log(res);
                    layer.msg('失败');
                }
            })

            return false;
        });

        })
    </script>
</body>

</html>