<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header" phpok-id="JS_TITLE">
		<?php echo P_Lang("项目");?>
		<?php if($popedom['set']){ ?>
		<div class="layui-btn-group fr" phpok-id="JS_SET">
			<input type="button" value="<?php echo P_Lang("添加项目");?>" onclick="$.win('<?php echo P_Lang("添加项目");?>','<?php echo phpok_url(array('ctrl'=>'project','func'=>'set'));?>')" class="layui-btn layui-btn-sm" />
			<?php if($session['adm_develop']){ ?>
			<input type="button" onclick="$.admin_project.import_xml()" value="<?php echo P_Lang("项目导入");?>" class="layui-btn layui-btn-sm" />
			<?php } ?>
		</div>
		<?php } ?>
	</div>
	<div class="layui-card-body" phpok-id="JS_BODY">
		<table class="layui-table" lay-size="sm">
		<thead>
		<tr>
			<?php if($popedom['set']){ ?>
			<th width="30px"></th>
			<?php } ?>
			<th width="70px" class="center">ID</th>
			<th width="30px">&nbsp;</th>
			<th><?php echo P_Lang("项目名称");?></th>
			<th><?php echo P_Lang("标识串");?></th>
			
			<th><?php echo P_Lang("Api接口");?></th>
			<th><?php echo P_Lang("前台");?></th>
			<th><?php echo P_Lang("模块");?></th>
			<th width="65" class="center"><?php echo P_Lang("排序");?></th>
			<?php if($popedom['set']){ ?>
			<th width="245px">&nbsp;</th>
			<?php } ?>
		</tr>
		</thead>
		<?php $tmpid["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$tmpid = array();$tmpid["total"] = count($rslist);$tmpid["index"] = -1;foreach($rslist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
		<tr id="project_<?php echo $value['id'];?>">
			<?php if($popedom['set']){ ?>
			<td class="center"><input type="checkbox" value="<?php echo $value['id'];?>" data-name="id" id="id_<?php echo $value['id'];?>" data-title="<?php echo $value['title'];?>" /></td>
			<?php } ?>
			<td class="center gray" height="24px"><?php echo $value['id'];?></td>
			<td class="center"><span class="status<?php echo $value['status'];?>" id="status_<?php echo $value['id'];?>" <?php if($popedom['set']){ ?>onclick="$.admin_project.set_status(<?php echo $value['id'];?>)"<?php } else { ?> style="cursor:default"<?php } ?> value="<?php echo $value['status'];?>"></span></td>
			<td><label for="id_<?php echo $value['id'];?>" style="<?php echo $value['style'];?>"><?php echo $value['space'];?><?php echo $value['title'];?><?php if($value['nick_title']){ ?><span class="gray i"> (<?php echo $value['nick_title'];?>)</span><?php } ?><?php if($value['hidden']){ ?><span class="red i"><?php echo P_Lang("（隐藏）");?></span><?php } ?></label></td>
			<td><?php echo $value['identifier'];?></td>
			<td><?php if($value['is_api']){ ?><?php echo P_Lang("启用");?><?php } else { ?><span class="gray"><?php echo P_Lang("禁用");?></span><?php } ?></td>
			<td><?php if($value['is_front']){ ?><?php echo P_Lang("启用");?><?php } else { ?><span class="gray"><?php echo P_Lang("禁用");?></span><?php } ?></td>
			<td><?php echo $value['project_module_title'] ? $value['project_module_title'] : '-';?></td>
			<td><div class="gray i hand center" title="<?php echo P_Lang("点击调整排序");?>" name="taxis" data="<?php echo $value['id'];?>"><?php echo $value['taxis'];?></div></td>
			<?php if($popedom['set']){ ?>
			<td>
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("编辑");?>" onclick="$.win('<?php echo P_Lang("编辑");?>_#<?php echo $value['id'];?>','<?php echo phpok_url(array('ctrl'=>'project','func'=>'set','id'=>$value['id']));?>')" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_project.del('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
					<input type="button" value="<?php echo P_Lang("扩展字段");?>" onclick="$.admin_project.extinfo('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm" />
					<?php if(!$value['parent_id']){ ?>
					<input type="button" value="<?php echo P_Lang("添加子项");?>" class="layui-btn layui-btn-sm" onclick="$.win('<?php echo P_Lang("添加子项");?>_#<?php echo $value['id'];?>','<?php echo phpok_url(array('ctrl'=>'project','func'=>'set','pid'=>$value['id']));?>')" />
					<?php } ?>
				</div>
			</td>
			<?php } ?>
		</tr>
		<?php } ?>
		</table>
		<?php if($popedom['set']){ ?>
		<div phpok-id="JS_BATCH">
		<ul class="layout">
			<li>
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("全选");?>" class="layui-btn layui-btn-sm" onclick="$.input.checkbox_all()" />
					<input type="button" value="<?php echo P_Lang("全不选");?>" class="layui-btn layui-btn-sm" onclick="$.input.checkbox_none()" />
					<input type="button" value="<?php echo P_Lang("反选");?>" class="layui-btn layui-btn-sm" onclick="$.input.checkbox_anti()" />
				</div>
			</li>
			<li>
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("禁用");?>" onclick="$.admin_project.set_lock(0)" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("启用");?>" onclick="$.admin_project.set_lock(1)" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("显示");?>" onclick="$.admin_project.set_hidden(0)" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("隐藏");?>" onclick="$.admin_project.set_hidden(1)" class="layui-btn layui-btn-sm" />
				</div>
			</li>
			
			<?php if($session['adm_develop']){ ?>
			<li>
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("复制");?>" onclick="$.admin_project.copy()" class="layui-btn layui-btn-sm" />
					<input type="button" value="<?php echo P_Lang("导出");?>" onclick="$.admin_project.export()" class="layui-btn layui-btn-sm" />
				</div>
			</li>
			<?php } ?>
		</ul>
		</div>
		<?php } ?>
	</div>
</div>

<?php $this->output("foot_lay","file",true,false); ?>