<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
    <div class="layui-card-header">
	    <?php echo P_Lang("搜索");?>
        <div class="layui-btn-group fr test-table-operate-btn" style="margin-bottom: 10px;">
            <button class="layui-btn layui-btn-sm" onclick="$.admin_res.edit_local();void(0);"><?php echo P_Lang("编辑器图片配置");?></button>
            <button class="layui-btn layui-btn-sm" onclick="$.admin_res.update_pl_pictures();void(0);"><?php echo P_Lang("图片全部更新");?></button>
            <button class="layui-btn layui-btn-sm" onclick="$.admin_res.add_file();void(0)"><?php echo P_Lang("添加资源");?></button>
            <button class="layui-btn layui-btn-sm layui-btn-danger" onclick="$.admin_res.clear_files();void(0)"><?php echo P_Lang("清理无效文件");?></button>
        </div>
    </div>

    <div class="layui-card-body">
	    <form method="post" action="<?php echo phpok_url(array('ctrl'=>'res'));?>" class="layui-form">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <select id="cate_id" name="cate_id">
                        <option value="0"><?php echo P_Lang("请选择附件分类");?></option>
                        <?php $catelist_id["num"] = 0;$catelist=is_array($catelist) ? $catelist : array();$catelist_id = array();$catelist_id["total"] = count($catelist);$catelist_id["index"] = -1;foreach($catelist as $key=>$value){ $catelist_id["num"]++;$catelist_id["index"]++; ?>
                        <option value="<?php echo $value['id'];?>" <?php if($cate_id== $value['id']){ ?> selected<?php } ?>><?php echo $value['title'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="layui-inline">
                    <select id="myext" name="myext">
                        <option value=""><?php echo P_Lang("请选择附件类型");?></option>
                        <?php $tmpid["num"] = 0;$filetypes=is_array($filetypes) ? $filetypes : array();$tmpid = array();$tmpid["total"] = count($filetypes);$tmpid["index"] = -1;foreach($filetypes as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
                        <option value="<?php echo $value;?>" <?php if($myext == $value){ ?> selected<?php } ?>><?php echo strtoupper($value);?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="layui-inline">
                    <input type="text" id="keywords" name="keywords" placeholder="<?php echo P_Lang("输入关键字");?>" value="<?php echo $keywords;?>" class="layui-input" />
                </div>
                <div class="layui-inline">
                    <input type="text" class="layui-input" id="start_date" name="start_date" placeholder="<?php echo P_Lang("开始时间");?>" value="<?php echo $start_date;?>">
                </div>
                <div class="layui-inline">
                    <input type="text" id="stop_date" name="stop_date" class="layui-input" placeholder="<?php echo P_Lang("结束时间");?>" value="<?php echo $stop_date;?>">
                </div>
                <div class="layui-inline">
                    <button class="layui-btn layuiadmin-btn-admin" lay-submit="" lay-filter="LAY-user-back-search">
                        <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                    </button>
                </div>
            </div>
        </form>
        
        <div id="move_cate_html" class="hide">
            <table>
                <?php $tmpid["num"] = 0;$catelist=is_array($catelist) ? $catelist : array();$tmpid = array();$tmpid["total"] = count($catelist);$tmpid["index"] = -1;foreach($catelist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
                <tr>
                    <td><input type="radio" name="newcate" id="newcate_<?php echo $value['id'];?>" value="<?php echo $value['id'];?>" <?php if($tmpid['num']== 1){ ?> checked<?php } ?> />
                    </td>
                    <td><label for="newcate_<?php echo $value['id'];?>"><?php echo $value['title'];?><?php if($value['typeinfos']){ ?> <span class="gray i">支持类型：<?php echo $value['typeinfos'];?></span><?php } ?></label></td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <style type="text/css">

            .layui-card-body:hover {
                background-color: #F9F9F9;
            }
        </style>
    </div>
</div>
<div class="layui-row layui-col-space10 layui-form checkbox">
    <?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
    <div class="layui-col-sm6 layui-col-md4 layui-col-lg3" id="thumb_<?php echo $value['id'];?>">
        <div class="layui-card">
	        <div class="layui-card-header">
		        <input type="checkbox" name="attrid[]" title="<?php echo $value['title'];?>" id="attrid_<?php echo $value['id'];?>" value="<?php echo $value['id'];?>" lay-skin="primary"/>
		        <?php if($value['download']){ ?>, <?php echo P_Lang("下载次数");?> <?php echo $value['download'];?> <?php echo P_Lang("次");?><?php } ?>
			</div>
            <div class="layui-card-body layui-clear">
                <div class="layui-row layui-col-space10">
                    <div class="layui-col-sm3"><img src="<?php echo $value['ico'];?>" width="100%" /></div>
                    <div class="layui-col-sm9">
						<div>
							<?php echo P_Lang("文件名");?> <?php echo $value['name'];?>
							<?php if($value['folder']){ ?><br><?php echo P_Lang("存储目录");?> <?php echo $value['folder'];?><?php } ?>
							<br><?php echo P_Lang("上传时间");?> <?php echo date('Y-m-d H:i:s',$value['addtime']);?>
						</div>
						<div class="layui-btn-group">
							<input type="button" value="<?php echo P_Lang("修改");?>" class="layui-btn layui-btn-sm" onclick="$.admin_res.modify('<?php echo $value['id'];?>')"/>
							<input type="button" value="<?php echo P_Lang("预览");?>" class="layui-btn layui-btn-sm" onclick="$.admin_res.preview_attr('<?php echo $value['id'];?>')"/>
							<input type="button" value="<?php echo P_Lang("删除");?>" class="layui-btn layui-btn-sm layui-btn-danger" onclick="$.admin_res.file_delete('<?php echo $value['id'];?>')"/>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<div class="layui-row">
	<div class="layui-col-sm6">
		<div class="layui-btn-group">
			<input type="button" value="<?php echo P_Lang("全选");?>" onclick="$.input.checkbox_all('.checkbox input[type=checkbox]')" class="layui-btn layui-btn-sm"/>
			<input type="button" value="<?php echo P_Lang("全不选");?>" onclick="$.input.checkbox_none('.checkbox input[type=checkbox]')" class="layui-btn layui-btn-sm"/>
			<input type="button" value="<?php echo P_Lang("反选");?>" onclick="$.input.checkbox_anti('.checkbox input[type=checkbox]')" class="layui-btn layui-btn-sm"/>
		</div>
		<div class="layui-btn-group">
			<input type="button" value="<?php echo P_Lang("移动分类");?>" onclick="$.admin_res.move_cate()" class="layui-btn  layui-btn-sm"/>
			<input type="button" value="<?php echo P_Lang("更新图片");?>" onclick="$.admin_res.pl_update()" class="layui-btn  layui-btn-sm"/>
			<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_res.pl_delete()" class="layui-btn  layui-btn-sm layui-btn-danger"/>
		</div>
	</div>
	<div class="layui-col-sm6" style="text-align:right;"><?php $this->output("pagelist","file",true,false); ?></div>
</div>

<script type="text/javascript">
    layui.use('form', function () {
        $('.checkbox_one').on('click', function () {
            var obj = $('#' + $(this).attr('data-id'));
            obj.prop('checked', true);
            setTimeout("layui.form.render()", 100);
        });
    })
</script>
<?php $this->output("foot_lay","file",true,false); ?>