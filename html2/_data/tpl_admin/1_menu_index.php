<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<div class="layui-card">
	<div class="layui-card-header">
		<div class="layui-btn-group">
			<?php $tmpid["num"] = 0;$menulist=is_array($menulist) ? $menulist : array();$tmpid = array();$tmpid["total"] = count($menulist);$tmpid["index"] = -1;foreach($menulist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			<input type="button" value="<?php echo $value;?>" onclick="$.admin_menu.tolist('<?php echo $key;?>')" class="layui-btn layui-btn-sm<?php if($key == $id){ ?> layui-btn-normal<?php } ?>" />
			<?php } ?>
		</div>
		<div class="layui-btn-group fr">
			<?php if($popedom['group']){ ?>
			<input type="button" value="<?php echo P_Lang("组管理");?>" onclick="$.admin_menu.group()" class="layui-btn layui-btn-sm" />
			<?php } ?>
			<input type="button" value="<?php echo P_Lang("添加菜单");?>" onclick="$.admin_menu.add('<?php echo $id;?>')" class="layui-btn layui-btn-sm" />
		</div>
		
	</div>
	<div class="layui-card-body">
		<table class="layui-table">
		<thead>
		<tr>
			<th>ID</th>
			<th class="w33"><?php echo P_Lang("状态");?></th>
			<th><?php echo P_Lang("菜单名称");?></th>
			<th><?php echo P_Lang("目标链接");?></th>
			<th><?php echo P_Lang("打开方式");?></th>
			<th><?php echo P_Lang("限制");?></th>
			<th class="w50"><?php echo P_Lang("排序");?></th>
			<th><?php echo P_Lang("操作");?></th>
		</tr>
		</thead>
		<tbody>
		<?php $idxx["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$idxx = array();$idxx["total"] = count($rslist);$idxx["index"] = -1;foreach($rslist as $key=>$value){ $idxx["num"]++;$idxx["index"]++; ?>
		<tr id="menu_<?php echo $value['id'];?>">
			<td><?php echo $value['id'];?></td>
			<td>
				<input type="button" id="status_<?php echo $value['id'];?>" value="<?php if($value['status']){ ?><?php echo P_Lang("启用");?><?php } else { ?><?php echo P_Lang("停用");?><?php } ?>" <?php if($popedom['status']){ ?> onclick="phpok_status('<?php echo $value['id'];?>','<?php echo phpok_url(array('ctrl'=>'menu','func'=>'status'));?>')"<?php } else { ?> disabled<?php } ?> class="layui-btn layui-btn-sm <?php if(!$value['status']){ ?> layui-btn-danger<?php } ?>" />
			</td>
			<td>
				<div>
					<?php for($i=1;$i<$value['_layer'];$i++){ ?>
					<span class="cate_line"></span>
					<?php } ?>
					<?php if($value['_layer']>0){ ?>
					<span class="cate_middle">&nbsp;</span>
					<?php } ?>
					<span class="cate_txt"><?php echo $value['title'];?></span>
				</div>
			</td>
			<td>
				<?php if($value['type'] == 'project'){ ?>
				<?php echo P_Lang("项目");?>_<?php echo $value['project']['title'];?>
				<?php }elseif($value['type'] == 'cate'){ ?>
				<?php echo P_Lang("分类");?>_<?php echo $value['project']['title'];?> / <?php echo $value['cate']['title'];?>
				<?php }elseif($value['type'] == 'content'){ ?>
				<?php echo P_Lang("主题");?>_<?php echo $value['project']['title'];?> / <?php echo $value['info']['title'];?>
				<?php } else { ?>
				<?php echo P_Lang("自定义链接");?>_<?php echo $value['link'];?>
				<?php } ?>
			</td>
			<td><?php if($value['target']){ ?><?php echo P_Lang("新窗口");?><?php } else { ?><?php echo P_Lang("当前窗口");?><?php } ?></td>
			<td><?php if($value['is_userid']){ ?><?php echo P_Lang("会员可看");?><?php } else { ?><?php echo P_Lang("不限");?><?php } ?></td>
			<td><input type="text" id="taxis_<?php echo $value['id'];?>" class="layui-input" value="<?php echo $value['taxis'];?>" tabindex="<?php echo $idxx['num'];?>" onblur="phpok_taxis(this,'<?php echo phpok_url(array('ctrl'=>'menu','func'=>'taxis','id'=>$value['id']));?>')" /></td>
			<td>
				<div class="layui-btn-group">
					<?php if($popedom['add']){ ?>
					<input type="button" value="<?php echo P_Lang("添加子菜单");?>" onclick="$.admin_menu.add('<?php echo $id;?>','<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm" />
					<?php } ?>
					<?php if($popedom['modify']){ ?>
					<input type="button" value="<?php echo P_Lang("修改");?>" onclick="$.admin_menu.edit('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm" />
					<?php } ?>
					<?php if($popedom['delete']){ ?>
					<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_menu.del('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
					<?php } ?>
				</div>

			</td>
		</tr>
		<?php } ?>
		</tbody>
		</table>
	</div>
</div>
<?php $this->output("foot_lay","file",true,false); ?>