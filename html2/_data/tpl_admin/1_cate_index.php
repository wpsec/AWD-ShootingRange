<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $this->output("head_lay","file",true,false); ?>
<script type="text/javascript" src="<?php echo add_js('cate.js');?>"></script>
<div class="layui-card">
	<div class="layui-card-header ">
		<?php if($navlist){ ?>
			<a href="<?php echo phpok_url(array('ctrl'=>'cate'));?>"><?php echo P_Lang("根分类");?></a>
			<?php $tmpid["num"] = 0;$navlist=is_array($navlist) ? $navlist : array();$tmpid = array();$tmpid["total"] = count($navlist);$tmpid["index"] = -1;foreach($navlist as $key=>$value){ $tmpid["num"]++;$tmpid["index"]++; ?>
			/ <a href="<?php echo phpok_url(array('ctrl'=>'cate','func'=>'index','parent_id'=>$value['id']));?>">
				<?php echo $value['title'];?>
			</a>
			<?php } ?>
		<?php } else { ?>
		<?php echo P_Lang("根分类");?>
		<?php } ?>
		<div class="fr">
			<?php if($rs){ ?>
			<button class="layui-btn layui-btn-sm" onclick="$.win('<?php echo P_Lang("添加子分类");?>_#<?php echo $value['id'];?>','<?php echo phpok_url(array('ctrl'=>'cate','func'=>'set','parent_id'=>$rs['id']));?>')">
				<i class="layui-icon">&#xe608;</i> <?php echo P_Lang("添加子分类");?>
			</button>
			<?php } else { ?>
			<button class="layui-btn layui-btn-sm" onclick="$.win('<?php echo P_Lang("添加根分类");?>','<?php echo phpok_url(array('ctrl'=>'cate','func'=>'set'));?>')">
				<i class="layui-icon">&#xe608;</i> <?php echo P_Lang("添加根分类");?>
			</button>
			<?php } ?>
		</div>
	</div>
	<div class="layui-card-body">
		<table class="layui-table" lay-size="sm">
			<thead>
			<tr>
				<?php if($rs){ ?>
				<th width="20">&nbsp;</th>
				<?php } ?>
				<th width="40">ID</th>
				<th width="20"></th>
				<th><?php echo P_Lang("分类名称");?></th>
				<th><?php echo P_Lang("标识");?></th>
				<th><?php echo P_Lang("子类数量");?></th>
				<th width="80"><?php echo P_Lang("排序");?></th>
				<th width="210"><?php echo P_Lang("操作");?></th>
			</tr>
			</thead>
			<tbody>
			<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id = array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist as $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
			<tr>
				<?php if($rs){ ?>
				<td><input type="checkbox" name="ids[]" id="c_<?php echo $value['id'];?>" value="<?php echo $value['id'];?>" /></td>
				<?php } ?>
				<td><?php echo $value['id'];?></td>
				<td>
					<span id="status_<?php echo $value['id'];?>" onclick="$.admin_cate.status(<?php echo $value['id'];?>)" class="status<?php echo $value['status'];?>" value="<?php echo $value['status'];?>"></span>
				</td>
				<td style="<?php echo $value['style'];?>"><label for="c_<?php echo $value['id'];?>"><?php echo $value['title'];?></label></td>
				<td><?php echo $value['identifier'];?></td>
				<td id="total_<?php echo $value['id'];?>"><?php if($value['total']){ ?><?php echo $value['total'];?><?php } else { ?><span class="red">0</span><?php } ?></td>
				<td><input type="text" id="taxis_<?php echo $value['id'];?>" class="layui-input" value="<?php echo $value['taxis'];?>" tabindex="<?php echo $tab_i;?>" onblur="update_taxis('<?php echo $value['id'];?>')" /></td>
				<td>
					<div class="layui-btn-group">
						<?php if($popedom['add']){ ?>
						<input type="button" value="<?php echo P_Lang("子分类");?>" onclick="$.phpok.go('<?php echo phpok_url(array('ctrl'=>'cate','func'=>'index','parent_id'=>$value['id']));?>')" class="layui-btn layui-btn-sm layui-btn-normal" />
						<?php } ?>
						<?php if($popedom['modify']){ ?>
						<input type="button" value="<?php echo P_Lang("修改");?>" onclick="$.win('<?php echo P_Lang("修改分类");?>_#<?php echo $value['id'];?>','<?php echo phpok_url(array('ctrl'=>'cate','func'=>'set','id'=>$value['id']));?>')" class="layui-btn layui-btn-sm" />
						<?php } ?>
						<?php if($popedom['delete']){ ?>
						<input type="button" value="<?php echo P_Lang("删除");?>" onclick="$.admin_cate.del('<?php echo $value['id'];?>')" class="layui-btn layui-btn-sm layui-btn-danger" />
						<?php } ?>
					</div>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>
		<?php if($rs){ ?>
		<ul class="layout">
			<li>
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("全选");?>" class="layui-btn layui-btn-primary layui-btn-sm" onclick="$.input.checkbox_all()" />
					<input type="button" value="<?php echo P_Lang("全不选");?>" class="layui-btn layui-btn-primary layui-btn-sm" onclick="$.input.checkbox_none()" />
					<input type="button" value="<?php echo P_Lang("反选");?>" class="layui-btn layui-btn-primary layui-btn-sm" onclick="$.input.checkbox_anti()" />
				</div>
			</li>
			<li id="plugin_button">
				<div class="layui-btn-group">
					<input type="button" value="<?php echo P_Lang("启用");?>" class="layui-btn layui-btn-sm" onclick="$.admin_cate.pl_status(1)" />
					<input type="button" value="<?php echo P_Lang("禁用");?>" class="layui-btn layui-btn-warm layui-btn-sm" onclick="$.admin_cate.pl_status(0)" />
					<input type="button" value="<?php echo P_Lang("删除");?>" class="layui-btn layui-btn-danger layui-btn-sm" onclick="$.admin_cate.pl_delete(0)" />
				</div>
			</li>
		</ul>
		<?php } ?>
	</div>

</div>
<?php $this->output("foot_lay","file",true,false); ?>